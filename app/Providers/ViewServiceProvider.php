<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\Employee;
use App\Models\User;
use App\Models\Leave;
use App\Models\LeaveDate;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
  


        public function boot(): void
        {
            
            View::composer('*', function ($view) {
                $user = Auth::user();
              
            //  Log::info('View composer triggered', ['user' => $user?->id, 'role' => $user?->role]);
           //  Log::info('View composer running...');
                if (!$user) {
                    $view->with('userModules', []);
                    return;
                }
            
                if ($user->role === 1) {
                    // Superadmin: fetch all folders with status 1 or 2
                    $folders =  \App\Models\Folder::whereIn('status', [1, 2])->get();
                } elseif ($user->role === 2) {
                    // Admin: only folders assigned to them and status 2
                    $folders = $user->folders()->where('status', 2)->get();
                } else {
                    $folders = collect();
                }
                 \Log::info('User Modules:', ['userModules' => $folders]);
            
                $view->with('userModules', $folders);
            });

            View::composer('pwa.layout.footer', function ($view) {

                if (!auth()->check()) {
                    $view->with('leaveCount', 0);
                    return;
                }

                $leaves = Leave::whereHas('user.employee', function ($q) {
                    $q->where('reporting_officer_id', auth()->user()->emp_id);
                })->pluck('id')->toArray();

                $leaveCount = LeaveDate::whereIn('leave_id', $leaves)->where('status', 'Pending')->count();

                $view->with('leaveCount', $leaveCount);
            });
        }



}
