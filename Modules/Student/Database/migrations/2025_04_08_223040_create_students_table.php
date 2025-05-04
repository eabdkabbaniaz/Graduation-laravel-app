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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
           $table->foreignId('category_id')->constrained('Categories')->onDelete('cascade');
           $table->foreignId(column: 'user_id')->constrained('users')->onDelete('cascade');
           $table->float('assessment_score')->default(0);
           $table->float('exam_score')->default(0);
           $table->float('attendance_average')->default(0);
           $table->float('final_grade')->default(0);
           $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
