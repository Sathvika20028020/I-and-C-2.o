<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $total = Question::count();
        $asked_users = Question::pluck('asked_by')
                        ->unique()
                        ->sort()
                        ->toArray();
        return view('reports.Questions.dashboard', compact('total','asked_users'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = Question::latest()->get();
        return view('reports.Questions.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reports.Questions.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('keywords','_token','status');
        $data['status'] = $request->status ?? 0;
        $data['keywords'] = strtolower(implode(',', array_map('trim', explode(',', $request->keywords))));
        Question::create($data);
        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view('reports.Questions.viewdashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }

    public function data(Request $request)
    {
        try{
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

          $asked_by = $request->asked_by??'';
          $department = $request->department??'';
          $keyword = $request->keyword??($searchValue??'');
          
        // Total records
          $totalRecords = Question::count();
           $query = Question::when($asked_by, function ($q, $asked_by) {
                        return $q->where('asked_by', $asked_by);
                    })
                    ->when($department, function ($q, $department) {
                        return $q->where('department', $department);
                    })
                    ->when($keyword, function ($q, $keyword) {
                        return $q->where(function ($sub) use ($keyword) {
                            $keyword = "%{$keyword}%";
                            $sub->whereRaw("CONVERT(`number` USING utf8mb4) COLLATE utf8mb4_unicode_ci LIKE ?", [$keyword])
                                ->orWhereRaw("CONVERT(`question` USING utf8mb4) COLLATE utf8mb4_unicode_ci LIKE ?", [$keyword])
                                ->orWhereRaw("CONVERT(`keywords` USING utf8mb4) COLLATE utf8mb4_unicode_ci LIKE ?", [$keyword]);
                        });
                    })
                    ->select('questions.*')
                    ->latest()
                    ->skip($start)
                    ->take($rowperpage);



        // Fetch records
        $totalRecordswithFilter = $query->count();
        $records = $query->get();
        $data_arr = array();
        
        foreach($records as $key => $record){
          $id = $start+$key+1;

          $data_arr[] = array(
              "id" => $id,
              "answered_by" => $record->answered_by,
              "question" => $record->question,
              "answer" => $record->answer,
              "department" => $record->department,
              "number" => $record->number,
              "asked_by" => $record->asked_by,
              "keywords" => $record->keywords,
              'action'=> '<div> 
                              <a target="_blank" class="btn btn-sm px-2 mb-2 btn-primary" href="'.route('question.show', $record->id).'"> View </a>
                            </div>',
          );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response); 
      } catch(\Exception $e){
        return [
          $e->getMessage()
        ];
      }
    }
}
