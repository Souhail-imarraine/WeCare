<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientDashboardController 
{
    public function index()
    {
        return view('patient.dashboard');
    }
}
