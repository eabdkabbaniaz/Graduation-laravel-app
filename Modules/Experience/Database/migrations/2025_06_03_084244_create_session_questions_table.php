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
        Schema::create('session_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->enum('question_mode', ['fixed', 'dynamic']);
            $table->double('questions_mark')->default(0);
            $table->foreignId('session_id')->constrained('sessions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_questions');
    }
};
