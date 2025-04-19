<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientDoctorController extends Controller
{
    public function index()
    {
        $doctors = User::where('role', 'doctor')
            ->with('doctor') // Assuming you have a doctor relationship
            ->get();

        return view('patient.doctors', compact('doctors'));
    }
}
