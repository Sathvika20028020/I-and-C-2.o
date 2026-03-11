<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $fillable = [
    'emp_name',
    'group',
    'designation',
    'reg',
    'cadre_type',
    'working_at',
    'taluk',
    'district',
    'dob',
    'doj',
    'post_held_from',
    'dor',
    'category',
    'sub_category',
    'KPSC',
    'HK',
    'DR_PR',
    'gender',
    'increment',
    'phone',
    'salutation',
    'date_of_increment',
    'address',
    'temp_address',
    'kgid',
    'sub_caste',
    'is_married',
    'spouse_name',
    'spouse_gender',
    'spouse_phone',
    'is_spouse_working',
    'spouse_working_in',
    'spouse_kgid',
    'spouse_working_place',
    'nominee_name',
    'nominee_gender',
    'nominee_dob',
    'nominee_relation','post_held','post_organization','post_district_id','post_district','post_taluk_id',
    'post_group','post_taluk','post_posting','post_pay_scale','post_from','post_to','post_type',
    'post_designation','post_increment_date',
    // 'reporting_officer_id','role','is_profile_updated','asset_access'
  ];

  // Role: 1 : Reporting Officer

  public function castes()
  {
    return $this->hasMany(EmployeeCaste::class);
  }
  public function nominees()
  {
    return $this->hasMany(Nominee::class);
  }
  public function children()
  {
    return $this->hasMany(Child::class);
  }
  public function policies()
  {
    return $this->hasMany(Policy::class);
  }
  public function postings()
  {
    return $this->hasMany(Posting::class)->orderBy('from','desc');
  }
  public function ro()
  {
    return $this->belongsTo(Employee::class, 'reporting_officer_id');
  }

}
