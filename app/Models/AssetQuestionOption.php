<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetQuestionOption extends Model
{
    protected $fillable = [
      'asset_question_id',
      'option',
    ];
}
