<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\AppointmentRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function store(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|date_format:H:i',
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

            // Create the appointment request
            $appointment = AppointmentRequest::create([
                'patient_id' => Auth::id(),
                'doctor_id' => $doctor->id,
                'status' => 'pending',
                'date_appointment' => $validated['appointment_date'],
                'time_appointment' => $validated['appointment_time'] . ':00',
                'consult_duration' => 30,
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
