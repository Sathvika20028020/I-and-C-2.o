<?php

namespace App\Http\Controllers;

use App\Models\ExelImprtOne;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Imports\ExelImprtOneImport;
use Illuminate\Support\Facades\Auth;
use App\Exports\ExelExportOne;
use App\Models\ExelImprtOneDemo;
use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Helpers\ExportHelper;


class ExelImprtOneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function import(Request $request)
        {
            ini_set('max_execution_time', 3000); 
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv'
            ]);
            //config(['queue.default' => 'sync']);
            // Excel::queueImport(new ExelImprtOneImport, $request->file('file'));

            $this->startQueueWorkerInBackground($request);
         //  app(\App\Services\QueueRunner::class)->runWorkerOnce();
         //   Excel::import(new ExelImprtOneImport, $request->file('file'));

            return redirect()->back()->with('success', 'Data imported successfully!');
        }

        private function startQueueWorkerInBackground($request)
        {
           
            Excel::queueImport(new ExelImprtOneImport, $request->file('file'));
            app(\App\Services\QueueRunner::class)->runWorkerOnce();

        }
        public function getAllIds(Request $request)
{
    $query = Employee::query();

      if ($request->filled('cadre')) {
        $query->where('cadre_type', $request->cadre);
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

    // Get only the IDs
    $res = $query->get();
    $ids = $res->pluck('id');

    return response()->json(['ids' => $ids, 'res'=>$res]);
}

// public function getAllIds(Request $request)
// {
//     $query = ExelImprtOne::query();

//     if ($request->filled('gender')) {
//         $query->where('gender', $request->gender);
//     }

//     if ($request->filled('district')) {
//         $query->where('district', $request->district);
//     }

//     $ids = $query->pluck('id')->toArray();

//     return response()->json(['ids' => $ids]);
// }


      

        public function dashboard(){
          
            $genders = ExelImprtOne::select('Gender')->distinct()->get();
            $districts = ExelImprtOne::select('DISTRICT_NAME')->distinct()->get();
            $social_categories = ExelImprtOne::select('SocialCategory')->distinct()->get();
            $major_activities = ExelImprtOne::select('MajorActivity')->distinct()->get();
            $organization_type = ExelImprtOne::select('OrganisationType')->distinct()->get();
            $enterprise_type = ExelImprtOne::select('EnterpriseType')->distinct()->get();
            $pincodes = ExelImprtOne::select('PINCode')->distinct()->get();
          
            $fromDate = ExelImprtOne::min('CreateDate');
            $toDate = ExelImprtOne::max('CreateDate');

            $fromDateFormatted = Carbon::parse($fromDate)->format('F d, Y'); 
            $toDateFormatted = Carbon::parse($toDate)->format('F d, Y'); 

           // dd(Auth::user()->folders); 
            
            return view('reports.Udyog Aadhaar Memorandum.dashboard', compact(
                'genders', 
                'districts', 
                'social_categories', 
                'major_activities', 
                'organization_type', 
                'enterprise_type', 
                'pincodes',
                'fromDateFormatted',
                'toDateFormatted'
                
            ));
        }
        
        public function getFilterOptions(Request $request)
        {
            \Log::info('Incoming Filter Request:', $request->all());
            // Helper to apply filters except the current one
            $applyFilters = function ($excludeField = null) use ($request) {
                $query = ExelImprtOne::query();
        
                if ($excludeField !== 'gender' && $request->filled('gender')) {
                    $query->where('Gender', $request->gender);
                }
                if ($excludeField !== 'district' && $request->filled('district')) {
                    $query->where('DISTRICT_NAME', $request->district);
                }
                if ($excludeField !== 'social' && $request->filled('social')) {
                    $query->where('SocialCategory', $request->social);
                }
                if ($excludeField !== 'majoractivity' && $request->filled('majoractivity')) {
                    $query->where('MajorActivity', $request->majoractivity);
                }
                if ($excludeField !== 'organizationtype' && $request->filled('organizationtype')) {
                    $query->where('OrganisationType', $request->organizationtype);
                }
                if ($excludeField !== 'enterprisetype' && $request->filled('enterprisetype')) {
                    $query->where('EnterpriseType', $request->enterprisetype);
                }
                if ($excludeField !== 'pincodetype' && $request->filled('pincodetype')) {
                    $query->where('PINCode', $request->pincodetype);
                }

                if ($request->filled('fromdate')) {
                    $query->whereDate('CreateDate', '>=', $request->fromdate); 
                }
                
                if ($request->filled('todate')) {
                    $query->whereDate('CreateDate', '<=', $request->todate);
                }
                
        
                return $query;
            };
        
            return response()->json([
                'genders' => $applyFilters('gender')->select('Gender')->distinct()->pluck('Gender'),
                'districts' => $applyFilters('district')->select('DISTRICT_NAME')->distinct()->pluck('DISTRICT_NAME'),
                'socialCategories' => $applyFilters('social')->select('SocialCategory')->distinct()->pluck('SocialCategory'),
                'majorActivities' => $applyFilters('majoractivity')->select('MajorActivity')->distinct()->pluck('MajorActivity'),
                'organizationTypes' => $applyFilters('organizationtype')->select('OrganisationType')->distinct()->pluck('OrganisationType'),
                'enterpriseTypes' => $applyFilters('enterprisetype')->select('EnterpriseType')->distinct()->pluck('EnterpriseType'),
                'pincodes' => $applyFilters('pincodetype')->select('PINCode')->distinct()->pluck('PINCode'),
            ]);
        }
        
public function getData(Request $request)
{
   // \Log::info('Incoming Filter Request:', $request->all());
    $query = ExelImprtOne::query();

   
    if ($request->filled('gender')) {
        $query->where('Gender', $request->gender);
    }

    if ($request->filled('district')) {
        $query->where('DISTRICT_NAME', $request->district);
    }

    if ($request->filled('social')) {
        $query->where('SocialCategory', $request->social);
    }

    if ($request->filled('majoractivity')) {
        $query->where('MajorActivity', $request->majoractivity);
    }

    if ($request->filled('organizationtype')) {
        $query->where('OrganisationType', $request->organizationtype);
    }

    if ($request->filled('enterprisetype')) {
        $query->where('EnterpriseType', $request->enterprisetype);
    }

    if ($request->filled('pincodetype')) {
        $query->where('PINCode', $request->pincodetype);
    }

    // if ($request->filled('CreateDate')) {
    //     $query->where('CreateDate', $request->CreateDate);
    // }
    
    if ($request->filled('fromdate')) {
        $query->whereDate('CreateDate', '>=', $request->fromdate); 
    }
    if ($request->filled('todate')) {
        $query->whereDate('CreateDate', '<=', $request->todate);
    }

   
   // \Log::info('Query:', ['sql' => $query->toSql(), 'bindings' => $query->getBindings()]);
    // Apply pagination and sorting
 //   $query->orderBy('CreateDate', 'desc'); // Default sorting by CreateDate
   // $query->orderBy('id', 'Desc'); // Default sorting by id
    return DataTables::eloquent($query)
        ->addIndexColumn()
        ->make(true); 
}


public function getFilteredCounts(Request $request)
{
   // \Log::info('Incoming Filter Request:', $request->all());
    // Base filters to apply for all counts
    $baseFilters = [
        'district' => $request->district,
        'majoractivity' => $request->majoractivity,
        'organizationtype' => $request->organizationtype,
        'enterprisetype' => $request->enterprisetype,
        'pincode' => $request->pincodetype,
    ];

    $applyDateRange = function ($query) use ($request) {
        if ($request->filled('fromdate')) {
            $query->whereDate('CreateDate', '>=', $request->fromdate);
        }
        if ($request->filled('todate')) {
            $query->whereDate('CreateDate', '<=', $request->todate);
        }
        return $query;
    };
    
   



    // Helper: apply base filters to a query
    $applyBaseFilters = function ($query, $skip = null) use ($baseFilters) {
        foreach ($baseFilters as $column => $value) {
            if ($value && $column !== $skip) {
                // $dbColumn = strtoupper($column) === 'DISTRICT' ? 'DISTRICT_NAME' : ucfirst($column);
                $dbColumn = match ($column) {
                    'district' => 'DISTRICT_NAME',
                    'pincode' => 'PINCode', 
                    'organizationtype' => 'OrganisationType',
                    'enterprisetype' => 'EnterpriseType',
                    'majoractivity' => 'MajorActivity',
                    default => ucfirst($column),
                };
                
                $query->where($dbColumn, $value);
            }
        }
        return $query;
    };

   
    
    $genderCounts = collect(['Male', 'Female', 'OTHERS'])->mapWithKeys(function ($gender) use ($request, $applyBaseFilters, $applyDateRange) {
    if ($request->gender && $request->gender !== $gender) {
        return [$gender => 0]; // return 0 for other genders
    }

    $query = ExelImprtOne::query();
    $query = $applyBaseFilters($query);
    $query = $applyDateRange($query);
    
    if ($request->social) {
        $query->where('SocialCategory', $request->social);
    }

   


    return [$gender => $query->where('Gender', $gender)->count()];
    });


  
    
    $socialCounts = collect(['General', 'OBC', 'SC', 'ST'])->mapWithKeys(function ($social) use ($request, $applyBaseFilters, $applyDateRange) {
    if ($request->social && $request->social !== $social) {
        return [$social => 0]; // return 0 for other categories
    }

    $query = ExelImprtOne::query();
    $query = $applyBaseFilters($query);
    $query = $applyDateRange($query);

        if ($request->gender) {
            $query->where('Gender', $request->gender);
        }

       


        return [$social => $query->where('SocialCategory', $social)->count()];
    });


    // ðŸ”¹ Major Activity Counts
    $activities = ['Services', 'Trading', 'Manufacturing'];
    $activityCounts = collect($activities)->mapWithKeys(function ($activity) use ($request, $applyBaseFilters, $applyDateRange) {
        $query = ExelImprtOne::query();
  
     $query = $applyBaseFilters($query);
     $query = $applyDateRange($query);
        if ($request->gender) {
            $query->where('Gender', $request->gender);
        }
        if ($request->social) {
            $query->where('SocialCategory', $request->social);
        }

      

        return [$activity => $query->where('MajorActivity', $activity)->count()];
    });

    // ðŸ”¹ Organization Types
    $organizationTypes = [
        'Proprietary', 'Others', 'Partnership', 'Private Limited Company',
        'Limited Liability Partnership', 'Trust', 'Hindu Undivided Family',
        'Self Help Group', 'Society', 'Public Limited Company', 'Co-Operative'
    ];
    $organizationCounts = collect($organizationTypes)->mapWithKeys(function ($type) use ($request, $applyBaseFilters, $applyDateRange) {
        $query = ExelImprtOne::query();
       // $query = $applyBaseFilters($query, 'organizationtype');
       $query = $applyBaseFilters($query);
       $query = $applyDateRange($query);
        if ($request->gender) {
            $query->where('Gender', $request->gender);
        }
        if ($request->social) {
            $query->where('SocialCategory', $request->social);
        }
        if ($request->majoractivity) {
            $query->where('MajorActivity', $request->majoractivity);
        }
      

        return [$type => $query->where('OrganisationType', $type)->count()];
    });

    // ðŸ”¹ Enterprise Types
    $enterpriseTypes = ['Micro', 'Small', 'Medium'];
    $enterpriseCounts = collect($enterpriseTypes)->mapWithKeys(function ($type) use ($request, $applyBaseFilters, $applyDateRange) {
        $query = ExelImprtOne::query();
     //   $query = $applyBaseFilters($query, 'enterprisetype');
     $query = $applyBaseFilters($query);
     $query = $applyDateRange($query);
        if ($request->gender) {
            $query->where('Gender', $request->gender);
        }
        if ($request->social) {
            $query->where('SocialCategory', $request->social);
        }
        if ($request->majoractivity) {
            $query->where('MajorActivity', $request->majoractivity);
        }
        
      
        return [$type => $query->where('EnterpriseType', $type)->count()];
    });

    return response()->json([
        'genderCounts' => $genderCounts,
        'socialCategoryCounts' => $socialCounts,
        'majoractivity' => $activityCounts,
        'organizationtypes' => $organizationCounts,
        'enterprisetype' => $enterpriseCounts,
    ]);
}

// public function getFilteredCountsold(Request $request)
// {
//     // Base filters to apply for all counts
//     $baseFilters = [
//         'district' => $request->district,
//         'majoractivity' => $request->majoractivity,
//         'organizationtype' => $request->organizationtype,
//         'enterprisetype' => $request->enterprisetype,
//         'pincode' => $request->pincodetype,
//     ];
//     \Log::info('Incoming Filter Request:', $request->all());



//     // Helper: apply base filters to a query
//     $applyBaseFilters = function ($query, $skip = null) use ($baseFilters) {
//         foreach ($baseFilters as $column => $value) {
//             if ($value && $column !== $skip) {
//                 // $dbColumn = strtoupper($column) === 'DISTRICT' ? 'DISTRICT_NAME' : ucfirst($column);
//                 $dbColumn = match ($column) {
//                     'district' => 'DISTRICT_NAME',
//                     'pincode' => 'PINCode', 
//                     'organizationtype' => 'OrganisationType',
//                     'enterprisetype' => 'EnterpriseType',
//                     'majoractivity' => 'MajorActivity',
//                     default => ucfirst($column),
//                 };
                
//                 $query->where($dbColumn, $value);
//             }
//         }
//         return $query;
//     };

//     // 🔹 Gender Counts
//     $genderCounts = collect(['Male', 'Female', 'OTHERS'])->mapWithKeys(function ($gender) use ($request, $applyBaseFilters) {
//         $query = ExelImprtOne::query();
//       //  $query = $applyBaseFilters($query, 'gender');
//       $query = $applyBaseFilters($query);
//         if ($request->social) {
//             $query->where('SocialCategory', $request->social);
//         }
//         return [$gender => $query->where('Gender', $gender)->count()];
//     });

//     // 🔹 Social Category Counts
//     $socialCounts = collect(['General', 'OBC', 'SC', 'ST'])->mapWithKeys(function ($social) use ($request, $applyBaseFilters) {
//         $query = ExelImprtOne::query();
//      //   $query = $applyBaseFilters($query, 'social');
//      $query = $applyBaseFilters($query);
//         if ($request->gender) {
//             $query->where('Gender', $request->gender);
//         }
//         return [$social => $query->where('SocialCategory', $social)->count()];
//     });

//     // 🔹 Major Activity Counts
//     $activities = ['Services', 'Trading', 'Manufacturing'];
//     $activityCounts = collect($activities)->mapWithKeys(function ($activity) use ($request, $applyBaseFilters) {
//         $query = ExelImprtOne::query();
//      //   $query = $applyBaseFilters($query, 'majoractivity');
//      $query = $applyBaseFilters($query);
//         if ($request->gender) {
//             $query->where('Gender', $request->gender);
//         }
//         if ($request->social) {
//             $query->where('SocialCategory', $request->social);
//         }
//         return [$activity => $query->where('MajorActivity', $activity)->count()];
//     });

//     // 🔹 Organization Types
//     $organizationTypes = [
//         'Proprietary', 'Others', 'Partnership', 'Private Limited Company',
//         'Limited Liability Partnership', 'Trust', 'Hindu Undivided Family',
//         'Self Help Group', 'Society', 'Public Limited Company', 'Co-Operative'
//     ];
//     $organizationCounts = collect($organizationTypes)->mapWithKeys(function ($type) use ($request, $applyBaseFilters) {
//         $query = ExelImprtOne::query();
//        // $query = $applyBaseFilters($query, 'organizationtype');
//        $query = $applyBaseFilters($query);
//         if ($request->gender) {
//             $query->where('Gender', $request->gender);
//         }
//         if ($request->social) {
//             $query->where('SocialCategory', $request->social);
//         }
//         if ($request->majoractivity) {
//             $query->where('MajorActivity', $request->majoractivity);
//         }
//         return [$type => $query->where('OrganisationType', $type)->count()];
//     });

//     // 🔹 Enterprise Types
//     $enterpriseTypes = ['Micro', 'Small', 'Medium'];
//     $enterpriseCounts = collect($enterpriseTypes)->mapWithKeys(function ($type) use ($request, $applyBaseFilters) {
//         $query = ExelImprtOne::query();
//      //   $query = $applyBaseFilters($query, 'enterprisetype');
//      $query = $applyBaseFilters($query);
//         if ($request->gender) {
//             $query->where('Gender', $request->gender);
//         }
//         if ($request->social) {
//             $query->where('SocialCategory', $request->social);
//         }
//         if ($request->majoractivity) {
//             $query->where('MajorActivity', $request->majoractivity);
//         }
//         return [$type => $query->where('EnterpriseType', $type)->count()];
//     });

//     return response()->json([
//         'genderCounts' => $genderCounts,
//         'socialCategoryCounts' => $socialCounts,
//         'majoractivity' => $activityCounts,
//         'organizationtypes' => $organizationCounts,
//         'enterprisetype' => $enterpriseCounts,
//     ]);
// }

public function exportMSME(Request $request)
{
   // $ids = $request->input('selected_ids');
    \Log::info('exportMSME called');
    $ids = json_decode($request->input('selected_ids'), true);

 \Log::info('Decoded IDs:', $ids);

    if (empty($ids) || !is_array($ids)) {
        \Log::warning('No rows selected or invalid input.', ['input' => $request->input('selected_ids')]);
        return back()->with('error', 'No rows selected.');
    }

    \Log::info('Proceeding to export with IDs:', $ids);

    // if (!$ids || count($ids) === 0) {
    //     return back()->with('error', 'No rows selected.');
    // }
    //   if (empty($ids) || !is_array($ids)) {
    //     return back()->with('error', 'No rows selected.');
   //     Excel::queue(new ExelExportOne($ids))->store('MSME_Report.xlsx', 'public');


    return Excel::download(new ExelExportOne($ids), 'MSME_Report.xlsx');
}

public function view($id)
{
    $user = ExelImprtOne::findOrFail($id);
    return view('reports.Udyog Aadhaar Memorandum.view', compact('user'));
}

// Add other count methods as necessary
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
    public function show(ExelImprtOne $exelImprtOne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function edit($id)
    {
         
        $user = ExelImprtOneDemo::where('id',$id)->first();
       // dd($user);
        return view('reports.MSME.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      //dd($request);
     
//           $request->validate([
//     'UdyogAadharNo' => 'required|string|max:755', 
//     'EnterpriseName' => 'required|string',

//     'Address' => 'required|string',
//     'PINCode' => 'required|integer',
//     'TotalEmp' => 'required|integer',
//      'OwnerName' => 'required|string',


   
//     'MobileNo' => 'required|integer',
//     'EmailId' => 'required|email',
//     'Gender' => 'required|string',
//     'SocialCategory' => 'required|string',
//     'MajorActivity' => 'required|string',
//     'Dic_Name' => 'required|string',
//     'IncorporationDate' => 'required|date',
//     'CommmenceDate' => 'required|date',
//     'CreateDate' => 'required|date',
//     'State' => 'required|string',
//     'District' => 'required|string',
//     'state_name' => 'required|string',
//     'DISTRICT_NAME' => 'required|string',
//     'OrganisationType' => 'required|string',
//     'PreviousEMType' => 'required|string',
//      'PreviousEMNumber' => 'required|string',
//      'EnterpriseType' => 'required|string',
//       'ActivityDetail' => 'required|string',
//        'InvestmentCost' => 'required|string',
//       'NetTurnover' => 'required|string',
      
//         'CreateDate1' => 'required|date',
//         'Latitude' => 'required|string',
//         'Longitude' => 'required|string',
    
    
// ]);
//dd($request);
$data = $request->except(['_token', '_method']);

        $record = ExelImprtOneDemo::where('id',$id)->update($data);
    
       
        return redirect()->route('dashboard')->with('success', 'Record updated successfully.');
    }
  
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExelImprtOne $exelImprtOne)
    {
        //
    }
    
    
    
    
        // new msme dashboard


    public function dashboardnew(){
        $districts= ExelImprtOne::select('DISTRICT_NAME')->distinct()->get();
        $genders = ExelImprtOne::select('Gender')->distinct()->get();
        $social_categories = ExelImprtOne::select('SocialCategory')->distinct()->get();
        $major_activities = ExelImprtOne::select('MajorActivity')->distinct()->get();

        $data['totalregistered'] = ExelImprtOne::count();
        $data['totalfemale'] = ExelImprtOne::where('Gender','Female')->count();
        $data['totalmale'] = ExelImprtOne::where('Gender','Male')->count();
        $data['others'] = ExelImprtOne::where('Gender','OTHERS')->count();

        $data['totalemployees'] = ExelImprtOne::SUM('TotalEmp');

        $percentage['male'] =  $data['totalregistered'] > 0 ? round(( $data['totalmale']/ $data['totalregistered']) * 100) : 0;
        $percentage['female'] =  $data['totalregistered'] > 0 ? round(( $data['totalfemale'] / $data['totalregistered']) * 100) : 0;
        $percentage['others'] = $data['others'] >0? round(($data['others']/$data['totalregistered'])*100) : 0;
     
    return view('reports.Udyog Aadhaar Memorandum.msmedashboard', compact('social_categories','districts','genders','major_activities','data','percentage'));
    }

    public function dynamicFilters(Request $request)
    {
        $query = ExelImprtOne::query();

        if ($request->social_category) {
            $query->where('SocialCategory', $request->social_category);
        }

        if ($request->district) {
            $query->where('DISTRICT_NAME', $request->district);
        }

        if ($request->gender) {
            $query->where('Gender', $request->gender);
        }

         if ($request->majoractivity) {
            $query->where('MajorActivity', $request->majoractivity);
        }

        return response()->json([
            'social_categories' => $query->select('SocialCategory')->distinct()->pluck('SocialCategory'),
            'districts' => $query->select('DISTRICT_NAME')->distinct()->pluck('DISTRICT_NAME'),
            'genders' => $query->select('Gender')->distinct()->pluck('Gender'),
            'majoractivity' => $query->select('MajorActivity')->distinct()->pluck('MajorActivity'),
        ]);
    }


    public  function getdropdownoptions(){
         return response()->json([
        'districts' => ExelImprtOne::select('DISTRICT_NAME')->distinct()->pluck('DISTRICT_NAME'),
        'genders' => ExelImprtOne::select('Gender')->distinct()->pluck('Gender'),
        'social_categories' => ExelImprtOne::select('SocialCategory')->distinct()->pluck('SocialCategory'),
        'major_activities' => ExelImprtOne::select('MajorActivity')->distinct()->pluck('MajorActivity'),
        
    ]);
    }

    public function getFilteredDataold(Request $request)
{
    $query = ExelImprtOne::query();

    if ($request->filled('district')) {
        $query->where('DISTRICT_NAME', $request->district);
    }

    if ($request->filled('gender')) {
        $query->where('Gender', $request->gender);
    }

    if ($request->filled('social')) {
        $query->where('SocialCategory', $request->social);
    }

    if ($request->filled('majoractivity')) {
        $query->where('MajorActivity', $request->majoractivity);
    }

    $total = $query->count();
    $totalFemale = (clone $query)->where('Gender', 'Female')->count();
    $totalMale = (clone $query)->where('Gender', 'Male')->count();
    $others = (clone $query)->where('Gender', 'OTHERS')->count();
    $employees = $query->sum('TotalEmp');

    return response()->json([
        'totalregistered' => $total,
        'totalfemale' => $totalFemale,
        'totalmale' => $totalMale,
        'others' => $others,
        'totalemployees' => $employees,
        'percentages' => [
            'male' => $total ? round(($totalMale / $total) * 100) : 0,
            'female' => $total ? round(($totalFemale / $total) * 100) : 0,
            'others' => $total ? round(($others / $total) * 100) : 0,
        ]
    ]);
}
   public function getFilteredData(Request $request)
{
    $query = ExelImprtOne::query();

    if ($request->filled('district')) {
        $query->where('DISTRICT_NAME', $request->district);
    }

    if ($request->filled('gender')) {
        $query->where('Gender', $request->gender);
    }

    if ($request->filled('social')) {
        $query->where('SocialCategory', $request->social);
    }

    if ($request->filled('majoractivity')) {
        $query->where('MajorActivity', $request->majoractivity);
    }

    $total = $query->count();
    $totalFemale = (clone $query)->where('Gender', 'Female')->count();
    $totalMale = (clone $query)->where('Gender', 'Male')->count();
    $others = (clone $query)->where('Gender', 'OTHERS')->count();
    $employees = $query->sum('TotalEmp');

    // Social breakdown
    $socialCounts = (clone $query)
        ->select('SocialCategory', DB::raw('COUNT(*) as total'))
        ->groupBy('SocialCategory')
        ->get()
        ->map(function ($row) use ($total) {
            return [
                'category' => $row->SocialCategory,
                'total' => $row->total,
                'percent' => $total ? round(($row->total / $total) * 100) : 0
            ];
        });

    // District-wise
    $districtCounts = (clone $query)
        ->select('DISTRICT_NAME', DB::raw('COUNT(*) as total'))
        ->groupBy('DISTRICT_NAME')
        ->orderByDesc('total')
      //  ->take(10)
        ->get();

    return response()->json([
        'totalregistered' => $total,
        'totalfemale' => $totalFemale,
        'totalmale' => $totalMale,
        'others' => $others,
        'totalemployees' => $employees,
        'percentages' => [
            'male' => $total ? round(($totalMale / $total) * 100) : 0,
            'female' => $total ? round(($totalFemale / $total) * 100) : 0,
            'others' => $total ? round(($others / $total) * 100) : 0,
        ],
        'social_breakdown' => $socialCounts,
        'district_chart' => [
            'labels' => $districtCounts->pluck('DISTRICT_NAME'),
            'data' => $districtCounts->pluck('total')
        ]
    ]);
}


      public function exportGenderData(Request $request)
{
    $query = DB::table('exel_imprt_ones'); // adjust table name
 $query = ExportHelper::applyFilters($request, $query);
    $data = $query->select('Gender', DB::raw('COUNT(*) as GenderCount'))
                  ->groupBy('Gender')
                  ->orderByDesc('GenderCount')
                  ->get();

   

     $csv = ExportHelper::convertToCsv(['Gender', 'Gender_Count'], $data->map(function ($row) {
        return [$row->Gender, $row->GenderCount];
    })->toArray());

    $filename = "gender_msme_data_" . now()->format('Ymd_His') . ".csv";

    return Response::make($csv, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$filename\"",
    ]);
}


public function exportDistrictData(Request $request)
{
    $query = DB::table('exel_imprt_ones');
    $query = ExportHelper::applyFilters($request, $query);

    $data = $query->select('district_name', DB::raw('COUNT(*) as total_msmes'))
                  ->groupBy('district_name')
                  ->orderByDesc('total_msmes')
                  ->get();

    $csv = ExportHelper::convertToCsv(['District', 'Total MSMEs'], $data->map(function ($row) {
        return [$row->district_name, $row->total_msmes];
    })->toArray());

    $filename = "district_msme_data_" . now()->format('Ymd_His') . ".csv";

    return response($csv, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$filename\"",
    ]);
}


public function exportCategoryData(Request $request)
{
    $query = DB::table('exel_imprt_ones'); // adjust table name
 $query = ExportHelper::applyFilters($request, $query);
    $data = $query->select('SocialCategory', DB::raw('COUNT(*) as SocialCategoryCount'))
                  ->groupBy('SocialCategory')
                  ->orderByDesc('SocialCategoryCount')
                  ->get();

   

     $csv = ExportHelper::convertToCsv(['Category_Name', 'Category_Count'], $data->map(function ($row) {
        return [$row->SocialCategory, $row->SocialCategoryCount];
    })->toArray());

    $filename = "socialcategory_msme_data_" . now()->format('Ymd_His') . ".csv";

    return Response::make($csv, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$filename\"",
    ]);
}



}





