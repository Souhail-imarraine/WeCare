<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentRequest extends Model
{
    use HasFactory;

    protected $table = 'appointment_requests';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'status',
        'reason',
        'consult_duration',
        'date_appointment',
        'time_appointment',
        'appointment_type',
    ];

    protected $casts = [
        'date_appointment' => 'date',
        'time_appointment' => 'datetime',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
