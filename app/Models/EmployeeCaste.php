<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeCaste extends Model
{
     protected $fillable = [
      'category_id',
      'category',
      'caste_id',
      'caste',
      'sub_caste_id',
      'sub_caste',
      'employee_id',
    ];
}
