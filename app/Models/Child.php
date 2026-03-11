<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [
      'name',
      'gender',
      'dob',
      'employee_id',
    ];
}
