<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\AppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class My_appointments extends Controller
{
    public function index()
    {
        $appointments = AppointmentRequest::with(['doctor.user'])
            ->where('patient_id', Auth::id())
            ->orderBy('date_appointment', 'desc')
            ->get();

        return view('patient.my-appointments', compact('appointments'));
    }

    public function showRescheduleForm(AppointmentRequest $appointment)
    {
        // Check if the appointment belongs to the authenticated user
        if ($appointment->patient_id !== Auth::id()) {
            return redirect()->route('patient.appointments')
                           ->with('error', 'You are not authorized to reschedule this appointment.');
        }

        // Check if the appointment is in the past
        if (Carbon::parse($appointment->date_appointment)->isPast()) {
            return redirect()->route('patient.appointments')
                           ->with('error', 'Cannot reschedule past appointments.');
        }

        // Generate available time slots (you may want to customize this based on doctor's schedule)
        $availableSlots = $this->generateTimeSlots();

        return view('patient.appointments.reschedule', compact('appointment', 'availableSlots'));
    }

    public function reschedule(Request $request, AppointmentRequest $appointment)
    {
        // Validate the request
        $request->validate([
            'date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i',
            'reason' => 'nullable|string|max:500',
        ]);

        // Check if the appointment belongs to the authenticated user
        if ($appointment->patient_id !== Auth::id()) {
            return redirect()->route('patient.appointments')
                           ->with('error', 'You are not authorized to reschedule this appointment.');
        }

        // Check if the appointment is in the past
        if (Carbon::parse($appointment->date_appointment)->isPast()) {
            return redirect()->route('patient.appointments')
                           ->with('error', 'Cannot reschedule past appointments.');
        }

        try {
            // Update the appointment
            $appointment->update([
                'date_appointment' => $request->date,
                'time_appointment' => $request->time,
                'reschedule_reason' => $request->reason,
                'updated_at' => now(),
            ]);

            return redirect()->route('patient.appointments')
                           ->with('success', 'Appointment rescheduled successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to reschedule appointment. Please try again.')
                           ->withInput();
        }
    }

    public function cancelAppointment(AppointmentRequest $appointment)
    {
        // Check if the appointment belongs to the authenticated user
        if ($appointment->patient_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to cancel this appointment.'
            ], 403);
        }

        // Check if the appointment is in the past
        if (Carbon::parse($appointment->date_appointment)->isPast()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot cancel past appointments.'
            ], 400);
        }

        try {
            // Update the appointment status to cancelled
            $appointment->update([
                'status' => 'cancelled',
                'updated_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Appointment cancelled successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to cancel appointment. Please try again.'
            ], 500);
        }
    }

    public function deleteAppointment(AppointmentRequest $appointment)
    {
        // Check if the appointment belongs to the authenticated user
        if ($appointment->patient_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this appointment.');
        }

        try {
            // Delete the appointment
            $appointment->delete();

            return redirect()->route('patient.appointments')
                           ->with('success', 'Appointment deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to delete appointment. Please try again.');
        }
    }

    private function generateTimeSlots()
    {
        $slots = [];
        $start = Carbon::createFromTime(9, 0);
        $end = Carbon::createFromTime(17, 0);

        while ($start <= $end) {
            $slots[] = $start->format('H:i');
            $start->addMinutes(30);
        }

        return $slots;
    }
}
