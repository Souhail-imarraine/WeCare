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
        $totalDoctors = Doctor::where('status', 'approved')->count();
        $totalPatients = Patient::count();
        $totalAppointments = AppointmentRequest::count();
        $pendingApprovals = Doctor::where('status', 'pending')->count();
        return view('admin.dashboardAdmin', compact('totalDoctors', 'totalPatients', 'totalAppointments', 'pendingApprovals'));
    }


    public function appointments()
    {
        $appointments = AppointmentRequest::with(['doctor.user', 'patient.user'])
            ->latest()
            ->paginate(10);

        return view('admin.appointments', compact('appointments'));
    }
}
