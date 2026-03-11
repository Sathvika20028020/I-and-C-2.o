<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'person_id',
        'name',
        'department',
        'attendance_date',
        'shift',
        'timetable',
        'status',
        'check_in',
        'check_out',
        'late_minutes',
        'early_leave_minutes',
        'attended_minutes',
    ];
}
