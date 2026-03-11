<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AssetInventory;
use App\Models\User;
use App\Models\Employee;
use App\Models\District;
use App\Models\AssetCategory;
use App\Models\AssetSubCategory;
use App\Models\AssetQuestion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AssetController extends Controller
{
  public function dashboard(Request $request) {
    $entries = District::get();
    $categories = AssetCategory::where('status', 1)->with('subcategories')->get();
    $collection = [];
    $district = District::find($request->district);
    $count = 0;
    foreach ($categories as $key => $category) {
      $collection[$key]['name'] = $category->name;
      $collection[$key]['id'] = $category->id;
      $ctotal = 0;
      foreach ($category->subcategories as $_key => $subcategory) {
        $ques = AssetQuestion::where(['asset_subcategory_id'=>$subcategory->id, 'type'=>'number'])->first();
        if($ques){
          $query = AssetInventory::where('question_id', $ques->id);
          if($request->district) $query->where('district_id', $request->district);
          $total = $query->sum('answer');
          $collection[$key]['subcategories'][$_key]['name'] = $subcategory->name;
          $collection[$key]['subcategories'][$_key]['id'] = $subcategory->id;
          $collection[$key]['subcategories'][$_key]['total'] = $total;
          $ctotal += $total;
          $count += $total;
        }
      }
      $collection[$key]['total'] = $ctotal;
    }
    return view('reports.assets.dashboard', compact('entries', 'collection','district','count'));
  }

  public function index() {
    $ids = AssetInventory::pluck('district_id')->toArray();
    $entries = District::orderBy('name')->get();
    $subcategories = AssetSubCategory::whereNotIn('asset_category_id', [8,9])->where('status', 1)->get();
    foreach ($entries as $key => $entry) {
      $ctotal = 0;
      foreach ($subcategories as $key => $sub) {
        $ques = AssetQuestion::where(['asset_subcategory_id'=>$sub->id, 'type'=>'number'])->first();
        if($ques){
          $total = AssetInventory::where('question_id', $ques->id)->where('district_id', $entry->id)->sum('answer');
          $ctotal += $total;
        }
      }
      $entry->total = $ctotal;
    }
    return view('reports.assets.index', compact('entries'));
  }

  public function edit(AssetCategory $asset) {
    return response()->json(['success' => true, 'list' => $asset->subcategories]);
  }

  public function show(District $asset, Request $request)
  {
    if($request->ajax()){
      $district = $asset;
      $category = AssetCategory::find($request->cat);
      $subcategory = AssetSubCategory::find($request->subcat);
      $id = $subcategory->id;
      $inventories = AssetInventory::where('district_id', $asset->id)
                                    ->whereHas('question', function($query) use ($id) {
                                        $query->where('asset_subcategory_id', $id);
                                    })
                                    ->orderBy('display')
                                    ->latest()
                                    ->get()
                                    ->groupBy('set_uuid');
      foreach($inventories as $key => $inventory){
        $latitude = AssetInventory::where('set_uuid', $key)->where('type', 'latitude')->first();
        $longitude = AssetInventory::where('set_uuid', $key)->where('type', 'longitude')->first();
        $images = AssetInventory::where('set_uuid', $key)->where('type', 'image')->get();
        if($latitude) $inventory->put('latitude', $latitude);
        if($latitude) $inventory->put('longitude', $longitude);
        if($images->count()) $inventory->put('images', $images);
      }
      $html = view('reports.assets.details', compact('district','inventories','category','subcategory'))->render();
      return response()->json([
        'html' => $html
      ]);
    }
    $id = $request->subcat ?? $asset->inventories->first()?->question?->asset_subcategory_id;
    $inventories = AssetInventory::where('district_id', $asset->id)
                                    ->whereHas('question', function($query) use ($id) {
                                        $query->where('asset_subcategory_id', $id);
                                    })
                                    ->orderBy('display')
                                    ->latest()
                                    ->get()
                                    ->groupBy('set_uuid');
    foreach($inventories as $key => $inventory){
      $latitude = AssetInventory::where('set_uuid', $key)->where('type', 'latitude')->first();
      $longitude = AssetInventory::where('set_uuid', $key)->where('type', 'longitude')->first();
      $images = AssetInventory::where('set_uuid', $key)->where('type', 'image')->get();
      if($latitude) $inventory->put('latitude', $latitude);
      if($latitude) $inventory->put('longitude', $longitude);
      if($images->count()) $inventory->put('images', $images);
    }
    $categories = AssetCategory::where('status',1)->get();
    $subcat_id = $request->subcat ?? null;
    $cat_id = $request->cat;
    $subcategories = [];
    if($subcat_id){
      $subcat = AssetSubCategory::find($subcat_id);
      $subcategories = $subcat->asset_category->subcategories;
      $cat_id = $subcat->asset_category_id;
    }
    return view('reports.assets.show', compact('asset', 'inventories','categories','cat_id','subcategories','subcat_id'));
  }

  public function dateFormatCorrection(){
    $table = 'employees';
    $columns = [
        'dob',
        'doj',
        'nominee_dob',
        'post_held_from',
        'dor',
        'post_from',
        'post_to',
    ];

    $table2 = 'children';
    $columns2 = [
        'dob',
    ];
    $table3 = 'policies';
    $columns3 = [
        'start_date',
    ];

    $sets = [
      [$table, $columns],
      [$table2, $columns2],
      [$table3, $columns3],
    ];

    $totals = [
      'scanned' => 0,
      'updated' => 0,
      'skipped' => 0,
      'errors' => 0,
    ];

    foreach ($sets as [$tbl, $cols]) {
      DB::table($tbl)
        ->select(array_merge(['id'], $cols))
        ->orderBy('id')
        ->chunkById(500, function($rows) use ($tbl, $cols, &$totals) {
          foreach ($rows as $row) {
            $update = [];
            foreach ($cols as $col) {
              $original = $row->{$col} ?? null;
              if ($original === null || $original === '' ) { $totals['skipped']++; continue; }

              $normalized = $this->normalizeDateString((string)$original);
              $totals['scanned']++;
              if ($normalized === false) { $totals['errors']++; continue; }
              if ($normalized !== $original) { $update[$col] = $normalized; $totals['updated']++; }
              else { $totals['skipped']++; }
            }
            if (!empty($update)) {
              DB::table($tbl)->where('id', $row->id)->update($update);
            }
          }
        });
    }

    return response()->json($totals);
  }

  protected function normalizeDateString(string $value)
  {
    $v = trim($value);
    if ($v === '' || $v === '0000-00-00') return false;
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $v)) return $v;

    try {
      if (strpos($v, '/') !== false) {
        $dt = Carbon::createFromFormat('d/m/Y', $v);
        return $dt->format('Y-m-d');
      }
      if (strpos($v, '-') !== false) {
        try {
          $dt = Carbon::createFromFormat('Y-m-d', $v);
          return $dt->format('Y-m-d');
        } catch (\Throwable $e) {
          $dt = Carbon::createFromFormat('d-m-Y', $v);
          return $dt->format('Y-m-d');
        }
      }
      $ts = strtotime($v);
      if ($ts) return date('Y-m-d', $ts);
    } catch (\Throwable $e) {
      return false;
    }
    return false;
  }
}

