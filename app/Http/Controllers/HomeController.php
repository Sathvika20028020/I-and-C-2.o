<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Employee;
use App\Models\Child;
use App\Models\Policy;
use App\Models\Nominee;
use App\Models\Posting;
use App\Models\EmployeeTemp;
use App\Models\ChildTemp;
use App\Models\PolicyTemp;
use App\Models\EmployeeCaste;
use App\Models\Designation;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use App\Services\WhatsAppOtpService;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function login(){
        return view('pwa.auth.login');
    }
    public function verifyKgid(Request $request, WhatsAppOtpService $whatsappOtpService){
      $employee = Employee::where('kgid', $request->kgid)->first();
      if(!$employee){
        return response()->json([
          'success' => false
        ]);
      }else{
        $user = User::where('emp_id', $employee->id)->first();
        if (!$user) {
            $user = User::create([
                'name' => $employee->emp_name,
                'phone' => $employee->phone,
                'email' => $employee->phone,
                'role'  => 3,
                'emp_id' => $employee->id,
                'password' => bcrypt(Str::random(12)),
            ]);
        }
        $otp = (string) rand(100000, 999999);
        $user->otp = $otp;
        $user->save();
        $fullNumber = '+91'.$user->phone;
        $whatsappOtpService->sendOtp($fullNumber, $otp);
        return response()->json([
          'success' => true
        ]);
      }
    }

    public function kgidLogin(Request $request){
      $employee = Employee::where('kgid', $request->kgid)->first();
      if($employee){
          $user = User::where(['emp_id'=>$employee->id, 'otp'=>$request->otp])->first();
          if($user){
            Auth::guard('pwauser')->login($user);
            return redirect()->route('pwa.dashboard');
          }
          \Session::flash('error','Invalid OTP. Please try again.');
      }else{
        \Session::flash('error','Please Enter correct KGID No. Please try again.');
      }
      return redirect()->back()->withInput();
    }

    public function logincheck(Request $request)
{
    $data = $request->validate([
        'phone' => 'required|integer',
        'password' => 'required|string'
    ]);

    $user = User::where('phone', $data['phone'])->first();

    if (!$user || !Hash::check($data['password'], $user->password)) {
        return redirect()->back()->withErrors([
            'login' => 'Invalid phone number or password.',
        ])->withInput();
    }

    Auth::guard('pwauser')->login($user);

    return redirect()->route('asset-inventory.create');
    return redirect()->route('pwa.dashboard');
}

    public function userlogout(){
      Auth::guard('pwauser')->logout();
      session()->forget('admin_otp_verified');
      return redirect()->route('pwa.login');
    }


        public function dashboard()
    {
        if (Auth::guard('pwauser')->check()) {
            $user = Auth::guard('pwauser')->user();
            $employee = Employee::where('id', $user->emp_id)->first();
            $profile_updated = 'no';
            if($employee->is_profile_updated == 1){
              $employee->is_profile_updated = 0;
              $employee->save();
              $profile_updated = 'yes';
            }

            return view('pwa.dashboard', compact('employee', 'user', 'profile_updated'));
        } else {
            return redirect()->route('pwa.login')->with('error', 'Please log in to access the dashboard.');
        }
    }


     public function profile(){
         if (Auth::guard('pwauser')->check()) {
             
           
    
   
            $user = Auth::guard('pwauser')->user();
            $employee = Employee::where('id', $user->emp_id)->first();

            return view('pwa.profile', compact('employee', 'user'));
        } else {
            return redirect()->route('pwa.login')->with('error', 'Please log in to access the dashboard.');
        }
      
    }

     public function SendOtp(Request $request, WhatsAppOtpService $whatsappOtpService)
    {
     
        $user = Auth::guard('pwauser')->user();
 
        // $validated = $request->validate([
        //     'changes' => 'required|array',
        // ]);

       // $otp = rand(100000, 999999);
       $otp = (string) rand(100000, 999999);
        DB::table('update_verifications')->where('user_id', $user->id)->update(['status'=>0]);
 
        DB::table('update_verifications')->insert([
            'user_id' => $user->id,
            'otp' => $otp,
            'status' => 1,
           // 'changes' => json_encode($validated['changes']),
            'ip_address' => $request->ip(),
            'expires_at' => now()->addMinutes(5),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $mobileNumber = $user->phone; 
            $countryCode = "+91"; 

            $fullNumber = $countryCode . $mobileNumber; 

            $sent = $whatsappOtpService->sendOtp($fullNumber, $otp);

            return response()->json(['success'=>true, 'number' => $fullNumber ]);

        // if ($sent) {
        //     return response()->json(['success'=>true, 'number' => $fullNumber ]);
        // } else {
        //     return response()->json(['success'=>false]);
        // }
    }

    public function sendLoginOtp(Request $request, $phone, WhatsAppOtpService $whatsappOtpService)
    {
     
        $user = User::where('phone', $phone)->first();
        if($user){
          $otp = (string) rand(100000, 999999);
          DB::table('update_verifications')->where('user_id', $user->id)->update(['status'=>0]);
  
          DB::table('update_verifications')->insert([
              'user_id' => $user->id,
              'otp' => $otp,
              'status' => 1,
              'ip_address' => $request->ip(),
              'expires_at' => now()->addMinutes(5),
              'created_at' => now(),
              'updated_at' => now(),
          ]);

          $mobileNumber = $user->phone; 
          $countryCode = "+91"; 

          $fullNumber = $countryCode . $mobileNumber; 

          $sent = $whatsappOtpService->sendOtp($fullNumber, $otp);

          return response()->json(['success'=>true]);
        }else{
          return response()->json(['success'=>false, 'message' => 'Please enter your registered number.' ]);
        }
    }

    public function login_otp(Request $request){
      $user = User::where('phone', $request->phone)->first();
      if(!$user){
        \Session::put('error','Something went wrong. Please try again.');
        return redirect()->back();
      }
      $otpEntry = DB::table('update_verifications')
            ->where('user_id', $user->id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->where('status', 1)
            ->first();
      if (!$otpEntry) {
        \Session::put('error','Invalid OTP. Please try again.');
        return redirect()->back();
      }
      DB::table('update_verifications')->where('user_id', $user->id)->update(['status'=>0]);
      Auth::guard('pwauser')->login($user);
      $employee = Employee::where('id', $user->emp_id)->first();
      return redirect()->route('pwa.dashboard');
    }

    public function verifyOtp($otp)
    {
        $user = Auth::guard('pwauser')->user();

        if(strlen($otp) != 6){
          return response()->json([
            'success' => false,
            'message' => 'Please enter a valid OTP!'
          ]);
        }

        // Retrieve the OTP entry for the user that hasn't expired
        $otpEntry = DB::table('update_verifications')
            ->where('user_id', $user->id)
            ->where('otp', $otp)
            ->where('expires_at', '>', now())
            ->where('status', 1)
            ->first();

        if (!$otpEntry) {
          return response()->json([
            'success' => false,
            'message' => 'Please enter a valid OTP!'
          ]);
        }
        DB::table('update_verifications')->where('user_id', $user->id)->update(['status'=>0]);
        return response()->json([
          'success' => true
        ]);

    }

        public function verifyOtpAndUpdate(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'otp' => 'required|array',
        ]);
        
         $otpDigits = $request->input('otp');
            $otp = implode('', $otpDigits);

        // Retrieve the OTP entry for the user that hasn't expired
        $otpEntry = DB::table('update_verifications')
            ->where('user_id', $user->id)
            ->where('otp', $otp)
            ->where('expires_at', '>', now())
            ->latest('created_at')
            ->first();

        if (!$otpEntry) {
            return redirect()->back()->with('error','error otp is inavalid');
        }

        // Decode the changes from JSON stored earlier
        $changes = json_decode($otpEntry->changes, true);

        return redirect()->route('pwa.profile.edit')->with('success','OTP verified successfully! Thank you');
       // return response()->json(['message' => 'OTP verified and folder updated successfully.']);
    }

     public function editprofile(){
         if (Auth::guard('pwauser')->check()) {
             
            $user = Auth::guard('pwauser')->user();
            $employee = Employee::where('id', $user->emp_id)->first();
            
            $data['district'] = DB::table('employees')->whereNotNull('district')->where('district', '!=', '')->distinct()->pluck('district')->toArray();
         //   $data['gender'] = DB::table('employees')->distinct()->pluck('gender')->toArray();
            $data['designation'] = DB::table('employees')->whereNotNull('designation')->where('designation', '!=', '')->distinct()->pluck('designation')->toArray();
            $data['group'] = DB::table('employees')->whereNotNull('group')->where('group', '!=', '')->distinct()->pluck('group')->toArray();
            $data['cadre_type'] = DB::table('employees')->whereNotNull('cadre_type')->where('cadre_type', '!=', '')->distinct()->pluck('cadre_type')->toArray();
            $data['taluk'] = DB::table('employees')->whereNotNull('taluk')->where('taluk', '!=', '')->distinct()->pluck('taluk')->toArray();
            $data['DR_PR'] = DB::table('employees')->whereNotNull('DR_PR')->where('DR_PR', '!=', '')->distinct()->pluck('DR_PR')->toArray();
            $data['category'] = DB::table('employees')->whereNotNull('category')->where('category', '!=', '')->distinct()->pluck('category')->toArray();
            $data['sub_category'] = DB::table('employees')->whereNotNull('sub_category')->where('sub_category', '!=', '')->distinct()->pluck('sub_category')->toArray();


  
            return view('pwa.editprofile', compact('employee', 'user','data'));
        } else {
            return redirect()->route('pwa.login')->with('error', 'Please log in to access the dashboard.');
        }
      
    }

     public function profileotp(){
          if (Auth::guard('pwauser')->check()) {
            $user = Auth::guard('pwauser')->user();
            $employee = Employee::where('id', $user->emp_id)->first();

            return view('pwa.otp', compact('employee', 'user'));
        } else {
            return redirect()->route('pwa.login')->with('error', 'Please log in to access the dashboard.');
        }
       
    }
    
    public function profileupdate(Request $request,$id){
       
        $data = $request->except(['_token', '_method']);

        $record = Employee::where('id',$id)->update($data);
        
        return redirect()->route('pwa.profile')->with('success','Profile data updated successfully!');
    }
    
     public function assetsForm()
    {
   
        return view('pwa.newAssetForm');

    }
     public function assetView()
    {
   
        return view('pwa.assetView');

    }
     public function category()
    {
   
        return view('pwa.category');

    }
     public function subcategory()
    {
   
        return view('pwa.subcategory');

    }
     public function details()
    {
   
        return view('pwa.details');

    }
     public function otpLogin()
    {
   
        return view('pwa.otpLogin');

    }
     public function newAssetForm()
    {
   
        return view('pwa.newAssetForm');

    }
     public function newProfile()
    {
      if (Auth::guard('pwauser')->check()) {
        $user = Auth::guard('pwauser')->user();
        $employee = Employee::where('id', $user->emp_id)->first();
        return view('pwa.newProfile', compact('employee', 'user'));
      } else {
        return redirect()->route('pwa.login')->with('error', 'Please log in to access the dashboard.');
      }
    }
    public function verifyProfile(Request $request){
      $user = Auth::guard('pwauser')->user();
      $employee = Employee::where('id', $user->emp_id)->first();
      $employee->is_verified = $request->mark;
      $employee->save();
      return redirect()->route('pwa.newProfile');
    }
     public function newProfileForm()
    {
        $user = Auth::guard('pwauser')->user();
        $employee = Employee::where('id', $user->emp_id)->first();
        $designations = [];
        if($employee->post_group){
          $res = $this->getDesignations($employee->post_group);
          $designations = $res->original['list'];
        }
        $taluks = [];
        if($employee->post_district){
          $res = $this->getTaluks($employee->post_district_id);
          $taluks = $res->original['list'];
        }
        $groups = Designation::orderBy('group')->distinct()->pluck('group')->toArray();
        $categories = DB::table('employees')->whereNotNull('category')->where('category', '!=', '')->distinct()->pluck('category')->toArray();
        $castes = DB::table('employees')->whereNotNull('sub_category')->where('sub_category', '!=', '')->distinct()->pluck('sub_category')->toArray();
        $districts = DB::table('districts')->distinct()->pluck('name');
        return view('pwa.newProfileForm', compact('employee','user','categories','castes','groups','districts','designations','taluks'));

    }
    public function getDesignations($group){
      $designations = Designation::where('group', $group)->orderBy('name')->distinct()->pluck('name')->toArray();
      return response()->json([
        'list' => $designations
      ]);
    }
    public function getTaluks($district_id){
      // $district = DB::table('districts')->where('name', $district)->first();
      $taluks = DB::table('taluks')->where('district_id', $district_id)->orderBy('name')->distinct()->pluck('name')->toArray();
      return response()->json([
        'list' => $taluks
      ]);
    }
    public function newProfileSave(Request $request){
      $data = $request->all();
      $user = Auth::guard('pwauser')->user();
      EmployeeTemp::where('employee_id', $user->emp_id)->delete();
      ChildTemp::where('employee_id', $user->emp_id)->delete();
      PolicyTemp::where('employee_id', $user->emp_id)->delete();
      $e_data = $request->only('salutation','emp_name','gender','dob','address','temp_address',
      'phone','doj','kgid','DR_PR','HK','category','sub_category','sub_caste','is_married',
      'spouse_name','spouse_gender','spouse_phone','is_spouse_working','spouse_working_in',
      'spouse_kgid','spouse_working_place','nominee_name','nominee_gender','nominee_dob',
      'nominee_relation','post_held','post_organization','post_district','post_group',
      'post_taluk','post_pay_scale','post_from','post_to','post_designation','post_increment_date');
      $e_data['employee_id'] = $user->emp_id;
      $e_data['status'] = 0;
      if($request->post_district){
        $district = DB::table('districts')->where('name', $request->post_district)->first();
        $e_data['post_district_id'] = $district ? $district->id : null;
      }
      if($request->post_taluk){
        $taluk = DB::table('taluks')->where('name', $request->post_taluk)->first();
        $e_data['post_taluk_id'] = $taluk ? $taluk->id : null;
      }
      $temp = EmployeeTemp::create($e_data);

      if($request->children)
      foreach ($request->children as $key => $child) {
          if($child['id']){
           $child['children_id'] = $child['id'];
          }
          unset($child['id']);
          $child['employee_id'] = $user->emp_id;
          $child['employee_temp_id'] = $temp->id;
          ChildTemp::create($child);
      }
      if($request->policies)
      foreach ($request->policies as $key => $policy) {
          if($policy['id']){
            $policy['policy_id'] = $policy['id'];
          }
          unset($policy['id']);
          $policy['employee_id'] = $user->emp_id;
          $policy['employee_temp_id'] = $temp->id;
          PolicyTemp::create($policy);
      }
      $employee = Employee::where('id', $user->emp_id)->first();
      $employee->is_verified = 2;
      $employee->save();
      \Session::flash('success', 'Changes submitted successfully. Please wait for approval.');
      return redirect()->route('pwa.profile');
    }
}
