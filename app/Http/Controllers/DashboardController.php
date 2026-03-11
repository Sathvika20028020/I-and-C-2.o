<?php

namespace App\Http\Controllers;

use App\Models\ExelImprtOne;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function dashboard($type){
      if($type == 'district')
        return $this->districtDashboard();
      if($type == 'sector')
        return $this->sectorDashboard();
        return $this->timeDashboard();
    }
    public function filter($type, Request $request){
      if($type == 'time')
        return $this->timeFilter($request);
      if($type == 'district')
        return $this->districtFilter($request);
    }

    public function districtDashboard(){
      $districts= DB::table('exel_imprt_ones')->select('DISTRICT_NAME')->distinct()->orderBy('DISTRICT_NAME')->pluck('DISTRICT_NAME')->toArray();
      $major_activities = DB::table('exel_imprt_ones')->select('MajorActivity')->distinct()->orderBy('MajorActivity')->pluck('MajorActivity')->toArray();
      $genders = DB::table('exel_imprt_ones')->select('Gender')->distinct()->pluck('Gender')->toArray();
      $social_categories = DB::table('exel_imprt_ones')->select('SocialCategory')->distinct()->orderBy('SocialCategory')->pluck('SocialCategory')->toArray();

      $entries = DB::table('exel_imprt_ones')->select('id','Gender','TotalEmp','CommmenceDate','SocialCategory','DISTRICT_NAME')->get();

      $data['total_registered'] = $entries->count();
      $data['total_employees'] = $entries->SUM('TotalEmp');
      $data['total_female'] = $entries->where('Gender','Female')->count();
      $data['total_male'] = $entries->where('Gender','Male')->count();
      $data['others'] = $entries->where('Gender','OTHERS')->count();
      $data['CommmenceDate'] = $entries->whereNotNull('CommmenceDate')->where('CommmenceDate', '!=', '')->count();
      $data['nonCommmenceDate'] = $data['total_registered'] - $data['CommmenceDate'];
      
      foreach($social_categories as $key => $category){
        $data['social'][$key]['name'] = $category;
        $data['social'][$key]['count'] = $entries->where('SocialCategory',$category)->count();
        $data['social'][$key]['percent'] = $data['total_registered'] ? round($data['social'][$key]['count'] / $data['total_registered'] * 100) : 0;
      }

      foreach($districts as $key => $district){
        $data['district_chart'][$key]['name'] = $district;
        $data['district_chart'][$key]['count'] = $entries->where('DISTRICT_NAME',$district)->count();
      }
      
      $sectors = DB::table('sectors')->select('name','code')->get();
      foreach($sectors as $sector){
        $sector->count_2223 = $this->countSectorEntries($sector->code, ['2022-03-01', '2023-03-31']);
        $sector->count_2324 = $this->countSectorEntries($sector->code, ['2023-04-01', '2024-03-31']);
        $sector->count_2425 = $this->countSectorEntries($sector->code, ['2024-04-01', '2025-03-31']);
        $subsectors = DB::table('sub_sectors')->select('name','code')->where('sector_code', $sector->code)->get();
        foreach($subsectors as $subsector){
          $subsector->count_2223 = $sector->count_2223 > 0 ? $this->countSectorEntries($subsector->code, ['2022-03-01', '2023-03-31']) : 0;
          $subsector->count_2324 = $sector->count_2324 > 0 ? $this->countSectorEntries($subsector->code, ['2023-04-01', '2024-03-31']) : 0;
          $subsector->count_2425 = $sector->count_2425 > 0 ? $this->countSectorEntries($subsector->code, ['2024-04-01', '2025-03-31']) : 0;
        }
        $sector->subsectors = $subsectors;
      }
      return view('reports.uam.dashboard', compact('social_categories','districts','genders','major_activities','data','sectors'));
    }

    public function districtFilter($request){
      $data = $this->districtData($request->district, $request->activity, $request->gender, $request->category,'ajax');
      return response()->json([
        'success' => true,
        'data' => $data
      ]);
    }

    public function districtData($district = null, $activity = null, $gender = null, $category = null, $type = ''){
      $entries = DB::table('exel_imprt_ones')
                  ->select('id','Gender','TotalEmp','CommmenceDate','SocialCategory','DISTRICT_NAME')
                  ->when($district, function ($query, $district) {
                      return $query->where('DISTRICT_NAME', $district);
                  })->when($activity, function ($query, $activity) {
                      return $query->where('MajorActivity', $activity);
                  })->when($gender, function ($query, $gender) {
                      return $query->where('Gender', $gender);
                  })->when($category, function ($query, $category) {
                      return $query->where('SocialCategory', $category);
                  })
                  ->get();
      $data['total_registered'] = $entries->count();
      $data['total_employees'] = $entries->SUM('TotalEmp');
      $data['total_female'] = $entries->where('Gender','Female')->count();
      $data['total_male'] = $entries->where('Gender','Male')->count();
      $data['total_male_per'] = $data['total_registered'] > 0 ? round(( $data['total_male']/ $data['total_registered']) * 100) : 0;
      $data['total_female_per'] = $data['total_registered'] > 0 ? round(( $data['total_female']/ $data['total_registered']) * 100) : 0;
      $data['others'] = $entries->where('Gender','OTHERS')->count();
      $data['CommmenceDate'] = $entries->whereNotNull('CommmenceDate')->where('CommmenceDate', '!=', '')->count();
      $data['nonCommmenceDate'] = $data['total_registered'] - $data['CommmenceDate'];
      return $data;
    }

    private function countSectorEntries($sectorId, $dates)
    {
      $sectorId = strval($sectorId); // e.g., '81'
      $count = 0;

      $rows = DB::table('exel_imprt_ones')->select('id','ActivityDetail')->whereNotNull('ActivityDetail')
                  ->where('ActivityDetail', '!=', '[]')
                  ->whereBetween('createDate', $dates)
                  ->get();

      foreach ($rows as $row) {
          $activities = json_decode($row->ActivityDetail, true);
          if (is_array($activities)) {
              foreach ($activities as $activity) {
                  if (isset($activity['NIC5DigitId']) && str_starts_with($activity['NIC5DigitId'], $sectorId)) {
                      $count++;
                  }
              }
          }
      }

      return $count;
    }

    public function timeDashboard(){
      $districts= DB::table('exel_imprt_ones')->select('DISTRICT_NAME')->distinct()->orderBy('DISTRICT_NAME')->pluck('DISTRICT_NAME')->toArray();
      $major_activities = DB::table('exel_imprt_ones')->select('MajorActivity')->distinct()->orderBy('MajorActivity')->pluck('MajorActivity')->toArray();
      $res = $this->timeData();
      $chart_one = $res[0];
      $chart_two = $res[1];
      return view('reports.uam.time', compact('districts','major_activities','chart_one','chart_two'));
    }

    public function timeFilter($request){
      $res = $this->timeData($request->district, $request->activity,'ajax');
      $chart_one = $res[0];
      $chart_two = $res[1];
      return response()->json([
        'success' => true,
        'chart_one' => $chart_one,
        'chart_two' => $chart_two,
      ]);
    }

    private function timeData($district = null, $activity = null, $type = ''){
      $start = Carbon::parse('2022-04-01');
      $end = Carbon::now();
      $chart_one = [];
      $growth = 0;
      $chart_two = [];
      $growth_new = 0;
      $new_ids = [];
      while ($start < $end) {
          $next = $start->copy()->addMonths(6);
          $count = DB::table('exel_imprt_ones')
                      ->when($district, function ($query, $district) {
                          return $query->where('DISTRICT_NAME', $district);
                      })->when($activity, function ($query, $activity) {
                          return $query->whereIn('MajorActivity', $activity);
                      })->whereBetween('createDate', [$start->toDateString(), $next->toDateString()])
                      ->count();
          if($type == 'ajax'){
            $chart_one['label'][] = $start->format('m/y').'-'.$next->format('m/y');
            $chart_one['count'][] = $count;
            $chart_one['growth'][] =  $growth > 0 ? round((($count - $growth) / $growth) * 100) : 0;
          }else{
            $chart_one[] = [
              'range' => $start->format('m/y').'-'.$next->format('m/y'),
              'count' => $count,
              'growth' => $growth > 0 ? round((($count - $growth) / $growth) * 100) : 0
            ];
          }
          
          $growth = $count;


          $new_reg = DB::table('exel_imprt_ones')
                      ->when($district, function ($query, $district) {
                          return $query->where('DISTRICT_NAME', $district);
                      })->when($activity, function ($query, $activity) {
                          return $query->whereIn('MajorActivity', $activity);
                      })
                      ->whereBetween('createDate', [$start->toDateString(), $next->toDateString()])
                      ->whereNotIn('UdyogAadharNo', $new_ids)
                      ->pluck('UdyogAadharNo')
                      ->toArray();
          if($type == 'ajax'){
            $chart_two['label'][] = $start->format('m/y').'-'.$next->format('m/y');
            $chart_two['count'][] = count($new_reg);
            $chart_two['growth'][] =  $growth_new > 0 ? round((count($new_reg) / $growth_new) * 100) : 0;
          }else{
            $chart_two[] = [
                'range' => $start->format('m/y').'-'.$next->format('m/y'),
                'count' => count($new_reg),
                'growth' => $growth_new > 0 ? round((count($new_reg) / $growth_new) * 100) : 0
            ];
          }
          $new_ids = array_merge($new_ids, $new_reg);
          $growth_new = count($new_reg);

          $start = $next;
      }
      return[$chart_one, $chart_two];
    }

    public function sectorDashboard(){
      $sectors = DB::table('sectors')->select('name','code')->get();
      $entries = DB::table('exel_imprt_ones')->select('createDate')->count();
      foreach($sectors as $sector){
        $sector->count_2223 = $this->countSectorEntries($sector->code, ['2022-03-01', '2023-03-31']);
        $sector->count_2324 = $this->countSectorEntries($sector->code, ['2023-04-01', '2024-03-31']);
        $sector->count_2425 = $this->countSectorEntries($sector->code, ['2024-04-01', '2025-03-31']);
        $sector->total = $sector->count_2223+$sector->count_2324+$sector->count_2425;
        $subsectors = DB::table('sub_sectors')->select('name','code')->where('sector_code', $sector->code)->get();
        foreach($subsectors as $subsector){
          $subsector->count_2223 = $sector->count_2223 > 0 ? $this->countSectorEntries($subsector->code, ['2022-03-01', '2023-03-31']) : 0;
          $subsector->count_2324 = $sector->count_2324 > 0 ? $this->countSectorEntries($subsector->code, ['2023-04-01', '2024-03-31']) : 0;
          $subsector->count_2425 = $sector->count_2425 > 0 ? $this->countSectorEntries($subsector->code, ['2024-04-01', '2025-03-31']) : 0;
          $subsector->total = $subsector->count_2223+$subsector->count_2324+$subsector->count_2425;
        }
        $sector->subsectors = $subsectors;
      }
      return view('reports.uam.sector', compact('sectors','entries'));
    }
}