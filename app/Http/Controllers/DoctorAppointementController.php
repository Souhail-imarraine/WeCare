<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DoctorAppointementController
{
    public function index(Request $request)
    {
        $doctor = Auth::user();
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();

        $dateFilter = $request->get('filter', 'all');
        $statusFilter = $request->get('status', 'all');

        $query = AppointmentRequest::where('doctor_id', $doctor->id);

        switch ($dateFilter) {
            case 'today':
                $query->whereDate('date_appointment', $today);
                break;
            case 'tomorrow':
                $query->whereDate('date_appointment', $tomorrow);
                break;
        }

        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('patientUser', function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $todayAppointments = AppointmentRequest::where('doctor_id', $doctor->id)
            ->whereDate('date_appointment', $today)
            ->count();

        $upcomingAppointments = AppointmentRequest::where('doctor_id', $doctor->id)
            ->whereDate('date_appointment', '>', $today)
            ->count();

        $confirmedAppointments = AppointmentRequest::where('doctor_id', $doctor->id)
            ->where('status', 'confirmed')
            ->count();

        $pendingAppointments = AppointmentRequest::where('doctor_id', $doctor->id)
            ->where('status', 'pending')
            ->count();

        $cancelledAppointments = AppointmentRequest::where('doctor_id', $doctor->id)
            ->where('status', 'cancelled')
            ->count();

        $completedAppointments = AppointmentRequest::where('doctor_id', $doctor->id)
            ->where('status', 'completed')
            ->count();

        $appointments = $query->with(['patientUser'])
            ->orderBy('date_appointment', 'desc')
            ->orderBy('time_appointment', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('doctor.appointments', compact(
            'todayAppointments',
            'upcomingAppointments',
            'confirmedAppointments',
            'pendingAppointments',
            'cancelledAppointments',
            'completedAppointments',
            'appointments',
            'dateFilter',
            'statusFilter'
        ));
    }

    public function complete($id)
    {
        $appointment = AppointmentRequest::where('doctor_id', Auth::user()->id)
            ->findOrFail($id);

        if ($appointment->status !== 'confirmed') {
            return redirect()->back()->with('error', 'Only confirmed appointments can be marked as completed.');
        }

        $appointment->status = 'completed';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment marked as completed successfully.');
    }

    public function destroy($id){
        $appointments = AppointmentRequest::find($id);
        if ($appointments && $appointments->status == 'cancelled') {
            $appointments->delete();
            return redirect()->back()->with('success', 'Appointment deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Appointment not found.');
        }
    }
}
