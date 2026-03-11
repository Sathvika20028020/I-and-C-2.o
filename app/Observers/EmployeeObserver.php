<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Str;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     */
    public function created(Employee $employee): void
    {
        $user = User::where('phone', $employee->phone)->first();

        if (!$user) {
            User::create([
                'name' => $employee->emp_name,
                'phone' => $employee->phone,
                'email' => $employee->phone,
                'role'  => 3,
                'emp_id' => $employee->id,
                'password' => bcrypt(Str::random(12)),
            ]);
        }
    }

    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "deleted" event.
     */
    public function deleted(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "restored" event.
     */
    public function restored(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "force deleted" event.
     */
    public function forceDeleted(Employee $employee): void
    {
        //
    }
}
