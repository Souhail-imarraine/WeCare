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
        'preferred_time_range',
        'appointment_type',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
