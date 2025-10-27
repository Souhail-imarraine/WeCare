<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\AppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class My_appointments
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
        if ($appointment->patient_id !== Auth::id()) {
            return redirect()->route('patient.appointments')
                           ->with('error', 'You are not authorized to reschedule this appointment.');
        }

        if (Carbon::parse($appointment->date_appointment)->isPast()) {
            return redirect()->route('patient.appointments')
                           ->with('error', 'Cannot reschedule past appointments.');
        }

        $availableSlots = $this->generateTimeSlots();
        return view('patient.appointments.reschedule', compact('appointment', 'availableSlots'));
    }

    public function cancelAppointment(AppointmentRequest $appointment)
    {
        if ($appointment->patient_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to cancel this appointment.');
        }

        if (Carbon::parse($appointment->date_appointment)->isPast()) {
            return redirect()->back()->with('error', 'Cannot cancel past appointments.');
        }

        try {
            $appointment->update([
                'status' => 'cancelled',
                'updated_at' => now(),
            ]);

            return redirect()->route('patient.appointments')->with('success', 'Appointment cancelled successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to cancel appointment. Please try again.');
        }
    }

    public function deleteAppointment(AppointmentRequest $appointment)
    {
        if ($appointment->patient_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this appointment.');
        }

        try {
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
