<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\AppointmentRequest;
use Illuminate\Support\Facades\Auth;

class PatientDoctorController extends Controller
{
    public function index(Request $request)
    {
        $query = Doctor::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%");
            })
            ->orWhere('specialty', 'like', "%{$search}%")
            ->orWhere('city', 'like', "%{$search}%");
        }

        $doctors = $query->paginate(9);
        return view('patient.doctors', compact('doctors'));
    }

    // public function bookAppointment(Doctor $doctor)
    // {
    //     return view('patient.book-appointment', compact('doctor'));
    // }

    public function bookFollowUp(Doctor $doctor)
    {
        // Get the patient's last appointment with this doctor
        $lastAppointment = AppointmentRequest::where('patient_id', Auth::id())
            ->where('doctor_id', $doctor->id)
            ->where('status', 'confirmed')
            ->latest()
            ->first();

        if (!$lastAppointment) {
            return redirect()->route('patient.appointments')
                                ->with('error', 'No previous confirmed appointment found with this doctor.');
        }
        return view('patient.book-followup', compact('doctor', 'lastAppointment'));
    }
}
