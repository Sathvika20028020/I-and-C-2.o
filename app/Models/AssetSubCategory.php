<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetSubCategory extends Model
{
    protected $fillable = [
      'name',
      'asset_category_id',
      'icon',
      'status'
    ];

    public function asset_category()
    {
        return $this->belongsTo(AssetCategory::class);
    }

    public function questions()
    {
        return $this->hasMany(AssetQuestion::class, 'asset_subcategory_id');
    }
}
