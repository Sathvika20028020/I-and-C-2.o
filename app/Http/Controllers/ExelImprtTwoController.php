<?php

namespace App\Http\Controllers;

use App\Models\ExelImprtTwo;
use Illuminate\Http\Request;
use App\Imports\ExelImprtTwoImport;
use App\Models\ExelImprtTwoDemo;
use App\Exports\ExelExportTwo;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;


class ExelImprtTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function import(Request $request)
    {
       // dd($request->file('file'));

        ini_set('max_execution_time', 900); 
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
      // dd($request);
        Excel::queueImport(new ExelImprtTwoImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
    
    public function dashboard(){
        $districts = ExelImprtTwo::select('district')->distinct()->get();
       
            return view('reports.SarojiniMahishi.dashboard',compact('districts'));
    }

    

    public function getData(Request $request)
{
    info('Filter data', $request->all());

    $query = ExelImprtTwo::query();

    // Apply filters
    if ($request->has('district') && $request->district != '') {
        $query->where('district', $request->district);
    }

    // Clone for summary so we don't affect the DataTables query
    $summaryQuery = clone $query;

    // Calculate summary
    $summary = $summaryQuery->selectRaw('
        SUM(total_g1) as group_a_total,
        SUM(kannadiga_g1) as group_a_kannadiga,
        SUM(others_g1) as group_a_others,
        ROUND((SUM(kannadiga_g1)*100)/SUM(total_g1),3)as group_a_percentage_kannadiga,
        SUM(total_g2) as group_b_total,
        SUM(kannadiga_g2) as group_b_kannadiga,
        SUM(others_g2) as group_b_others,
      ROUND((SUM(kannadiga_g2)*100)/SUM(total_g2),3) as group_b_percentage,
        SUM(total_g3) as group_c_total,
        SUM(kannadiga_g3) as group_c_kannadiga,
        SUM(others_g3) as group_c_others,
       ROUND((SUM(kannadiga_g3)*100)/SUM(total_g3),3) as group_c_percentage,
        SUM(total_g4) as group_d_total,
        SUM(kannadiga_g4) as group_d_kannadiga,
        SUM(others_g4) as group_d_others,
       ROUND((SUM(kannadiga_g4)*100)/SUM(total_g4),3) as group_d_percentage
    ')->first();

    // Return both table data and summary in JSON
    return response()->json([
        'datatable' => DataTables::eloquent($query)->addIndexColumn()->toArray(),
        'summary' => $summary,
    ]);
}


    public function view($id)
    {
        $user = ExelImprtTwo::findOrFail($id);
        return view('reports.SarojiniMahishi.viewdashboardtwo', compact('user'));
    }
    
    // Excel export function

    public function exportsarojini(Request $request)
    {
        $ids = $request->input('selected_ids');

        if (!$ids || count($ids) === 0) {
            return back()->with('error', 'No rows selected.');
        }

        return Excel::download(new ExelExportTwo($ids), 'Sarojini_Mahishi_Report.xlsx');
    }


// DashboardTwoController.php
public function getAllIds(Request $request)
{
    $query = ExelImprtTwo::query();

    if ($request->has('district') && $request->district) {
        $query->where('district', $request->district);
    }

    $ids = $query->pluck('id')->toArray();

    return response()->json(['ids' => $ids]);
}


public function edit(ExelImprtTwo $exelImprtTwo,$id)
{
    $usertwo =   ExelImprtTwoDemo::where('id',$id)->first();
  //  dd($usertwo);
    return view('reports.SarojiniMahishi.editdashboardtwo',compact('usertwo'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, ExelImprtTwo $exelImprtTwo,$id)
{
   
$request->validate([
'district' => 'required|string|max:255', // supports Kannada or other languages
'divisions' => 'required|integer',

'kannadiga_g1' => 'required|integer',
'others_g1' => 'required|integer',
'total_g1' => 'required|integer',
'percent_g1' => 'required|numeric|between:0,1',

'kannadiga_g2' => 'required|integer',
'others_g2' => 'required|integer',
'total_g2' => 'required|integer',
'percent_g2' => 'required|numeric|between:0,1',

'kannadiga_g3' => 'required|integer',
'others_g3' => 'required|integer',
'total_g3' => 'required|integer',
'percent_g3' => 'required|numeric|between:0,1',

'kannadiga_g4' => 'required|integer',
'others_g4' => 'required|integer',
'total_g4' => 'required|integer',
'percent_g4' => 'required|numeric|between:0,1',

'total_kannadiga' => 'required|integer',
'others_total' => 'required|integer',
'total' => 'required|integer',
'percentage' => 'required|numeric|between:0,1',
]);

$data = $request->except(['_token', '_method']);
    
    ExelImprtTwoDemo::where('id',$id)->update($data);
    
    return redirect()->route('dashboard.importtwo')->with('success','data updated successfully!');
}

















    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ExelImprtTwo $exelImprtTwo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExelImprtTwo $exelImprtTwo)
    {
        //
    }
}
