<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = ['user_id','name','leave_type_id','duration','reason','file'];

    public function dates()
    {
        return $this->hasMany(LeaveDate::class);
    }
    public function leave_type()
    {
        return $this->belongsTo(LeaveType::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
