<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard(){
       return view('superadmin.dashboard');
    }
   
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
    public function show(admin $admin)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }


    public function showloginform(){
        return view('superadmin.auth.login');
    }

    public function adminloginform(Request $request){

       // dd($request);

       $data = $request->only('email','password');

       if(Auth::guard('superadmin')->attempt($data)){
        $admin = Auth::guard('superadmin')->user();

        session([
            'admin_login' => true,
            'admin_id' => $admin->id,
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
        ]);

        if ($request->hasSession()) {
            $request->session()->put('auth.password_confirmed_at', time());
        }

        DB::table('admin_logs')->insert([
            'admin_id' => $admin->id,
            'admin_ip_addr' => $request->ip(), 
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('admindashboard')->with('success', 'Admin logged in successfully!');
    } else {
        return redirect()->route('adminlogin')->with('error', 'Invalid login credentials.');
    }
       }


       public function forgotpassword(){
        return view('admin.forgotpassword');
       }

       public function adminlogout(){
       Auth::guard('superadmin')->logout(); 
       session()->forget('admin_login'); 
       session()->forget('admin_id');
   
       return redirect()->route('adminlogin')->with('success', 'Admin logged out successfully!');
       }

}






