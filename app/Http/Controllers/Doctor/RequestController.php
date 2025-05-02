<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\AppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $doctor = Auth::user()->doctor;

        $requests = AppointmentRequest::with(['patient.user'])
            ->where('doctor_id', $doctor->id)
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('doctor.requests', compact('requests'));
    }

    public function accept($id)
    {
        $request = AppointmentRequest::with(['patient.user'])
            ->where('doctor_id', Auth::user()->doctor->id)
            ->findOrFail($id);

        if (!$request->patient || !$request->patient->user) {
            return redirect()->back()->with('error', 'Invalid appointment request.');
        }

        $request->status = 'confirmed';
        $request->save();

        return redirect()->back()->with('success', 'Appointment request accepted successfully.');
    }

    public function decline($id)
    {
        $request = AppointmentRequest::with(['patient.user'])
            ->where('doctor_id', Auth::user()->doctor->id)
            ->findOrFail($id);

        if (!$request->patient || !$request->patient->user) {
            return redirect()->back()->with('error', 'Invalid appointment request.');
        }

        $request->status = 'cancelled';
        $request->save();

        return redirect()->back()->with('success', 'Appointment request cancelled successfully.');
    }
}
