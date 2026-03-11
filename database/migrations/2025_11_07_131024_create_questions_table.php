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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('department')->nullable();
            $table->string('number')->nullable();
            $table->string('asked_by')->nullable();
            $table->string('answered_by')->nullable();
            $table->date('date')->nullable();
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->text('keywords')->nullable();
            $table->boolean('status')->default(1);
            $table->fullText(
                        ['number', 'question', 'keywords'],
                        'questions_fulltext_index'
                    );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
