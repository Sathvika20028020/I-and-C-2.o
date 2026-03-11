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
        Schema::create('postings', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->index();
            $table->string('post_held')->nullable();
            $table->string('group')->nullable();
            $table->string('designation')->nullable();
            $table->string('organization')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('district')->nullable();
            $table->integer('taluk_id')->nullable();
            $table->string('taluk')->nullable();
            $table->string('posting')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('pay_scale')->nullable();
            $table->date('increment_date')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postings');
    }
};
