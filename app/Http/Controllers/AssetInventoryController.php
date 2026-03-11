<?php

namespace App\Http\Controllers;

use App\Models\AssetInventory;
use Illuminate\Http\Request;
use App\Models\AssetCategory;
use App\Models\AssetQuestion;
use App\Models\AssetSubCategory;
use Illuminate\Support\Facades\File;
use Str;
use App\Models\District;

class AssetInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function category()
    {
       $user_id = auth()->guard('pwauser')->user()->id;
      //  $categoryIds = AssetInventory::where('user_id', $user_id)
      //                               ->with('question') // eager load question
      //                               ->get()
      //                               ->pluck('question.asset_category_id') // pluck from related model
      //                               ->unique()
      //                               ->values() // reset keys
      //                               ->toArray();
      // $categories = AssetCategory::whereIn('id', $categoryIds)->get();
      $categories = AssetCategory::where('status',1)->get();
        return view('pwa.category', compact('categories'));
    }
    public function subcategory($id)
    {
      $user_id = auth()->guard('pwauser')->user()->id;
      // $subcategoryIds = AssetInventory::join('asset_questions', 'asset_inventories.question_id', '=', 'asset_questions.id')
      //                   ->where('asset_inventories.user_id', $user_id)
      //                   ->where('asset_questions.asset_category_id', $id)
      //                   ->pluck('asset_questions.asset_subcategory_id')
      //                   ->unique()
      //                   ->values()
      //                   ->toArray(); //dd($subcategoryIds);
      // $categories = AssetSubCategory::whereIn('id', $subcategoryIds)->get();
      $categories = AssetSubCategory::where('asset_category_id', $id)->where('status',1)->get();
        return view('pwa.subcategory', compact('categories'));
    }
    public function index()
    {
      $user_id = auth()->guard('pwauser')->user()->id;

        $assets = AssetInventory::where('user_id', $user_id)
          ->with('question.asset_category')
          ->get()
          ->groupBy(function ($asset) {
              // group by category name or ID
              return $asset->question->asset_category->id ?? 'uncategorized';
          })
          ->map(function ($categoryGroup) {
              // inside each category, group again by set_uuid
              return $categoryGroup->groupBy('set_uuid');
          });
        return view('pwa.assetView', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = AssetCategory::where('status', 1)->with('subcategories.questions.options')->get();
      $districts = District::get();
      $district = auth()->guard('pwauser')->user()->employee?->post_district;
      $user_district = null;
      if($district)
      $user_district = District::where('name', $district)->first();
        return view('pwa.assetsForm', compact('categories','districts','user_district'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->guard('pwauser')->user()->id;
        $employee_id = auth()->guard('pwauser')->user()->emp_id;
        if($request->collection){
          $uuid = Str::uuid();
          foreach($request->collection as $key => $set){
            $i=1;
            foreach($set as $collection){
              if($collection['answer']){
                $collection['user_id'] = $user_id;
                $collection['district_id'] = $request->district_id;
                $collection['employee_id'] = $employee_id;
                $collection['set_uuid'] = $key;
                $collection['display'] = $i;
                if(in_array($collection['question_id'], ['longitude','latitude','image','uimage'])){
                  $collection['type'] = $collection['question_id'];
                  $collection['question_id'] = null;
                }
                AssetInventory::create($collection);
                $i++;
              }
            }
          }
        }
        \Session::put('success', 'Asset Form submitted successfully');
        return redirect()->back();
    }

    public function saveAssetImage(Request $request){
      if ($request->hasFile('file')) {
        $file = $request->file('file');
        $store_path = '/uploads/assets';
        $extension = File::extension($file->getClientOriginalName());
        $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
        $file->move(public_path($store_path), $filename);
        return response()->json([
            'status' => true,
            'uuid' => $filename,
        ]);
      }
      return response()->json(['status' => false, 'message' => 'No file uploaded'], 400);
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      if($id == 'menu-main'){
        return view('pwa.layout.menu-main');
      }
      $user_id = auth()->guard('pwauser')->user()->id;
      $subcategory = AssetSubCategory::find($id);
      $inventories = AssetInventory::where('user_id', $user_id)
                                    ->whereHas('question', function($query) use ($id) {
                                        $query->where('asset_subcategory_id', $id);
                                    })
                                    ->orderBy('display')
                                    ->get()
                                    ->groupBy('set_uuid');
      foreach($inventories as $key => $inventory){
        $latitude = AssetInventory::where('set_uuid', $key)->where('type', 'latitude')->first();
        $longitude = AssetInventory::where('set_uuid', $key)->where('type', 'longitude')->first();
        $images = AssetInventory::where('set_uuid', $key)->where('type', 'image')->get();
        $uimages = AssetInventory::where('set_uuid', $key)->where('type', 'uimage')->get();
        if($latitude) $inventory->put('latitude', $latitude);
        if($latitude) $inventory->put('longitude', $longitude);
        if($images->count()) $inventory->put('images', $images);
        if($uimages->count()) $inventory->put('uimages', $uimages);
      }

      $total = 0;
      $ques = AssetQuestion::where(['asset_subcategory_id'=>$id, 'type'=>'number'])->first();
      if($ques){
        $total = AssetInventory::where('user_id', $user_id)->where('question_id', $ques->id)->sum('answer');
      }
      // dd($inventories);
      return view('pwa.details', compact('subcategory', 'inventories','total'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uid)
    {
        $quess = AssetInventory::with('question.asset_subcategory', 'question.options')->where('set_uuid', $uid)->get();
        $subcat = $quess->first()?->question?->asset_subcategory?->name;
        return view('pwa.editAssetForm', compact('quess', 'subcat', 'uid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uid)
    {
        $data = $request->except('_token', '_method', 'images', 'uimage');
        $subcat = null;
        foreach($data as $id => $value){
          AssetInventory::find($id)->update(['answer'=>$value]);
          if(!$subcat)
          $subcat = AssetInventory::find($id)->question->asset_subcategory_id;
        }
        if ($request->hasFile('uimage')) {
          $file = $request->file('uimage');
          $store_path = '/uploads/assets';
          $extension = File::extension($file->getClientOriginalName());
          $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
          $file->move(public_path($store_path), $filename);
          $latest = AssetInventory::where('set_uuid', $uid)->orderBy('display', 'desc')->first();
          AssetInventory::updateOrCreate(
              [
                  'user_id' => $latest->user_id,
                  'employee_id' => $latest->employee_id,
                  'set_uuid' => $uid,
                  'type'     => 'uimage',
              ],
              [
                  'answer'   => $filename,
                  'display' => $latest->display + 1,
                  'district_id' => $latest->district_id
              ]
          );
        }
        if ($request->images && count($request->images)) {
          foreach($request->images as $file){
            $store_path = '/uploads/assets';
            $extension = File::extension($file->getClientOriginalName());
            $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
            $file->move(public_path($store_path), $filename);
            $latest = AssetInventory::where('set_uuid', $uid)->orderBy('display', 'desc')->first();
            $data['user_id'] = $latest->user_id;
            $data['employee_id'] = $latest->employee_id;
            $data['answer'] = $filename;
            $data['set_uuid'] = $uid;
            $data['display'] = $latest->display + 1;
            $data['type'] = 'image';
            $data['district_id'] = $latest->district_id;
            AssetInventory::create($data);
          }
        }
          
        return redirect()->route('asset-inventory.show', $subcat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uid)
    {
      AssetInventory::where('set_uuid', $uid)->delete();
      return redirect()->back();
    }
}
