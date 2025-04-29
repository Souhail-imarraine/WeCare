<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\AppointmentRequest;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalDoctors = Doctor::count();
        $totalPatients = Patient::count();
        $totalAppointments = AppointmentRequest::count();
        $pendingApprovals = Doctor::where('status', 'pending')->count();

        $recentDoctors = Doctor::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Get recent appointments with doctor and patient information
        // $recentAppointments = AppointmentRequest::with(['doctor.user', 'patient.user'])
        //     ->latest()
        //     ->take(5)
        //     ->get()
        //     ->map(function ($appointment) {
        //         return [
        //             'patient_name' => $appointment->patient->user->first_name . ' ' . $appointment->patient->user->last_name,
        //             'doctor_name' => $appointment->doctor->user->first_name . ' ' . $appointment->doctor->user->last_name,
        //             'date' => $appointment->appointment_date,
        //             'time' => $appointment->appointment_time,
        //             'status' => $appointment->status
        //         ];
        //     });

        return view('admin.dashboardAdmin');
    }



    public function doctors()
    {
        $doctors = Doctor::with('user')
            ->latest()
            ->paginate(10);
        return view('admin.doctors', compact('doctors'));
    }

        public function patients()
    {
        $patients = Patient::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.patientAdmin', compact('patients'));
    }


    public function appointments()
    {
        $appointments = AppointmentRequest::with(['doctor.user', 'patient.user'])
            ->latest()
            ->paginate(10);

        return view('admin.appointments', compact('appointments'));
    }
}
