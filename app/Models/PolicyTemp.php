<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolicyTemp extends Model
{
    protected $fillable = ['employee_temp_id','employee_id','policy_id','number','start_date','premium'];

    public function policy()
    {
        return $this->belongsTo(Policy::class, 'policy_id');
    }
}
