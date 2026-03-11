<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $fillable = [
      'name',
      'gender',
      'dob',
      'relation',
      'employee_id',
    ];
}
