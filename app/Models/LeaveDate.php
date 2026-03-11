<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveDate extends Model
{
    protected $fillable = ['leave_id','date','reason','status','paid'];

    public function leave()
    {
        return $this->belongsTo(Leave::class);
    }
}
