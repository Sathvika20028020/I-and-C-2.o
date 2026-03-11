<?php

namespace App\Http\Controllers;

use App\Models\ExelImprtTwoDemo;
use Illuminate\Http\Request;
use App\Models\ExelImprtTwo;

class ExelImprtTwoDemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function dashboard(){
        $districts = ExelImprtTwo::select('district')->distinct()->get();
       
            return view('reports.SarojiMahishi.dashboard',compact('districts'));
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
        (SUM(kannadiga_g1)*100)/SUM(total_g1) as group_a_percentage_kannadiga,
        SUM(total_g2) as group_b_total,
        SUM(kannadiga_g2) as group_b_kannadiga,
        SUM(others_g2) as group_b_others,
        (SUM(kannadiga_g2)*100)/SUM(total_g2) as group_b_percentage,
        SUM(total_g3) as group_c_total,
        SUM(kannadiga_g3) as group_c_kannadiga,
        SUM(others_g3) as group_c_others,
       (SUM(kannadiga_g3)*100)/SUM(total_g3) as group_c_percentage,
        SUM(total_g4) as group_d_total,
        SUM(kannadiga_g4) as group_d_kannadiga,
        SUM(others_g4) as group_d_others,
       (SUM(kannadiga_g4)*100)/SUM(total_g4) as group_d_percentage
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
        return view('reports.SarojiMahishi.viewdashboardtwo', compact('user'));
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
    public function show(ExelImprtTwoDemo $exelImprtTwoDemo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExelImprtTwoDemo $exelImprtTwoDemo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExelImprtTwoDemo $exelImprtTwoDemo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExelImprtTwoDemo $exelImprtTwoDemo)
    {
        //
    }
}
