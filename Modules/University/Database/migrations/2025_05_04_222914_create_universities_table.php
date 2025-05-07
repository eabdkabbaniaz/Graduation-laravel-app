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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();     
            $table->string('password');     
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country');
            $table->text('description')->nullable();
            $table->boolean('status')->default(true)->comment('1 is active and 0 non active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
