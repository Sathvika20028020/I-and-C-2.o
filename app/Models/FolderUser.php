<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FolderUser extends Model
{
    protected $fillable = ['user_id','folder_id'];
}
