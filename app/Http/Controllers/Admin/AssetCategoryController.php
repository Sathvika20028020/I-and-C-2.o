<?php

namespace App\Http\Controllers\Admin;

use App\Models\AssetCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class AssetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = AssetCategory::latest()->get();
        return view('reports.category.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reports.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('name');
        if($request->hasFile('icon'))
        $data['icon'] = $this->saveFile($request->icon, '/uploads/category');
        AssetCategory::create($data);
        return redirect()->route('asset-category.index');
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
    public function show(AssetCategory $assetCategory)
    {
        return response()->json($assetCategory->subcategories);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetCategory $assetCategory)
    {
        return view('reports.category.edit', compact('assetCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssetCategory $assetCategory)
    {
        if($request->ajax()){
          $data = $request->only('status');
          $assetCategory->update($data);
          return response()->json([
            'success' => true
          ]);
        }

        $data = $request->only('name');
        if($request->hasFile('icon'))
        $data['icon'] = $this->saveFile($request->icon, '/uploads/category');
        $assetCategory->update($data);
        return redirect()->route('asset-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetCategory $assetCategory)
    {
        //
    }
}
