<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetInventory extends Model
{
    protected $fillable = [
      'user_id',
      'employee_id',
      'question_id',
      'answer',
      'set_uuid',
      'display',
      'type',
      'district_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function question()
    {
        return $this->belongsTo(AssetQuestion::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
