<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\GovHoliday;
use App\Exports\AttendanceExport;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = Attendance::latest()->get();
        $names = array_unique($entries->pluck('name')->toArray());
        $departments = array_unique($entries->pluck('department')->toArray());
        $statuses = array_unique($entries->pluck('status')->toArray());
        sort($names);sort($statuses);sort($departments);
        // dd($names, $statuses, $departments);
        return view('reports.attendance.index', compact('names','statuses','departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        ## Read value
          $draw = $request->get('draw');
          $start = $request->get("start");
          $rowperpage = $request->get("length"); 

          $columnIndex_arr = $request->get('order');
          $columnName_arr = $request->get('columns');
          $order_arr = $request->get('order');
          $search_arr = $request->get('search');

          $columnIndex = $columnIndex_arr[0]['column'];
          $columnName = $columnName_arr[$columnIndex]['data']; 
          $columnSortOrder = $order_arr[0]['dir']; 
          $searchValue = $search_arr['value'];

          $name = $request->name;
          $department = $request->department;
          $status = $request->status;
          $holidays = GovHoliday::pluck('date')->toArray();

        // Total records
          $totalRecords = Attendance::when($name, function ($query, $name) {
                                return $query->whereIn('name', $name);
                            })->when($department, function ($query, $department) {
                                return $query->whereIn('department', $department);
                            })->when($status, function ($query, $status) {
                                return $query->whereIn('status', $status);
                            })->whereNotIn('attendance_date', $holidays)->count();
          $totalRecordswithFilter = Attendance::when($name, function ($query, $name) {
                                return $query->whereIn('name', $name);
                            })->when($department, function ($query, $department) {
                                return $query->whereIn('department', $department);
                            })->when($status, function ($query, $status) {
                                return $query->whereIn('status', $status);
                            })->whereNotIn('attendance_date', $holidays)
            ->where(function($q) use($searchValue) {
              $q->where('name', 'like', '%' .$searchValue . '%');
              $q->orWhere('department', 'like', '%' .$searchValue . '%');
              $q->orWhere('status', 'like', '%' .$searchValue . '%');
              $q->orWhere('shift', 'like', '%' .$searchValue . '%');
              $q->orWhere('person_id', 'like', '%' .$searchValue . '%');
            })
            ->count();

        // Fetch records
          $records = Attendance::when($name, function ($query, $name) {
                                return $query->whereIn('name', $name);
                            })->when($department, function ($query, $department) {
                                return $query->whereIn('department', $department);
                            })->when($status, function ($query, $status) {
                                return $query->whereIn('status', $status);
                            })->whereNotIn('attendance_date', $holidays)
            ->where(function($q) use($searchValue) {
              $q->where('name', 'like', '%' .$searchValue . '%');
              $q->orWhere('department', 'like', '%' .$searchValue . '%');
              $q->orWhere('status', 'like', '%' .$searchValue . '%');
              $q->orWhere('shift', 'like', '%' .$searchValue . '%');
              $q->orWhere('person_id', 'like', '%' .$searchValue . '%');
            })
            ->latest()
            ->skip($start)
            ->take($rowperpage)
            ->get();
          $data_arr = array();
        
        foreach($records as $key => $record){
          $data_arr[] = array(
              "id" => $key+1,
              "person_id" => $record->person_id,
              "name" => $record->name,
              "department" => $record->department,
              "attendance_date" => $record->attendance_date,
              "shift" => $record->shift,
              "timetable" => $record->timetable,
              "status" => $record->status,
              "check_in" => $record->check_in,
              "check_out" => $record->check_out,
              "late_minutes" => $record->late_minutes,
              "early_leave_minutes" => $record->early_leave_minutes,
              "attended_minutes" => $record->attended_minutes,
          );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try{
        $request->validate([
          'file' => 'required|mimes:xls,xlsx,csv,txt'
        ]);

        Excel::import(new AttendanceImport, $request->file('file'));
      }catch(\Exception $e){
        dd($e);
      }
        return back()->with('success', 'Attendance imported successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $type)
    {
        $name = $request->names;
        $department = $request->departments;
        $status = $request->statuses;
        $holidays = GovHoliday::pluck('date')->toArray();

        $entries = Attendance::when($name, function ($query, $name) {
                                return $query->whereIn('name', $name);
                            })->when($department, function ($query, $department) {
                                return $query->whereIn('department', $department);
                            })->when($status, function ($query, $status) {
                                return $query->whereIn('status', $status);
                            })->whereNotIn('attendance_date', $holidays)->latest()->get();
        $data = [];
        foreach($entries as $record){
          $data[] = [
            $record->person_id,
            $record->department,
            $record->name,
            $record->attendance_date,
            $record->status,
            $record->check_in,
            $record->check_out,
            $record->late_minutes,
            $record->early_leave_minutes,
          ];
        }
        return Excel::download(new AttendanceExport($data), 'Attendance.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $list)
    {
      if($request->departments && count($request->departments))
        $entries = Attendance::select('name')->whereIn('department', $request->departments)->distinct()->orderBy('name')->get()->pluck('name')->toArray();
      else
        $entries = Attendance::select('name')->distinct()->orderBy('name')->get()->pluck('name')->toArray();
        return response()->json([
          'success' => true,
          'users' => $entries
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
