<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('sub_caste')->nullable();
            $table->string('is_married')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_gender')->nullable();
            $table->string('spouse_phone')->nullable();
            $table->string('is_spouse_working')->nullable();
            $table->string('spouse_working_in')->nullable();
            $table->string('spouse_kgid')->nullable();
            $table->string('spouse_working_place')->nullable();
            $table->string('nominee_name')->nullable();
            $table->string('nominee_gender')->nullable();
            $table->date('nominee_dob')->nullable();
            $table->string('nominee_relation')->nullable();
            $table->string('post_held')->nullable();
            $table->string('post_group')->nullable();
            $table->string('post_designation')->nullable();
            $table->string('post_organization')->nullable();
            $table->integer('post_district_id')->nullable();
            $table->string('post_district')->nullable();
            $table->integer('post_taluk_id')->nullable();
            $table->string('post_taluk')->nullable();
            $table->string('posting')->nullable();
            $table->date('post_from')->nullable();
            $table->date('post_to')->nullable();
            $table->string('post_pay_scale')->nullable();
            $table->date('post_increment_date')->nullable();
            $table->string('post_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('sub_caste');
            $table->dropColumn('is_married');
            $table->dropColumn('spouse_name');
            $table->dropColumn('spouse_gender');
            $table->dropColumn('spouse_phone');
            $table->dropColumn('is_spouse_working');
            $table->dropColumn('spouse_working_in');
            $table->dropColumn('spouse_kgid');
            $table->dropColumn('spouse_working_place');
            $table->dropColumn('nominee_name');
            $table->dropColumn('nominee_gender');
            $table->dropColumn('nominee_dob');
            $table->dropColumn('nominee_relation');
            $table->dropColumn('post_held');
            $table->dropColumn('post_group');
            $table->dropColumn('post_designation');
            $table->dropColumn('post_organization');
            $table->dropColumn('post_district_id');
            $table->dropColumn('post_district');
            $table->dropColumn('post_taluk_id');
            $table->dropColumn('post_taluk');
            $table->dropColumn('posting');
            $table->dropColumn('post_from');
            $table->dropColumn('post_to');
            $table->dropColumn('post_pay_scale');
            $table->dropColumn('post_increment_date');
            $table->dropColumn('post_type');
        });
    }
};
