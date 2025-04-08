<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.patient_register');
    }
}
