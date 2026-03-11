<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmployeeTemp;
use App\Models\Child;
use App\Models\Employee;
use App\Models\User;
use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\WhatsAppOtpService;

class EmployeeTempController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = EmployeeTemp::get();
        return view('reports.profile_update.index', compact('entries'));
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
    public function show(EmployeeTemp $employeeTemp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeTemp $profileUpdate)
    {
       $employee = Employee::find($profileUpdate->employee_id);
       return view('reports.profile_update.view', compact('profileUpdate','employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeTemp $profileUpdate)
    {
        $status = $request->status;
        if($status == 'Accept'){
          foreach($profileUpdate->children as $child){
            if($child->children_id){
              Child::find($child->children_id)->update([
                'employee_id' => $child->employee_id,
                'name' => $child->name,
                'gender' => $child->gender,
                'dob' => $child->dob
              ]);
            }else{
              Child::create([
                'employee_id' => $child->employee_id,
                'name' => $child->name,
                'gender' => $child->gender,
                'dob' => $child->dob
              ]);
              
            }
          }
          foreach($profileUpdate->policies as $policy){
            if($policy->policy_id){
              Policy::find($policy->policy_id)->update([
                'employee_id' => $policy->employee_id,
                'number' => $policy->number,
                'start_date' => $policy->start_date,
                'premium' => $policy->premium,
              ]);
            }else{
              Policy::create([
                'employee_id' => $policy->employee_id,
                'number' => $policy->number,
                'start_date' => $policy->start_date,
                'premium' => $policy->premium,
              ]);
              
            }
          }
          $data = $profileUpdate->toArray();
          unset($data['children']);
          unset($data['policies']);
          unset($data['employee_id']);
          unset($data['id']);
          unset($data['created_at']);
          unset($data['updated_at']);
          unset($data['status']);
          $data['is_profile_updated'] = 1;
          Employee::find($profileUpdate->employee_id)->update($data);
          $employee = Employee::find($profileUpdate->employee_id)->first();
          $employee->is_verified = 1;
          $employee->save();
          $user = User::where('emp_id', $profileUpdate->employee_id)->first();
          if($user){
            $user->phone = $employee->phone;
            $user->name = $employee->emp_name;
            $user->save();
          }
          \Session::flash('success','Approval updated successfully!');
        }else{
          \Session::flash('error','Rejected successfully!');
        }
        $profileUpdate->children()->delete();
        $profileUpdate->policies()->delete();
        $profileUpdate->delete(); 
        
        return redirect()->route('profile_update.index');
    }

    /**
     * Send OTP to the currently authenticated admin user's phone for approval verification.
     */
    public function sendApprovalOtp(Request $request, WhatsAppOtpService $whatsappOtpService)
    {
        $user = Auth::user();
        if (!$user || empty($user->phone)) {
            return response()->json(['success' => false, 'message' => 'Phone not available'], 400);
        }

        $otp = (string) rand(100000, 999999);

        DB::table('update_verifications')->where('user_id', $user->id)->update(['status' => 0]);

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

        // Fire and forget; even if sending fails, the OTP record exists for verification.
        $whatsappOtpService->sendOtp($fullNumber, $otp);

        return response()->json(['success' => true]);
    }

    /**
     * Verify OTP for approval.
     */
    public function verifyApprovalOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $otp = $request->input('otp');

        $otpEntry = DB::table('update_verifications')
            ->where('user_id', $user->id)
            ->where('otp', $otp)
            ->where('expires_at', '>', now())
            ->where('status', 1)
            ->first();

        if (!$otpEntry) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired OTP'], 200);
        }

        DB::table('update_verifications')->where('user_id', $user->id)->update(['status' => 0]);

        session(['admin_otp_verified' => true]);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeTemp $employeeTemp)
    {
        //
    }
}
