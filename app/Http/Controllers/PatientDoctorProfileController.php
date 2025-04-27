<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientDoctorProfileController extends Controller
{
    /**
     * Display the doctor's profile.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        try {
            $doctor = Doctor::with('user')->findOrFail($id);
            $canBookAppointment = auth::check() && auth::user()->role === 'patient';
            return view('patient.doctor-profile', compact('doctor', 'canBookAppointment'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('welcome')
                ->with('error', 'Doctor profile not found.');
        }
    }
}
