<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssigneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      $entries = Employee::where('reporting_officer_id', '>', 0)->get();
      return view('reports.assigne_ro.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $entries = Employee::where('emp_name','!=', '')->whereNull('reporting_officer_id')->get();
      $ros = Employee::where('emp_name','!=', '')->get();
      return view('reports.assigne_ro.create', compact('entries', 'ros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emp = Employee::find($request->id);
        $emp->reporting_officer_id = $request->reporting_officer_id;
        $emp->save();
        $ro = Employee::find($request->reporting_officer_id);
        $ro->role = 1;
        $ro->save();
        return redirect()->route('assigned-list.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $emp = Employee::find($id);
        $emp->reporting_officer_id = null;
        $emp->save();
        return redirect()->route('assigned-list.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $emp = Employee::find($id);
      $entries = Employee::where('emp_name','!=', '')->get();
      return view('reports.assigne_ro.edit', compact('entries','emp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $emp = Employee::find($id);
        $emp->reporting_officer_id = $request->reporting_officer_id;
        $emp->save();
        $ro = Employee::find($request->reporting_officer_id);
        $ro->role = 1;
        $ro->save();
        return redirect()->route('assigned-list.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
