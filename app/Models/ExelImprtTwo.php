<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExelImprtTwo extends Model
{
    protected $table = 'exel_imprt_twos';


    protected $fillable = [
        'district',
        'divisions',
        'kannadiga_g1',
        'others_g1',
        'total_g1',
        'percent_g1',
        'kannadiga_g2',
        'others_g2',
        'total_g2',
        'percent_g2',
        'kannadiga_g3',
        'others_g3',
        'total_g3',
        'percent_g3',
        'kannadiga_g4',
        'others_g4',
        'total_g4',
        'percent_g4',
        'total_kannadiga',
        'others_total',
        'total',
        'percentage',
      
    ];
}
