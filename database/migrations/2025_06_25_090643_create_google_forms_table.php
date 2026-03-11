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
        Schema::create('google_forms', function (Blueprint $table) {
            $table->id();
            $table->string('district')->nullable();
            $table->string('unit_types')->nullable();

            $table->text('small_address')->nullable();
            $table->string('small_doc')->nullable();
            $table->string('small_kannadigas_group_a')->nullable();
            $table->string('small_others_group_a')->nullable();
            $table->string('small_kannadigas_group_b')->nullable();
            $table->string('small_others_group_b')->nullable();
            $table->string('small_kannadigas_group_c')->nullable();
            $table->string('small_others_group_c')->nullable();
            $table->string('small_kannadigas_group_d')->nullable();
            $table->string('small_others_group_d')->nullable();

            $table->text('medium_address')->nullable();
            $table->string('medium_doc')->nullable();
            $table->string('medium_kannadigas_group_a')->nullable();
            $table->string('medium_others_group_a')->nullable();
            $table->string('medium_kannadigas_group_b')->nullable();
            $table->string('medium_others_group_b')->nullable();
            $table->string('medium_kannadigas_group_c')->nullable();
            $table->string('medium_others_group_c')->nullable();
            $table->string('medium_kannadigas_group_d')->nullable();
            $table->string('medium_others_group_d')->nullable();

            $table->text('large_address')->nullable();
            $table->string('large_doc')->nullable();
            $table->string('large_kannadigas_group_a')->nullable();
            $table->string('large_others_group_a')->nullable();
            $table->string('large_kannadigas_group_b')->nullable();
            $table->string('large_others_group_b')->nullable();
            $table->string('large_kannadigas_group_c')->nullable();
            $table->string('large_others_group_c')->nullable();
            $table->string('large_kannadigas_group_d')->nullable();
            $table->string('large_others_group_d')->nullable();

            $table->text('mega_address')->nullable();
            $table->string('mega_doc')->nullable();
            $table->string('mega_kannadigas_group_a')->nullable();
            $table->string('mega_others_group_a')->nullable();
            $table->string('mega_kannadigas_group_b')->nullable();
            $table->string('mega_others_group_b')->nullable();
            $table->string('mega_kannadigas_group_c')->nullable();
            $table->string('mega_others_group_c')->nullable();
            $table->string('mega_kannadigas_group_d')->nullable();
            $table->string('mega_others_group_d')->nullable();

            $table->text('ultramega_address')->nullable();
            $table->string('ultramega_doc')->nullable();
            $table->string('ultramega_kannadigas_group_a')->nullable();
            $table->string('ultramega_others_group_a')->nullable();
            $table->string('ultramega_kannadigas_group_b')->nullable();
            $table->string('ultramega_others_group_b')->nullable();
            $table->string('ultramega_kannadigas_group_c')->nullable();
            $table->string('ultramega_others_group_c')->nullable();
            $table->string('ultramega_kannadigas_group_d')->nullable();
            $table->string('ultramega_others_group_d')->nullable();

            $table->text('supermega_address')->nullable();
            $table->string('supermega_doc')->nullable();
            $table->string('supermega_kannadigas_group_a')->nullable();
            $table->string('supermega_others_group_a')->nullable();
            $table->string('supermega_kannadigas_group_b')->nullable();
            $table->string('supermega_others_group_b')->nullable();
            $table->string('supermega_kannadigas_group_c')->nullable();
            $table->string('supermega_others_group_c')->nullable();
            $table->string('supermega_kannadigas_group_d')->nullable();
            $table->string('supermega_others_group_d')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('google_forms');
    }
};
