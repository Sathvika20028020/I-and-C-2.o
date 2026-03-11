<?php

namespace App\Http\Controllers\Admin;

use App\Models\GovHoliday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GovHolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = GovHoliday::latest()->get();
        return view('reports.gov-holidays.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reports.gov-holidays.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $dates = explode(',', request('dates'));
      foreach($dates as $date){
        GovHoliday::create(['date'=>trim($date)]);
      }
        return redirect()->route('gov-holidays.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(GovHolidays $govHolidays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GovHolidays $govHolidays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GovHolidays $govHolidays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GovHolidays $govHolidays)
    {
        //
    }
}
