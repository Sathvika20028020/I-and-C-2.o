<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\AssetCategoryController;
use App\Http\Controllers\Admin\AssetSubCategoryController;
use App\Http\Controllers\Admin\AssetQuestionController;
use App\Http\Controllers\Admin\AssetController as AdminAsset;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\EmployeeTempController;
use App\Http\Controllers\Admin\AssigneController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExelImprtOneController;
use App\Http\Controllers\ExelImprtTwoController;
use App\Http\Controllers\ExelImprtOneDemoController;
use App\Http\Controllers\ExelImprtTwoDemoController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GoogleFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AssetInventoryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LeaveController as UserLeave;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\LeaveTypeController;
use App\Http\Controllers\Admin\RestrictedHolidaysController;
use App\Http\Controllers\Admin\GovHolidaysController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\AssigneAssetController;



// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/dashboard', function () {
//     return view('users.dashboard');
// });

Route::get('/clear-all', function () {
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    return 'Cache cleared';
});


Route::get('/login',[HomeController::class,'login'])->name('pwa.login');
Route::post('/login',[HomeController::class,'kgidLogin'])->name('pwa.loginchcek');
Route::post('/verify-kgid',[HomeController::class,'verifyKgid'])->name('pwa.verify.kgid');
Route::post('/otp-login',[HomeController::class,'login_otp'])->name('pwa.otp.login');
Route::post('/logout',[HomeController::class,'userlogout'])->name('pwa.logout');
Route::get('/pwa/otpLogin',[HomeController::class,'otpLogin'])->name('pwa.otpLogin');
Route::get('/send-login-otp/{phone}',[HomeController::class,'sendLoginOtp'])->name('pwa.sendLoginOtp');

Route::middleware(['web', 'auth:pwauser'])->group(function () {
    Route::get('/pwa/dashboard',[HomeController::class,'dashboard'])->name('pwa.dashboard');
    Route::get('/pwa/visits', function(){return view('pwa.visitList');});

    Route::get('/pwa/otp/request', [HomeController::class, 'SendOtp'])->name('pwa.otp.request');
    Route::get('/pwa/verify-otp/{otp}', [HomeController::class, 'verifyOtp']);
    Route::post('/pwa/verify-otp-update', [HomeController::class, 'verifyOtpAndUpdate'])->name('pwa.verify.otp');

    Route::get('/pwa/profile',[HomeController::class,'newProfile'])->name('pwa.profile');
    Route::get('/pwa/category',[AssetInventoryController::class,'category'])->name('pwa.category');
    Route::get('/pwa/subcategory/{id}',[AssetInventoryController::class,'subcategory'])->name('pwa.subcategory');
    Route::get('/pwa/details',[HomeController::class,'details'])->name('pwa.details');
    Route::get('/pwa/newProfile',[HomeController::class,'newProfile'])->name('pwa.newProfile');
    Route::post('/pwa/verify-profile',[HomeController::class,'verifyProfile'])->name('pwa.verify.profile');
    Route::get('/pwa/newProfileForm',[HomeController::class,'newProfileForm'])->name('pwa.newProfileForm');
    Route::post('/pwa/newProfileForm',[HomeController::class,'newProfileSave']);
    Route::get('/list/designations/{group}',[HomeController::class,'getDesignations'])->name('list.designations');
    Route::get('/list/taluks/{group}',[HomeController::class,'getTaluks'])->name('list.taluks');
    Route::get('/pwa/otp',[HomeController::class,'profileotp'])->name('pwa.otp');
    Route::get('/pwa/profile/edit',[HomeController::class,'editprofile'])->name('pwa.profile.edit');
    Route::post('/profile/update/{id}',[HomeController::class,'profileupdate'])->name('profile.update');
    Route::get('/pwa/assetsForm',[HomeController::class,'assetsForm'])->name('pwa.assetsForm');
    Route::get('/pwa/newAssetForm',[HomeController::class,'newAssetForm'])->name('pwa.newAssetForm');
    Route::get('/pwa/assetView',[HomeController::class,'assetView'])->name('pwa.assetView');
    Route::get('/pwa/menu-main', function(){
      return view('pwa.layout.menu-main');
    });
    // Route::resource('asset-inventory',AssetInventoryController::class);
    Route::get('/pwa/asset-inventory/index',[AssetInventoryController::class,'index'])->name('asset-inventory.index');
    Route::get('/pwa/asset-inventory/create',[AssetInventoryController::class,'create'])->name('asset-inventory.create');
    Route::post('/pwa/asset-inventory/store',[AssetInventoryController::class,'store'])->name('asset-inventory.store');
    Route::get('/pwa/asset-inventory/show/{id}',[AssetInventoryController::class,'show'])->name('asset-inventory.show');
    Route::get('/pwa/asset-inventory/edit/{uid}',[AssetInventoryController::class,'edit'])->name('asset-inventory.edit');
    Route::put('/pwa/asset-inventory/update/{uid}',[AssetInventoryController::class,'update'])->name('asset-inventory.update');
    Route::delete('/pwa/asset-inventory/destroy/{uid}',[AssetInventoryController::class,'destroy'])->name('asset-inventory.destroy');
    Route::get('/pwa/asset-inventory/menu-main', function(){
      return view('pwa.layout.menu-main');
    });
    Route::post('/upload-asset-image',[AssetInventoryController::class,'saveAssetImage'])->name('upload-asset-image');
    
    Route::prefix('pwa')->name('pwa.')->group(function(){
      Route::resource('leaves', UserLeave::class);
      Route::resource('leave-request', LeaveRequestController::class);
    });
});

Route::resource('/form', GoogleFormController::class);

Route::get('/admin/login',[UserController::class,'showadminloginform'])->name('adminlogin');


Route::get('/userlogin',[UserController::class,'showuserloginform'])->name('login');
Route::post('/userlogin',[UserController::class,'userloginform'])->name('userloginform');
Route::post('/userlogout',[UserController::class,'userlogout'])->name('userlogout');
Route::get('/userforgotpassword',[UserController::class, 'userforgotpassword'])->name('userforgotpassword');
Route::post('/userforgotpassword',[UserController::class, 'userforgotform'])->name('userforgotpasswordform');
Route::get('/dashboardnew/export-districts', [ExelImprtOneController::class, 'exportDistrictData']);
Route::get('/dashboardnew/export-gender-details', [ExelImprtOneController::class, 'exportGenderData']);
Route::get('/dashboardnew/export-category', [ExelImprtOneController::class, 'exportCategoryData']);

Route::get('/msme-dashboard/{type}',[DashboardController::class,'dashboard'])->name('msmeDashboard');
Route::post('/msme-dashboard/{type}',[DashboardController::class,'filter']);


Route::middleware('auth:web')->group(function(){


// dynamic folders in sidebar

        Route::get('/folders/{folder}', function ($folderName) {
            $folderPath = resource_path("views/reports/{$folderName}");
            if (is_dir($folderPath)) {
                return view("reports.{$folderName}"); 
            }
            abort(404); 
        })->name('folders.show');
        
    Route::post('/request-otp', [EmployeeController::class, 'requestOtp'])->name('request.otp');
    Route::post('/verify-otp-update', [EmployeeController::class, 'verifyOtpAndUpdate'])->name('verify.otp');

    Route::get('/msmedashboardnew',[ExelImprtOneController::class,'dashboardnew'])->name('msmedashboardnew');
    Route::get('/api/dynamic-filters', [ExelImprtOneController::class, 'dynamicFilters']);
    Route::get('/dropdownfilter-options', [ExelImprtOneController::class, 'getdropdownoptions'])->name('admin.dropdwnoptions');
    Route::get('/dashboardnew/filter-data', [ExelImprtOneController::class, 'getFilteredData'])->name('dashboardnew.filtered');


    Route::get('/msmereport',[ExelImprtOneController::class,'dashboard'])->name('msmedashboard');
    Route::get('/users/view/{id}', [ExelImprtOneController::class, 'view'])->name('users.view');
    Route::get('/users/edit/{id}', [ExelImprtOneController::class, 'edit'])->name('edit.dashboardone');
    Route::put('/users/update/{user}', [ExelImprtOneController::class, 'update'])->name('update.dashboardone');


    Route::post('/admin/exelimport', [ExelImprtOneController::class, 'import'])->name('admin.exelimport.import');
    Route::get('/admin/data', [ExelImprtOneController::class, 'getData'])->name('adminusers.data');
    Route::get('/admin/counts', [ExelImprtOneController::class, 'getFilteredCounts'])->name('adminusers.counts');
    Route::get('/filter-options', [ExelImprtOneController::class, 'getFilterOptions'])->name('adminfilter.options');
    Route::post('/adminexport-selected', [ExelImprtOneController::class, 'exportMSME'])->name('adminexport.selected');
    Route::get('/admindashboard/all_ids', [ExelImprtOneController::class, 'getAllIds'])->name('msmeusers.all_ids');

       
// sarojini mahishi report
    Route::get('/sarojinimahishidashboard', [ExelImprtTwoController::class, 'dashboard'])->name('sarojinidashboard');
    Route::get('/users/dashboardtwoview/{id}', [ExelImprtTwoController::class, 'view'])->name('users.dashboardtwo.view');
    Route::get('/users/dashboardtwoedit/{id}', [ExelImprtTwoController::class, 'edit'])->name('edit.dashboardtwo');
    Route::put('/users/dashboardtwo/{usertwo}', [ExelImprtTwoController::class, 'update'])->name('update.dashboardtwo');
    Route::post('/admin/exelimporttwo', [ExelImprtTwoController::class, 'import'])->name('admin.exelimport.importtwo');
    Route::get('/admindashboardtwo/data', [ExelImprtTwoController::class, 'getData'])->name('dashboardtwo.data');
    Route::post('/adminexport-sarojini', [ExelImprtTwoController::class, 'exportsarojini'])->name('export.sarojini');
    Route::get('/admindashboardtwo/all_ids', [ExelImprtTwoController::class, 'getAllIds'])->name('dashboardtwo.all_ids');

// demo purpose questions route
    Route::get('/adminquestionroute', [ExelImprtOneDemoController::class, 'dashboardquestions'])->name('questions.dashboard');
    Route::get('/adminlistviewquestions', [ExelImprtOneDemoController::class, 'index'])->name('questions.index');
    Route::get('/adminaddquestions', [ExelImprtOneDemoController::class, 'create'])->name('questions.add');
    Route::get('/adminviewdashboard', [ExelImprtOneDemoController::class, 'dashboardview'])->name('questions.dashboardview');
    Route::get('/adminviewquestions', [ExelImprtOneDemoController::class, 'view'])->name('questions.view');
    Route::get('/adminviewquestions', [ExelImprtOneDemoController::class, 'view'])->name('questions.view');
    Route::get('/assetQuestion', [ExelImprtOneDemoController::class, 'assetQuestion'])->name('questions.assetQuestion');
    Route::get('/assetsList', [ExelImprtOneDemoController::class, 'assetsList'])->name('questions.assetsList');

// question routes ends here

// user management
    Route::resource('users',UserController::class);
    Route::resource('asset-category',AssetCategoryController::class);
    Route::resource('asset-subcategory',AssetSubCategoryController::class);
    Route::resource('asset-question',AssetQuestionController::class);
    Route::resource('asset',AdminAsset::class);
    Route::get('assets/dashboard', [AdminAsset::class, 'dashboard'])->name('assets.dashboard');
    Route::resource('assetsList',AssetQuestionController::class);
    Route::resource('question',QuestionController::class);
    Route::resource('profile_update',EmployeeTempController::class);
    Route::resource('leaves', LeaveController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::resource('leave-types', LeaveTypeController::class);
    Route::resource('restricted-holidays', RestrictedHolidaysController::class);
    Route::resource('gov-holidays', GovHolidaysController::class);
    Route::post('/admin/approval/send-otp', [EmployeeTempController::class, 'sendApprovalOtp'])->name('admin.approval.sendOtp');
    Route::post('/admin/approval/verify-otp', [EmployeeTempController::class, 'verifyApprovalOtp'])->name('admin.approval.verifyOtp');
    Route::get('question-dashboard',[QuestionController::class, 'dashboard'])->name('question.dashboard');
    Route::get('question-data',[QuestionController::class, 'data'])->name('question.data');
    Route::resource('assigned-list', AssigneController::class);
    Route::resource('asset-access', AssigneAssetController::class);
    
    // human resources
    
  
    Route::get('employees/list',[EmployeeController::class,'index'])->name('employee');
    Route::get('employees/{id}/edit',[EmployeeController::class,'edit']);
    Route::get('employees/{id}',[EmployeeController::class,'show']);
    Route::post('employees/{id}',[EmployeeController::class,'update'])->name('employee.update');
    Route::get('industries/list',[EmployeeController::class,'industriesindex'])->name('industries');
    Route::post('/admin/employee/import', [EmployeeController::class, 'import'])->name('admin.employees.import');
    Route::post('/admin/employee/export', [EmployeeController::class, 'export'])->name('admin.employees.export');
    Route::get('/admin/employee/data', [EmployeeController::class, 'getData'])->name('admin.employee.data');
    Route::get('/admin/employee/counts', [EmployeeController::class, 'getFilteredCounts'])->name('admin.employee.counts');
    Route::get('/employee/filter-options', [EmployeeController::class, 'getFilterOptions'])->name('adminfilter.employee.options');


});


 Route::get('/newAssetForm', function(){return view('pwa.newAssetForm');})->name('newAssetForm');

Route::get('/assetsIndex', function() {
    return view('reports.assets.index');
})->name('assetsIndex');
Route::get('/assetsShow', function() {
    return view('reports.assets.show');
})->name('assetsShow');
 Route::get('/leaveform', function(){return view('pwa.leaveform');})->name('leaveform');
 Route::get('/leavelist', function(){return view('pwa.leavelist');})->name('leavelist');
 Route::get('/leaveview', function(){return view('pwa.leaveview');})->name('leaveview');
 Route::get('/myleaves', function(){return view('pwa.myleaves');})->name('myleaves');
 Route::get('/newlogin', function(){return view('pwa.newlogin');})->name('newlogin');
 Route::get('/visitfieldlist', function(){return view('users.visitfieldlist');})->name('visitfieldlist');
Route::get('/visitfieldview', function(){return view('users.visitfieldview');})->name('visitfieldview');
