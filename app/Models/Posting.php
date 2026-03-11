<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $fillable = [
      'post_held','organization','district_id','district','taluk_id',
      'group','taluk','posting','pay_scale','from','to','type',
      'designation','increment_date',
      'employee_id',
    ];
}
