<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetCategory extends Model
{
    protected $fillable = [
      'name','icon','status'
    ];

    public function subcategories()
    {
        return $this->hasMany(AssetSubCategory::class)->where('status', 1);
    }

    public function getSubcategoryNamesAttribute(){
      return implode(', ',$this->subcategories()->pluck('name')->toArray());
    }
}
