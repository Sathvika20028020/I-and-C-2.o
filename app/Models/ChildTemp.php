<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildTemp extends Model
{
    protected $fillable = ['employee_temp_id','employee_id','children_id','name','gender','dob'];
    
    public function child()
    {
        return $this->belongsTo(Child::class, 'children_id');
    }
}
