<?php

namespace App\Http\Controllers\Admin;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $entries = LeaveType::latest()->get();
        return view('reports.leave-types.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reports.leave-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('name','total');
        LeaveType::create($data);
        return redirect()->route('leave-types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveType $leaveType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveType $leaveType)
    {
        return view('reports.leave-types.edit', compact('leaveType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeaveType $leaveType)
    {
        $data = $request->only('name','total');
        $leaveType->update($data);
        return redirect()->route('leave-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveType $leaveType)
    {
        //
    }
}
