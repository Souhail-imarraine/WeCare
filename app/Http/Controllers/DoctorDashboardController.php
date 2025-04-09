<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\AppointmentRequest;
use Illuminate\Support\Facades\Auth;

class DoctorDashboardController extends Controller
{
    public function __construct()
    {
        // Middleware applied in routes/web.php now
        // $this->middleware(['auth', 'role:doctor']);
    }

    public function index()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        return view('doctor.dashboard', compact('doctor'));
    }

    // New method to show appointment requests
    public function showRequests()
    {
        // Fetch pending appointment requests for the logged-in doctor
        // This is just an example query, adjust based on your relationships and logic
        $requests = AppointmentRequest::where('doctor_id', Auth::user()->doctor->id) // Assuming a doctor relationship on User model
                                    ->where('status', 'pending') // Example status
                                    ->with('patient.user')
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return view('doctor.requests', compact('requests'));
    }

    // You would add methods here to accept/reject requests
    // public function acceptRequest(Request $request, AppointmentRequest $appointmentRequest) { ... }
    // public function rejectRequest(Request $request, AppointmentRequest $appointmentRequest) { ... }
}
