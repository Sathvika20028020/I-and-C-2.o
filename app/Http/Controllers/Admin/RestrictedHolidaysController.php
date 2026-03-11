<?php

namespace App\Http\Controllers\Admin;

use App\Models\RestrictedHolidays;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestrictedHolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = RestrictedHolidays::latest()->get();
        return view('reports.restricted-holidays.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reports.restricted-holidays.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $dates = explode(',', request('dates'));
      foreach($dates as $date){
        RestrictedHolidays::create(['date'=>trim($date)]);
      }
        return redirect()->route('restricted-holidays.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(RestrictedHolidays $restrictedHolidays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RestrictedHolidays $restrictedHolidays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RestrictedHolidays $restrictedHolidays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RestrictedHolidays $restrictedHolidays)
    {
        //
    }
}
