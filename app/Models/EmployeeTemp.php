<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTemp extends Model
{
    protected $fillable = ['salutation','emp_name','gender','dob','address','temp_address',
      'phone','doj','kgid','DR_PR','HK','category','sub_category','sub_caste','is_married',
      'spouse_name','spouse_gender','spouse_phone','is_spouse_working','spouse_working_in',
      'spouse_kgid','spouse_working_place','nominee_name','nominee_gender','nominee_dob',
      'nominee_relation','post_held','post_organization','post_district_id','post_district',
      'post_taluk_id','post_group','post_taluk','post_pay_scale','post_from','post_to',
      'post_designation','post_increment_date','employee_id','status'];

    public function children()
    {
      return $this->hasMany(ChildTemp::class);
    }
    public function policies()
    {
      return $this->hasMany(PolicyTemp::class);
    }
}
