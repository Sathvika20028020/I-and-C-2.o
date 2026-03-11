<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleForm extends Model
{
    protected $fillable = [
      "district",
      "unit_types",
      "small_address","small_kannadigas_group_a","small_others_group_a","small_kannadigas_group_b",
      "small_others_group_b","small_kannadigas_group_c","small_others_group_c","small_kannadigas_group_d",
      "small_others_group_d","small_doc",
      "medium_address","medium_kannadigas_group_a","medium_others_group_a","medium_kannadigas_group_b",
      "medium_others_group_b","medium_kannadigas_group_c","medium_others_group_c","medium_kannadigas_group_d",
      "medium_others_group_d","medium_doc",
      "large_address","large_kannadigas_group_a","large_others_group_a","large_kannadigas_group_b",
      "large_others_group_b","large_kannadigas_group_c","large_others_group_c","large_kannadigas_group_d",
      "large_others_group_d","large_doc",
      "mega_address","mega_kannadigas_group_a","mega_others_group_a","mega_kannadigas_group_b",
      "mega_others_group_b","mega_kannadigas_group_c","mega_others_group_c","mega_kannadigas_group_d",
      "mega_others_group_d","mega_doc",
      "ultramega_address","ultramega_kannadigas_group_a","ultramega_others_group_a",
      "ultramega_kannadigas_group_b","ultramega_others_group_b","ultramega_kannadigas_group_c",
      "ultramega_others_group_c","ultramega_kannadigas_group_d","ultramega_others_group_d","ultramega_doc",
      "supermega_address","supermega_kannadigas_group_a","supermega_others_group_a",
      "supermega_kannadigas_group_b","supermega_others_group_b","supermega_kannadigas_group_c",
      "supermega_others_group_c","supermega_kannadigas_group_d","supermega_others_group_d","supermega_doc"];
}
