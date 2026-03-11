<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\GoogleForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class GoogleFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $districts = District::get();
        return view('google_form', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('district');
        $data['unit_types'] = implode(',', $request->unit_types);
        $groups = ['a','b','c','d'];
        foreach ($request->unit_types as $key => $unit) {
          $data[$unit.'_address'] = $request->input($unit.'_address');
          for ($i=0; $i < 4; $i++) { 
            $data[$unit.'_kannadigas_group_'.$groups[$i]] = $request->input($unit.'_kannadigas_group_'.$groups[$i]);
            $data[$unit.'_others_group_'.$groups[$i]] = $request->input($unit.'_others_group_'.$groups[$i]);
          }
        }
        if($request->hasFile('small_doc') && in_array('small',$request->unit_types)){
          $data['small_doc'] = $this->saveFile($request->small_doc, '/uploads/google_form_documents');
        }
        if($request->hasFile('medium_doc') && in_array('medium',$request->unit_types)){
          $data['medium_doc'] = $this->saveFile($request->medium_doc, '/uploads/google_form_documents');
        }
        if($request->hasFile('large_doc') && in_array('large',$request->unit_types)){
          $data['large_doc'] = $this->saveFile($request->large_doc, '/uploads/google_form_documents');
        }
        if($request->hasFile('mega_doc') && in_array('mega',$request->unit_types)){
          $data['mega_doc'] = $this->saveFile($request->mega_doc, '/uploads/google_form_documents');
        }
        if($request->hasFile('ultramega_doc') && in_array('ultramega',$request->unit_types)){
          $data['ultramega_doc'] = $this->saveFile($request->ultramega_doc, '/uploads/google_form_documents');
        }
        if($request->hasFile('supermega_doc') && in_array('supermega',$request->unit_types)){
          $data['supermega_doc'] = $this->saveFile($request->supermega_doc, '/uploads/google_form_documents');
        }
        GoogleForm::create($data);
        Session::put('success', 'Form submitted successfully.');
        return redirect()->back();
    }


    private function saveFile($file, $store_path){
      try{
        $extension = File::extension($file->getClientOriginalName());
        $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
        $path = public_path($store_path);
        if (!file_exists($path)) {
          mkdir($path, 0755, true);
        }
        $file->move(public_path($store_path), $filename);
        return asset($store_path.'/'.$filename);
      }catch(\Exception $e){
        return '';
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(GoogleForm $googleForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GoogleForm $googleForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GoogleForm $googleForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GoogleForm $googleForm)
    {
        //
    }
}
