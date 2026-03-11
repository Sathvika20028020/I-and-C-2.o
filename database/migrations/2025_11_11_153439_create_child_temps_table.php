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
        Schema::create('child_temps', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_temp_id')->index();
            $table->integer('employee_id')->index();
            $table->integer('children_id')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_temps');
    }
};
