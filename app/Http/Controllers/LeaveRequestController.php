<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Leave;
use App\Models\LeaveDate;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp = Employee::where('reporting_officer_id', auth()->user()->emp_id)->pluck('id')->toArray();
        $users = User::whereIn('emp_id', $emp)->pluck('id')->toArray();
        $entries = Leave::whereIn('user_id', $users)
                          ->whereHas('dates', function ($query) {
                              $query->where('status', 'Pending');
                          })
                          ->latest()
                          ->get();
        return view('pwa.leave_request', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $total = LeaveType::get()->sum('total');
        $emp = Employee::where('reporting_officer_id', auth()->user()->emp_id)->pluck('id')->toArray();
        $users = User::whereIn('emp_id', $emp)->get();
        $types = LeaveType::get();
        foreach($users as $user){
          $userId = $user->id;
          $leaves = [];
          foreach($types as $key => $type){
            $leaveTypeId = $type->id;
            $leaves[$key]['type'] = $type->name;
            if(!in_array($user->employee?->gender, ['female', 'Female', 'FEMALE']) && $type->name == 'SCL - Special Casual Leave'){
              $leaves[$key]['total'] = '-';
              $leaves[$key]['taken'] = '-';
            }
            else{
              $leaves[$key]['total'] = $type->total;
              $leaves[$key]['taken'] = LeaveDate::whereYear('date', date('Y'))
                                  ->whereIn('status', ['Approved'])
                                  ->whereHas('leave', function ($q) use ($userId, $leaveTypeId) {
                                      $q->where('user_id', $userId)
                                        ->where('leave_type_id', $leaveTypeId);
                                  })
                                  ->count();
            }
          }
          $user->leaves = $leaves;
        }
        return view('pwa.leave_balance', compact('users', 'total', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        LeaveDate::find($request->id)->update(['status'=>$request->status, 'reason'=>$request->reason]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $leave = Leave::find($id);
        return view('pwa.leave_details', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
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
