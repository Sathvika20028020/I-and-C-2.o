<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveDate;
use App\Models\LeaveType;
use App\Models\RestrictedHolidays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = auth()->id();
        $gender = auth()->user()->employee->gender;
        if(in_array($gender, ['female', 'Female', 'FEMALE'])){
          $types = LeaveType::get();
        }else{
          $types = LeaveType::where('name', '!=', 'SCL - Special Casual Leave')->get();
        }
        foreach($types as $type){
          $leaveTypeId = $type->id;
          $type->taken = LeaveDate::whereYear('date', date('Y'))
                                ->whereIn('status', ['Approved'])
                                ->whereHas('leave', function ($q) use ($userId, $leaveTypeId) {
                                    $q->where('user_id', $userId)
                                      ->where('leave_type_id', $leaveTypeId);
                                })
                                ->count();
        }
      $entries = Leave::where('user_id', auth()->id())->latest()->get();
        return view('pwa.leavelist', compact('entries','types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $spl = LeaveType::where('name', 'SCL - Special Casual Leave')->first();
      $rls = RestrictedHolidays::whereDate('date', '>=', date('Y-m-d'))->pluck('date')->toArray();
      $gender = auth()->user()->employee->gender;
      if($spl){
        if(in_array($gender, ['female', 'Female', 'FEMALE'])){
          $hasSplLeaveThisMonth = Leave::where('user_id', auth()->id())
                                ->where('leave_type_id', $spl->id)
                                ->whereHas('dates', function ($query) {
                                    $query->where('status', 'approved')
                                          ->whereMonth('date', Carbon::now()->month)
                                          ->whereYear('date', Carbon::now()->year);
                                })
                                ->exists();
          if($hasSplLeaveThisMonth)
            $types = LeaveType::where('id', '!=', $spl->id)->get();
          else
            $types = LeaveType::get();
        }else{
          $types = LeaveType::where('id', '!=', $spl->id)->get();
        }
      }else{
        $types = LeaveType::get();
      }
      $userId = auth()->id();
      foreach($types as $type){
          $leaveTypeId = $type->id;
          $type->taken = LeaveDate::whereYear('date', date('Y'))
                                ->whereIn('status', ['Approved'])
                                ->whereHas('leave', function ($q) use ($userId, $leaveTypeId) {
                                    $q->where('user_id', $userId)
                                      ->where('leave_type_id', $leaveTypeId);
                                })
                                ->count();
        }
      
        return view('pwa.leaveform', compact('types', 'rls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('name','leave_type_id','duration','reason');
        $data['user_id'] = auth()->id();
        if ($request->hasFile('file')) {
          $file = $request->file('file');
          $store_path = '/uploads/leave_attachments';
          $extension = File::extension($file->getClientOriginalName());
          $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
          $file->move(public_path($store_path), $filename);
          $data['file'] = $store_path.'/'.$filename;
        }
        $leave = Leave::create($data);
        $userId = auth()->id();
        $leaveTypeId = $request->leave_type_id;
        $leaveType = LeaveType::find($leaveTypeId);
        $year = date('Y');
        if($data['duration'] == 'Multiple Days'){
          $start = Carbon::parse($request->from_date);
          $end   = Carbon::parse($request->to_date);
          $dates = [];
          $period = CarbonPeriod::create($start, $end);
          foreach ($period as $_date) {
              $count = LeaveDate::whereYear('date', $year)
                                ->whereIn('status', ['Approved','Pending'])
                                ->whereHas('leave', function ($q) use ($userId, $leaveTypeId) {
                                    $q->where('user_id', $userId)
                                      ->where('leave_type_id', $leaveTypeId);
                                })
                                ->count();
              $date['leave_id'] = $leave->id;
              $date['date'] = $_date->format('Y-m-d');
              $date['paid'] = $count >= $leaveType->total ? 0 : 1;
              $date['status'] = 'Pending';
              LeaveDate::create($date);
          }
        }else{
          $count = LeaveDate::whereYear('date', $year)
                                ->whereIn('status', ['Approved','Pending'])
                                ->whereHas('leave', function ($q) use ($userId, $leaveTypeId) {
                                    $q->where('user_id', $userId)
                                      ->where('leave_type_id', $leaveTypeId);
                                })
                                ->count();
          $date['leave_id'] = $leave->id;
          $date['date'] = $request->date;
          $date['paid'] = $count >= $leaveType->total ? 0 : 1;
          $date['status'] = 'Pending';
          LeaveDate::create($date);
        }
        \Session::flash('success', 'Leave form submitted successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      $leave = Leave::find($id);
        return view('pwa.leaveview', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $leave = Leave::find($id);
        $spl = LeaveType::where('name', 'SCL - Special Casual Leave')->first();
        $rls = RestrictedHolidays::whereDate('date', '>=', date('Y-m-d'))->pluck('date')->toArray();
        $gender = auth()->user()->employee->gender;
        if($spl){
          if(in_array($gender, ['female', 'Female', 'FEMALE'])){
            $hasSplLeaveThisMonth = Leave::where('user_id', auth()->id())
                                  ->where('leave_type_id', $spl->id)
                                  ->whereHas('dates', function ($query) {
                                      $query->where('status', 'approved')
                                            ->whereMonth('date', Carbon::now()->month)
                                            ->whereYear('date', Carbon::now()->year);
                                  })
                                  ->exists();
            if($hasSplLeaveThisMonth)
              $types = LeaveType::where('id', '!=', $spl->id)->get();
            else
              $types = LeaveType::get();
          }else{
            $types = LeaveType::where('id', '!=', $spl->id)->get();
          }
        }else{
          $types = LeaveType::get();
        }
      
        return view('pwa.leaveEditform', compact('types', 'rls', 'leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->only('name','leave_type_id','duration','reason');
        if ($request->hasFile('file')) {
          $file = $request->file('file');
          $store_path = '/uploads/leave_attachments';
          $extension = File::extension($file->getClientOriginalName());
          $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
          $file->move(public_path($store_path), $filename);
          $data['file'] = $store_path.'/'.$filename;
        }
        Leave::find($id)->update($data);
        LeaveDate::where('leave_id', $id)->delete();
        $userId = auth()->id();
        $leaveTypeId = $request->leave_type_id;
        $leaveType = LeaveType::find($leaveTypeId);
        $year = date('Y');
        if($data['duration'] == 'Multiple Days'){
          $start = Carbon::parse($request->from_date);
          $end   = Carbon::parse($request->to_date);
          $dates = [];
          $period = CarbonPeriod::create($start, $end);
          foreach ($period as $_date) {
              $count = LeaveDate::whereYear('date', $year)
                                ->whereIn('status', ['Approved','Pending'])
                                ->whereHas('leave', function ($q) use ($userId, $leaveTypeId) {
                                    $q->where('user_id', $userId)
                                      ->where('leave_type_id', $leaveTypeId);
                                })
                                ->count();
              $date['leave_id'] = $id;
              $date['date'] = $_date->format('Y-m-d');
              $date['paid'] = $count >= $leaveType->total ? 0 : 1;
              $date['status'] = 'Pending';
              LeaveDate::create($date);
          }
        }else{
          $count = LeaveDate::whereYear('date', $year)
                                ->whereIn('status', ['Approved','Pending'])
                                ->whereHas('leave', function ($q) use ($userId, $leaveTypeId) {
                                    $q->where('user_id', $userId)
                                      ->where('leave_type_id', $leaveTypeId);
                                })
                                ->count();
          $date['leave_id'] = $id;
          $date['date'] = $request->date;
          $date['paid'] = $count >= $leaveType->total ? 0 : 1;
          $date['status'] = 'Pending';
          LeaveDate::create($date);
        }
        \Session::flash('success', 'Leave form submitted successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
