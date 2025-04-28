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
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->enum('status', ['pending', 'cancelled', 'confirmed'])->default('pending');
            $table->text('reason')->nullable();
            $table->integer('consult_duration')->default(30);
            $table->date('date_appointment');
            $table->time('time_appointment')->format('H:i');
            $table->enum('appointment_type', ['Person_Visit', 'Online_Consultation'])->default('Person_Visit');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('appointment_requests');
    }
};
