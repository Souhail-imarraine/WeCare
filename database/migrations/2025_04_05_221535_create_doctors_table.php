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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('specialty');
            $table->decimal('consultation_price', 10, 2);
            $table->integer('years_experience');
            $table->text('bio')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('license_number')->unique();
            $table->boolean('is_verified')->default(false);
            $table->json('available_days')->nullable();
            $table->json('available_hours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
