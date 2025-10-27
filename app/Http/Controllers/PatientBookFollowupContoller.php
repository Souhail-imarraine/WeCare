<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\AppointmentRequest;
use Carbon\Carbon;

class PatientBookFollowupContoller
{
    public function bookFollowUp(Doctor $doctor)
    {
        $lastAppointment = AppointmentRequest::where('patient_id', Auth::id())
            ->where('doctor_id', $doctor->id)
            ->where('status', 'confirmed')
            ->latest()
            ->first();

        if (!$lastAppointment) {
            return redirect()->route('patient.appointments')
                ->with('error', 'No previous confirmed appointment found with this doctor.');
        }

        $lastAppointmentInfo = [
            'date' => Carbon::parse($lastAppointment->date_appointment)->format('l, F j, Y'),
            'time' => Carbon::parse($lastAppointment->time_appointment)->format('g:i A'),
            'duration' => $lastAppointment->consult_duration,
            'status' => $lastAppointment->status
        ];

        return view('patient.book-followup', compact('doctor', 'lastAppointmentInfo'));
    }
}
