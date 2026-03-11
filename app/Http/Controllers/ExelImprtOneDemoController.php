<?php

namespace App\Http\Controllers;

use App\Models\ExelImprtOneDemo;
use Illuminate\Http\Request;
use App\Models\ExelImprtOne;
use Illuminate\Support\Carbon;
use App\Exports\ExelExportOne;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ExelImprtOneDemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
            
            return view('reports.MSME.dashboard', compact(
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



public function exportMSME(Request $request)
{
    $ids = $request->input('selected_ids');

    if (!$ids || count($ids) === 0) {
        return back()->with('error', 'No rows selected.');
    }

    return Excel::download(new ExelExportOne($ids), 'MSME_Report.xlsx');
}

public function viewreport($id)
{
    $user = ExelImprtOne::findOrFail($id);
    return view('reports.MSME.view', compact('user'));
}
















    public function index()
    {
        return view('reports.Questions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reports.Questions.add');
    }

    public function view(){
        return view('reports.Questions.show');
    }
    public function assetQuestion(){
        return view('reports.Questions.assetQuestion');
    }
    public function assetsList(){
        return view('reports.Questions.assetsList');
    }

    public function dashboardquestions(){
        return view('reports.Questions.dashboard');
    }
    public function dashboardview(){
        return view('reports.Questions.viewdashboard');
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
    public function show(ExelImprtOneDemo $exelImprtOneDemo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExelImprtOneDemo $exelImprtOneDemo)
    {
        //
    }
}
