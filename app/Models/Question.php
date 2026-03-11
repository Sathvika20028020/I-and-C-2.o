<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
      'department','number','asked_by','answered_by','date',
      'question','answer','keywords','status'
    ];
}
