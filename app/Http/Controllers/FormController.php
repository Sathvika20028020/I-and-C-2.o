<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\District;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $districts = District::get();
       
        return view('google_form', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::get();
       
        return view('google_form', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $district = $request->input('district');
    $unitData = $request->input('unit_data', []);

    foreach ($request->unit_types as $unitType) {
        $fields = $unitData[$unitType] ?? [];

        // Handle file
        $filename = null;
        if ($request->hasFile("unit_data.$unitType.doc")) {
            $file = $request->file("unit_data.$unitType.doc");
            $filename = "form_" . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('documents', $filename, 'public');
        }

        // Store each unit’s data in DB
        Form::create([
            'district' => $district,
            'unittype' => $unitType,
            'document' => $filename,
            'address' => $fields['address'] ?? null,

            'group_a_kannadigas' => $fields['group_a_kannadigas'] ?? 0,
            'group_a_others' => $fields['group_a_others'] ?? 0,
            'group_b_kannadigas' => $fields['group_b_kannadigas'] ?? 0,
            'group_b_others' => $fields['group_b_others'] ?? 0,
            'group_c_kannadigas' => $fields['group_c_kannadigas'] ?? 0,
            'group_c_others' => $fields['group_c_others'] ?? 0,
            'group_d_kannadigas' => $fields['group_d_kannadigas'] ?? 0,
            'group_d_others' => $fields['group_d_others'] ?? 0,
        ]);
    }

    return redirect()->back()->with('success', 'Form submitted successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        //
    }
}
