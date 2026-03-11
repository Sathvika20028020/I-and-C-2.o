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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('person_id');
            $table->string('name');
            $table->string('department')->nullable();

            $table->date('attendance_date');

            $table->string('shift')->nullable();
            $table->string('timetable')->nullable();

            $table->string('status')->nullable();

            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();

            $table->integer('late_minutes')->default(0);
            $table->integer('early_leave_minutes')->default(0);
            $table->integer('attended_minutes')->default(0);

            $table->timestamps();

            $table->unique(['person_id', 'attendance_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
