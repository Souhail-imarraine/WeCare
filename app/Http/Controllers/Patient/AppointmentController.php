<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\AppointmentRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController
{
    public function store(Request $request, Doctor $doctor)
    {
        // dd($request->all());
        $validated = $request->validate([
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|date_format:H:i',
            'appointment_type' => 'required|in:in_person',
        ], [
            'appointment_date.required' => 'Please select an appointment date.',
            'appointment_date.date' => 'Please select a valid date.',
            'appointment_date.after_or_equal' => 'Appointment date must be today or later.',
            'appointment_time.required' => 'Please select an appointment time.',
            'appointment_time.date_format' => 'Please select a valid time slot.',
            'appointment_type.required' => 'Please select an appointment type.',
            'appointment_type.in' => 'Please select a valid appointment type.',
        ]);

        try {
            $isBooked = AppointmentRequest::where('doctor_id', $doctor->id)
                ->where('date_appointment', $validated['appointment_date'])
                ->where('time_appointment', $validated['appointment_time'] . ':00')
                ->where('status', '!=', 'cancelled')
                ->exists();

            if ($isBooked) {
                return redirect()->back()->with('error', 'This time slot is already booked. Please select another time.');
            }

            $appointment = AppointmentRequest::create([
                'patient_id' => Auth::id(),
                'doctor_id' => $doctor->id,
                'status' => 'pending',
                'date_appointment' => $validated['appointment_date'],
                'time_appointment' => $validated['appointment_time'] . ':00',
                'consult_duration' => 30,
                'appointment_type' => $validated['appointment_type'] == 'in_person' ? 'Person_Visit' : 'Online_Consultation',
            ]);

            return redirect()->back()->with('success', 'Your appointment request has been sent. We will notify you once the doctor confirms the appointment.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error booking your appointment. Please try again.');
        }
    }

    public function checkAvailableSlots(Request $request, Doctor $doctor)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
        ]);

        $date = date('Y-m-d', strtotime($request->date));

        $bookedSlots = AppointmentRequest::where('doctor_id', $doctor->id)
            ->where('date_appointment', $date)
            ->where('status', '!=', 'cancelled')
            ->pluck('time_appointment')
            ->map(function($time) {
                return date('H:i', strtotime($time));
            })
            ->toArray();

        return response()->json([
            'bookedSlots' => $bookedSlots,
            'selectedDate' => $date
        ]);
    }
}
