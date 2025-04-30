<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\Doctor;
// use App\Models\Patient;
use App\Models\AppointmentRequest;
use App\Models\User;
use App\Models\Doctor;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPatients = User::where('role', 'patient')->count();
        $totalDoctors = User::where('role', 'doctor')->count();
        $totalAppointments = AppointmentRequest::count();
        // $totalRevenue = AppointmentRequest::where('status', 'completed')->sum('price');

        // Get appointment status counts
        $completedAppointments = AppointmentRequest::where('status', 'completed')->count();
        $pendingAppointments = AppointmentRequest::where('status', 'pending')->count();
        $cancelledAppointments = AppointmentRequest::where('status', 'cancelled')->count();

        // Get doctor status counts
        $rejectedDoctors = Doctor::where('status', 'rejected')->count();



        // Get recent doctors with their specialties
        $recentDoctors = User::where('role', 'doctor')
            ->with('doctor')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($user) {
                return [
                    'name' => $user->first_name . ' ' . $user->last_name,
                    'specialty' => $user->doctor->specialty,
                    'status' => $user->doctor->status,
                    'profile_image' => $user->profile_image
                ];
            });

        $recentAppointments = AppointmentRequest::with(['patient', 'doctor.user'])
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($appointment) {
                return [
                    'id' => $appointment->id,
                    'patient_name' => $appointment->patient->first_name . ' ' . $appointment->patient->last_name,
                    'doctor_name' => 'Dr. ' . $appointment->doctor->user->first_name . ' ' . $appointment->doctor->user->last_name,
                    'date' => $appointment->appointment_date,
                    'time' => $appointment->appointment_time,
                    'status' => $appointment->status,
                    'price' => $appointment->price
                ];
            });

        return view('admin.dashboardAdmin', compact(
            'totalPatients',
            'totalDoctors',
            'totalAppointments',
            'completedAppointments',
            'pendingAppointments',
            'cancelledAppointments',
            'recentDoctors',
            'rejectedDoctors',
        ));
    }


    public function appointments()
    {
        $appointments = AppointmentRequest::with(['doctor.user', 'patient.user'])
            ->latest()
            ->paginate(10);

        return view('admin.appointments', compact('appointments'));
    }
}
