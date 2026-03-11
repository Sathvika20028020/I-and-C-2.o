<?php

namespace App\Http\Controllers\Admin;

use App\Models\AssetCategory;
use App\Models\AssetSubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class AssetSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = AssetSubCategory::latest()->get();
        return view('reports.subcategory.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = AssetCategory::get();
        return view('reports.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('name','asset_category_id');
        if($request->hasFile('icon'))
        $data['icon'] = $this->saveFile($request->icon, '/uploads/subcategory');
        AssetSubCategory::create($data);
        return redirect()->route('asset-subcategory.index');
    }

    private function saveFile($file, $store_path){
      $extension = File::extension($file->getClientOriginalName());
      $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
      $file-> move(public_path($store_path), $filename);
      return $store_path.'/'.$filename;
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetSubCategory $assetSubcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetSubCategory $assetSubcategory)
    {
      $categories = AssetCategory::get();
        return view('reports.subcategory.edit', compact('assetSubcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssetSubCategory $assetSubcategory)
    {
        if($request->ajax()){
          $data = $request->only('status');
          $assetSubcategory->update($data);
          return response()->json([
            'success' => true
          ]);
        }

        $data = $request->only('name','asset_category_id');if($request->hasFile('icon'))
        $data['icon'] = $this->saveFile($request->icon, '/uploads/subcategory');
        $assetSubcategory->update($data);
        return redirect()->route('asset-subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetSubCategory $assetSubcategory)
    {
        //
    }
}
