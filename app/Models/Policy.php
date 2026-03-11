<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
      'number',
      'start_date',
      'premium',
      'employee_id',
    ];
}
