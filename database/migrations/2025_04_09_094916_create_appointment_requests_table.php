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
        Schema::create('appointment_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade'); // Assuming patients are in the 'users' table
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade'); // Assuming doctors are in the 'doctors' table
            // Request Details
            $table->string('status')->default('pending')->index(); // e.g., pending, accepted, rejected, cancelled
            $table->text('reason')->nullable();
            $table->unsignedInteger('consult_duration')->nullable(); // Duration in minutes
            $table->string('preferred_time_range')->nullable(); // e.g., morning, afternoon, end_of_week
            $table->string('appointment_type')->nullable()->default('online'); // e.g., online, in_person

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_requests');
    }
};
