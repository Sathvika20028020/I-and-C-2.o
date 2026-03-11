<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssigneAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $entries = Employee::where('asset_access', '>', 0)->get();
      return view('reports.asset_access.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $ros = Employee::where('asset_access', 0)->get();
      return view('reports.asset_access.create', compact('ros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Employee::whereIn('id', $request->id)->update(['asset_access'=>1]);
        return redirect()->route('asset-access.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      Employee::where('id', $id)->update(['asset_access'=>0]);
      return redirect()->route('asset-access.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
