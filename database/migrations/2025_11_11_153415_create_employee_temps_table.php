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
        Schema::create('employee_temps', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->nullable();
            $table->string('salutation')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->text('address')->nullable();
            $table->text('temp_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('doj')->nullable();
            $table->string('kgid')->nullable();
            $table->string('DR_PR')->nullable();
            $table->string('HK')->nullable();
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
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
            $table->string('post_organization')->nullable();
            $table->string('post_district_id')->nullable();
            $table->string('post_district')->nullable();
            $table->string('post_taluk_id')->nullable();
            $table->string('post_group')->nullable();
            $table->string('post_taluk')->nullable();
            $table->string('post_pay_scale')->nullable();
            $table->date('post_from')->nullable();
            $table->date('post_to')->nullable();
            $table->string('post_designation')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_temps');
    }
};
