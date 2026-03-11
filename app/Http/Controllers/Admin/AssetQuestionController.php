<?php

namespace App\Http\Controllers\Admin;

use App\Models\AssetQuestion;
use App\Models\AssetCategory;
use App\Models\AssetQuestionOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssetQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = AssetQuestion::latest()->get();
        return view('reports.asset_question.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = AssetCategory::get();
      return view('reports.asset_question.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('asset_category_id','asset_subcategory_id');
        if($request->questions && count($request->questions)>0){
          foreach($request->questions as $question){
            $data['question'] = $question['question'];
            $data['type'] = $question['type'];
            $entry = AssetQuestion::create($data);
            if($question['type'] == 'select' && $question['options']){
              $options = explode('_|_', $question['options']);
              foreach($options as $option){
                AssetQuestionOption::create([
                  'asset_question_id' => $entry->id,
                  'option' => $option
                ]);
              }
            }
          }
        }
        return redirect()->route('asset-question.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetQuestion $assetQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetQuestion $assetQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssetQuestion $assetQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetQuestion $assetQuestion)
    {
        //
    }

    public function assetsList()
    {

        return view('reports.assetsList');
    }
}
