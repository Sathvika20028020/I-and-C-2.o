<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLogs;
use App\Models\Folder;
use App\Models\FolderUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showuserloginform(){
        return view('users.auth.login');
    }

    public function showadminloginform(){
        return view('users.superadmin.login');
    }

    public function userloginformold(Request $request){
        // dd($request);
       // $credentials = $request->only('phone', 'password');
       $login = $request->input('login'); 
    $password = $request->input('password');

    // Check if input is email or phone
            $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

            $credentials = [
                $fieldType => $login,
                'password' => $password,
            ];
  
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
    
            // Storing session values
            session([
                'user_login' => true,
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
            ]);
    
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
    
          
            UserLogs::insert([
                'user_id' => $user->id,
                'user_ip_addr' => $request->ip(), 
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $checkfolder = FolderUser::where('user_id',$user->id)->first();

           // dd($checkfolder->folder_id);

           if($checkfolder->folder_id == 2){
            return redirect()->route('msmedashboard')->with('success', 'Member logged in successfully!');
        } 
        elseif($checkfolder->folder_id == 3) 
        {
        return redirect()->route('sarojinidashboard')->with('success', 'Member logged in successfully!');
        }
        elseif($checkfolder->folder_id == 4) 
        {
        return redirect()->route('questions.dashboard')->with('success', 'Member logged in successfully!');
        }
        else{
                return redirect()->route('login')->with('error', 'Invalid login credentials.');
        }

        }
      }
      
       public function userloginform(Request $request)
{
    $login = $request->input('login'); 
    $password = $request->input('password');

    // Determine if input is email or phone
    $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

    $credentials = [
        $fieldType => $login,
        'password' => $password,
    ];

    if (Auth::guard('web')->attempt($credentials)) {
        $user = Auth::guard('web')->user();

        // Store session data
        session([
            'user_login' => true,
            'user_id' => $user->id,
            'user_role' => $user->role,
            'user_name' => $user->name,
            'user_email' => $user->email,
        ]);

        if ($request->hasSession()) {
            $request->session()->put('auth.password_confirmed_at', time());
        }

        // Log the user IP
        UserLogs::insert([
            'user_id' => $user->id,
            'user_ip_addr' => $request->ip(), 
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Check if the user has a folder assigned
        $checkfolder = FolderUser::where('user_id', $user->id)->first();

        if ($checkfolder && $checkfolder->folder_id == 2) {
            return redirect()->route('employee')->with('success', 'Member logged in successfully!');
        } elseif ($checkfolder && $checkfolder->folder_id == 3) {
            return redirect()->route('sarojinidashboard')->with('success', 'Member logged in successfully!');
        } 
        elseif ($checkfolder && $checkfolder->folder_id == 4) {
            return redirect()->route('questions.dashboard')->with('success', 'Member logged in successfully!');
        } 
        else {
            return redirect()->route('login')->with('error', 'No reports are assigned.');
        }
    } else {
       
        return redirect()->back()->withInput()->with('error', 'Invalid credentials');
    }
}
  
      public function userlogout(Request $request){
        $user = Auth::guard('web')->user();
          $role = $user ? $user->role : null;
          Auth::guard('web')->logout(); 
          session()->forget('user_login'); 
          session()->forget('user_id');
          session()->forget('admin_otp_verified');
          if ($role === 1) {
            return redirect()->route('adminlogin')->with('success', 'Admin logged out successfully!');
        } else {
            return redirect('/userlogin')->with('success', 'User logged out successfully!');
        }
          
      }


      public function userforgotpassword(){
      
        return view('users.auth.forgotpassword');
    }

    public function userforgotform(Request $request){
        //dd($request);
            $check = User::where('phone',$request->phone)->first();

            if($check){
            
                $check->password = Hash::make($request->input('password'));
                $check->save();

                return redirect()->route('login')->with('success','password reset done successfully!');
            }

         return redirect()->back()->with('error','invalid email id  or This email is not registered');
    }


  
    public function index()
    {
        $users = User::all();
        return view('reports.usermanagement.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $folders = Folder::where('parent_id',1)->where('status',2)->get();
        return view('reports.usermanagement.create',compact('folders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request);
        $data = $request->all();

        $user = User::create($data);

        $folders = $request->input('folders');
      
        foreach($folders as $folder){

          $folderassigned = [
            'user_id'=> $user->id,
            'folder_id' =>$folder,
          ];

          FolderUser::create($folderassigned);
        }

        return redirect()->route('users.index')->with('user created successfully!');
      
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $folders = Folder::whereIn('status', [1, 2])->get();

        // Get assigned folder IDs
       $assignedFolders = $user->folders()->whereIn('status', [1, 2])->get();
        return view('reports.usermanagement.show',compact('user','folders','assignedFolders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(User $user)
    // {
    //     $folders = Folder::whereIn('status', [1, 2])->get();

    //     // Get assigned folder IDs
    //     $assignedFolders = $user->folders->pluck('id')->toArray();
    
    //     return view('reports.usermanagement.edit',compact('user','folders','assignedFolders'));
    // }
  public function edit(User $user)
{
    // Fetch all folders with status 1 or 2
   
    $role = User::where('role',$user->role)->select('role')->first();
    if($role->role == 1){
         $folders = Folder::whereIn('status', [1,2] )->get();
    }
    else{
         $folders = Folder::where('status', 2 )->get();
    }
        $assignedFolders = $user->folders()->pluck('folder_id')->toArray();

    return view('reports.usermanagement.edit', [
        'user' => $user,
        'folders' => $folders,
        'assignedFolders' => $assignedFolders,
       
    ]);
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate input (optional but recommended)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'required|string',
            'folder_ids' => 'array|nullable',
        ]);
    
        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
    
        // Sync folders if present
        if ($request->has('folder_ids')) {
            $user->folders()->sync($request->folder_ids);
        }
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
    
    
    
    
    // human resource demo functions
    
    
    public function employeeindex(){
        return view('reports.HRmanagement.dashboard');
    }
    
     public function employeeview(){
        return view('reports.HRmanagement.view');
    }
    
    public function industriesindex(){
                return view('reports.LMIndustries.dashboard');

    }
  
}
