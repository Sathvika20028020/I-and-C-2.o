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
        Schema::create('exel_imprt_twos', function (Blueprint $table) {
            $table->id();
            $table->string('district');
            $table->string('divisions');
            $table->string('kannadiga_g1');
            $table->string('others_g1');
            $table->string('total_g1');
            $table->string('percent_g1');
            $table->string('kannadiga_g2');
            $table->string('others_g2');
            $table->string('total_g2');
            $table->string('percent_g2');
            $table->string('kannadiga_g3');
            $table->string('others_g3');
            $table->string('total_g3');
            $table->string('percent_g3');
            $table->string('kannadiga_g4');
            $table->string('others_g4');
            $table->string('total_g4');
            $table->string('percent_g4');
            $table->string('total_kannadiga');
            $table->string('others_total');
            $table->string('total');
            $table->string('percentage');
            $table->string('users_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exel_imprt_twos');
    }
};
