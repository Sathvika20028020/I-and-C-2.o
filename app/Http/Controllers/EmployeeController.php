<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Imports\EmployeeImport;
use App\Exports\ExelExportTwo;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use App\Services\WhatsAppOtpService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Designation;
use App\Models\Child;
use App\Models\Policy;




class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   

    public function requestOtp(Request $request, WhatsAppOtpService $whatsappOtpService)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'folder_id' => 'required|exists:folders,id',
            'changes' => 'required|array',
        ]);

       // $otp = rand(100000, 999999);
       $otp = (string) rand(100000, 999999);


        DB::table('update_verifications')->insert([
            'user_id' => $user->id,
            'otp' => $otp,
            'changes' => json_encode($validated['changes']),
            'ip_address' => $request->ip(),
            'expires_at' => now()->addMinutes(5),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $mobileNumber = $user->phone; 
            $countryCode = "+91"; 

            $fullNumber = $countryCode . $mobileNumber; 

            $sent = $whatsappOtpService->sendOtp($fullNumber, $otp);

        if ($sent) {
            return response()->json(['message' => 'OTP sent to your WhatsApp number.','res' =>$sent]);
        } else {
            return response()->json(['error' => 'Failed to send OTP.'], 500);
        }
    }

        public function verifyOtpAndUpdate(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'otp' => 'required|string',
        ]);

        // Retrieve the OTP entry for the user that hasn't expired
        $otpEntry = DB::table('update_verifications')
            ->where('user_id', $user->id)
            ->where('otp', $validated['otp'])
            ->where('expires_at', '>', now())
            ->latest('created_at')
            ->first();

        if (!$otpEntry) {
            return response()->json(['error' => 'Invalid or expired OTP.'], 422);
        }

        // Decode the changes from JSON stored earlier
        $changes = json_decode($otpEntry->changes, true);


        return response()->json(['message' => 'OTP verified and folder updated successfully.']);
    }



     public function import(Request $request)
    {
       // dd($request->file('file'));

        ini_set('max_execution_time', 900); 
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
      // dd($request);
        Excel::import(new EmployeeImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function export(Request $request)
    {
        $ids = json_decode($request->input('selected_ids'), true);
    
        if (empty($ids)) {
            return Excel::download(new EmployeeExport(), 'All_Employees.xlsx');
        }
    
        // Export only selected employees
        return Excel::download(new EmployeeExport($ids), 'Selected_Employees.xlsx');
    }
    // public function export(Request $request){
    //   $ids = json_decode($request->input('selected_ids'), true);
    //   return Excel::download(new EmployeeExport($ids), 'Employees Of I & C.xlsx');
    // }
    
   
    
    public function industriesindex(){
                return view('reports.LargeIndustries.dashboard');

    }

    public function index()
    {
        return view('reports.HRmanagement.dashboard');
    }

     public function getFilterOptions(Request $request)
        {
            \Log::info('Incoming Filter Request:', $request->all());
            // Helper to apply filters except the current one
            $applyFilters = function ($excludeField = null) use ($request) {
                $query = Employee::query();
        
                if ($excludeField !== 'gender' && $request->filled('gender')) {
                    $query->where('gender', $request->gender);
                }
                if ($excludeField !== 'district' && $request->filled('district')) {
                    $query->where('district', $request->district);
                }
                if ($excludeField !== 'social' && $request->filled('social')) {
                    $query->where('category', $request->social);
                }
                if ($excludeField !== 'drpr' && $request->filled('drpr')) {
                    $query->where('DR_PR', $request->drpr);
                }
                if ($excludeField !== 'designationtype' && $request->filled('designationtype')) {
                    $query->where('designation', $request->designationtype);
                }
                if ($excludeField !== 'grouptype' && $request->filled('grouptype')) {
                    $query->where('group', $request->grouptype);
                }
                 if ($excludeField !== 'cadretype' && $request->filled('cadretype')) {
                    $query->where('cadre_type', $request->cadretype);
                }
             
        
                return $query;
            };
        
            return response()->json([
               'gender' => $applyFilters('gender')->select('gender')->distinct()->pluck('gender'),
                'category' => $applyFilters('social')->select('category')->distinct()->pluck('category'),
                'district' => $applyFilters('district')->select('district')->distinct()->pluck('district'),
                'DR_PR' => $applyFilters('drpr')->select('DR_PR')->distinct()->pluck('DR_PR'),
                'designation' => $applyFilters('designationtype')->select('designation')->distinct()->pluck('designation'),
                'group' => $applyFilters('grouptype')->select('group')->distinct()->pluck('group'),
                'cadre_type' => $applyFilters('cadretype')->select('cadre_type')->distinct()->pluck('cadre_type'),
            ]);
        }
        
public function getData(Request $request)
{
   
    $query = Employee::query();

    if ($request->filled('emp_name')) {
        $query->where('emp_name', $request->emp_name);
    }
     if ($request->filled('dob')) {
        $query->where('dob', $request->dob);
    }
     if ($request->filled('doj')) {
        $query->where('doj', $request->doj);
    }
     if ($request->filled('dor')) {
        $query->where('dor', $request->dor);
    }
      if ($request->filled('cadre_type')) {
        $query->where('cadre_type', $request->cadre_type);
    }
    if ($request->filled('gender')) {
        $query->where('gender', $request->gender);
    }

    if ($request->filled('district')) {
        $query->where('district', $request->district);
    }

    if ($request->filled('social')) {
        $query->where('category', $request->social);
    }

    if ($request->filled('drpr')) {
        $query->where('DR_PR', $request->drpr);
    }

    if ($request->filled('designationtype')) {
        $query->where('designation', $request->designationtype);
    }

    if ($request->filled('grouptype')) {
        $query->where('group', $request->grouptype);
    }

    return DataTables::eloquent($query)
        ->addIndexColumn()
        ->make(true); 
}


public function getFilteredCounts(Request $request)
{
    $applyFilters = function ($query) use ($request) {
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }
        if ($request->filled('cadre')) {
            $query->where('cadre_type', $request->cadre);
        }
        if ($request->filled('district')) {
            $query->where('district', $request->district);
        }
        if ($request->filled('social')) {
            $query->where('category', $request->social);
        }
        if ($request->filled('drpr')) {
            $query->where('DR_PR', $request->drpr);
        }
        if ($request->filled('designationtype')) {
            $query->where('designation', $request->designationtype);
        }
        if ($request->filled('group')) {
            $query->where('group', $request->group);
        }
        if ($request->filled('fromdate')) {
            $query->whereDate('created_at', '>=', $request->fromdate);
        }
        if ($request->filled('todate')) {
            $query->whereDate('created_at', '<=', $request->todate);
        }
        return $query;
    };

    // Gender Counts
    $genderCounts = collect(['Male', 'Female', 'OTHERS'])->mapWithKeys(function ($gender) use ($request, $applyFilters) {
        $query = \App\Models\Employee::query();
        $applyFilters($query);
        return [$gender => $query->where('gender', $gender)->count()];
    });

    // Social Categories
    $socialCategories = ['GM', '3B', '3A', '2B', '2A', 'CAT-1', 'Cat I', 'SC', 'ST'];
    $socialCounts = collect($socialCategories)->mapWithKeys(function ($category) use ($request, $applyFilters) {
        $query = \App\Models\Employee::query();
        $applyFilters($query);
        return [$category => $query->where('category', $category)->count()];
    });

    // DR/PR
    $drprCounts = collect(['DR', 'PR'])->mapWithKeys(function ($type) use ($request, $applyFilters) {
        $query = \App\Models\Employee::query();
        $applyFilters($query);
        return [$type => $query->where('DR_PR', $type)->count()];
    });

    // Designation Types
    $designationList = [
        'Assistant Director (Statistics)', 'Industrial Extension Officer', 'Director (MSME)',
        'Additional Director', 'Accounts officer', 'Joint Director', 'Deputy Director',
        'Assistant Director', 'Deputy Director (Statistics)', 'Superintendent'
    ];
    $designationCounts = collect($designationList)->mapWithKeys(function ($designation) use ($request, $applyFilters) {
        $query = \App\Models\Employee::query();
        $applyFilters($query);
        return [$designation => $query->where('designation', $designation)->count()];
    });

    // Group Type
    $groupTypes = ['A', 'B', 'C', 'D'];
    $groupCounts = collect($groupTypes)->mapWithKeys(function ($group) use ($request, $applyFilters) {
        $query = \App\Models\Employee::query();
        $applyFilters($query);
        return [$group => $query->where('group', $group)->count()];
    });

    // Cadre Type
    $cadreTypes = ['Ncadre', 'Cadre', 'Deputation-to AS', 'On Suspension']; // Adjust if needed
    $cadreCounts = collect($cadreTypes)->mapWithKeys(function ($cadre) use ($request, $applyFilters) {
        $query = \App\Models\Employee::query();
        $applyFilters($query);
        return [$cadre => $query->where('cadre_type', $cadre)->count()];
    });

    return response()->json([
        'genderCounts' => $genderCounts,
        'socialCategoryCounts' => $socialCounts,
        'drpr' => $drprCounts,
        'designationtype' => $designationCounts,
        'grouptype' => $groupCounts,
        'cadre' => $cadreCounts,
    ]);
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
    public function show($id)
    {
       $employee = Employee::find($id);
          return view('reports.HRmanagement.view', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        
          $data['district'] = DB::table('employees')->whereNotNull('district')->where('district', '!=', '')->distinct()->pluck('district')->toArray();
           $data['gender'] = DB::table('employees')->whereNotNull('gender')->where('gender', '!=', '')->distinct()->pluck('gender')->toArray();
            $data['designation'] = DB::table('employees')->whereNotNull('designation')->where('designation', '!=', '')->distinct()->pluck('designation')->toArray();
            $data['group'] = DB::table('employees')->whereNotNull('group')->where('group', '!=', '')->distinct()->pluck('group')->toArray();
            $data['cadre_type'] = DB::table('employees')->whereNotNull('cadre_type')->where('cadre_type', '!=', '')->distinct()->pluck('cadre_type')->toArray();
            $data['taluk'] = $employee->post_district_id ? DB::table('taluks')->where('district_id', $employee->post_district_id)->orderBy('name')->distinct()->pluck('name')->toArray() : [];
            $data['DR_PR'] = DB::table('employees')->whereNotNull('DR_PR')->where('DR_PR', '!=', '')->distinct()->pluck('DR_PR')->toArray();
            $data['category'] = DB::table('employees')->whereNotNull('category')->where('category', '!=', '')->distinct()->pluck('category')->toArray();
            $data['sub_category'] = DB::table('employees')->whereNotNull('sub_category')->where('sub_category', '!=', '')->distinct()->pluck('sub_category')->toArray();
            $data['designations'] = $employee->post_group != '' ? Designation::where('group', $employee->post_group)->orderBy('name')->distinct()->pluck('name')->toArray() : [];
            // dd($data);
        return view('reports.HRmanagement.edit', compact('employee','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //   $data = $request->except('_token');
    //   Employee::find($id)->update($data);
    //     return redirect()->route('employee');
    // }

    public function update(Request $request, $id)
{
    $user = Auth::user();

    // STEP 2: Proceed with update
    $data = $request->except('_token','children','policies');
    $employee = Employee::findOrFail($id);
    $employee->update($data);

    if($request->children && count($request->children) > 0){
      foreach ($request->children as $id => $child) {
          Child::findOrFail($id)->update($child);
      }
    }

    if($request->policies && count($request->policies) > 0){
      foreach ($request->policies as $id => $policy) {
          Policy::findOrFail($id)->update($policy);
      }
    }

    // STEP 3: Log the update in the latest OTP record for this user
    $latestOtp = DB::table('update_verifications')
        ->where('user_id', $user->id)
        ->orderByDesc('created_at')
        ->first();

    if ($latestOtp) {
        DB::table('update_verifications')
            ->where('id', $latestOtp->id)
            ->update([
                'table_name' => 'employees',
                'table_record' => $employee->id,
                'updated_at' => now(),
            ]);
    }

    return redirect()->route('employee')->with('success', 'Employee updated and action logged.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }


    // otp verification

   
}
