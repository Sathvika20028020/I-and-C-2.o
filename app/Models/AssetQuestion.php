<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetQuestion extends Model
{
    protected $fillable = [
      'asset_category_id',
      'asset_subcategory_id',
      'question',
      'type'
    ];

    public function asset_category()
    {
        return $this->belongsTo(AssetCategory::class);
    }
    public function asset_subcategory()
    {
        return $this->belongsTo(AssetSubCategory::class);
    }
    public function options()
    {
        return $this->hasMany(AssetQuestionOption::class);
    }
}
