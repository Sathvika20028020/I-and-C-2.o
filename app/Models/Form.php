<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable=['district', 'unittype', 'document', 'address',
        'group_a_kannadigas', 'group_a_others', 'group_b_kannadigas', 'group_b_others',
        'group_c_kannadigas', 'group_c_others', 'group_d_kannadigas', 'group_d_others'
    ];
}
