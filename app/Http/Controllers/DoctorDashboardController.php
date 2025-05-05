<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\AppointmentRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DoctorDashboardController extends Controller
{
    public function index()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $today = Carbon::today();

        // Today's consultations
        $consultationsToday = AppointmentRequest::where('doctor_id', $doctor->id)
            ->whereDate('date_appointment', $today)
            ->count();

        // Pending requests
        $pendingRequests = AppointmentRequest::where('doctor_id', $doctor->id)
            ->where('status', 'pending')
            ->count();

        // Total consultations
        $totalConsultations = AppointmentRequest::where('doctor_id', $doctor->id)
            ->where('status', 'confirmed')
            ->count();

        // Total unique patients
        $totalPatients = AppointmentRequest::where('doctor_id', $doctor->id)
            ->distinct('patient_id')
            ->count('patient_id');

        // Today's appointments with patient details
        $todayAppointments = AppointmentRequest::where('doctor_id', $doctor->id)
            ->whereDate('date_appointment', $today)
            ->with('patientUser')
            ->orderBy('time_appointment', 'asc')
            ->get();

        $malePatients = User::whereHas('appointmentRequests', function($query) use ($doctor) {
            $query->where('doctor_id', $doctor->id);
        })->whereHas('patient', function($query) {
            $query->where('gender', 'male');
        })->count();

        $femalePatients = User::whereHas('appointmentRequests', function($query) use ($doctor) {
            $query->where('doctor_id', $doctor->id);
        })->whereHas('patient', function($query) {
            $query->where('gender', 'female');
        })->count();

        $totalGender = $malePatients + $femalePatients;
        $malePercentage = $totalGender > 0 ? round(($malePatients / $totalGender) * 100) : 0;
        $femalePercentage = $totalGender > 0 ? round(($femalePatients / $totalGender) * 100) : 0;

        return view('doctor.dashboard', compact(
            'doctor',
            'consultationsToday',
            'pendingRequests',
            'totalConsultations',
            'totalPatients',
            'todayAppointments',
            'malePercentage',
            'femalePercentage'
        ));
    }

    public function showProfile()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        return view('doctor.profile', compact('doctor'));
    }
    public function showSettings()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        return view('doctor.settings', compact('doctor'));
    }
    public function showAppointments()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        return view('doctor.appointments', compact('doctor'));
    }

    public function showRequests()
    {
        $requests = AppointmentRequest::where('doctor_id', Auth::user()->doctor->id)
                                    ->where('status', 'pending')
                                    ->with('patientUser')
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return view('doctor.requests', compact('requests'));
    }
}
