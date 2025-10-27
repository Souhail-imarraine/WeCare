<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class SpecialtyController
{
    public function generalPractitioner()
    {
        $doctors = Doctor::where('status', 'approved')
                        ->with('user')
                        ->get();

        return view('specialties.general-practitioner', compact('doctors'));
    }

    public function telehealth()
    {
        $doctors = Doctor::where('specialty', 'GP Telehealth')
                        ->where('status', 'approved')
                        ->with('user')
                        ->get();

        return view('specialties.telehealth', compact('doctors'));
    }

    public function physiotherapist()
    {
        $doctors = Doctor::where('specialty', 'Physiotherapist')
                        ->where('status', 'approved')
                        ->with('user')
                        ->get();

        return view('specialties.physiotherapist', compact('doctors'));
    }

    public function dentist()
    {
        $doctors = Doctor::where('specialty', 'Dentist')
                        ->where('status', 'approved')
                        ->with('user')
                        ->get();

        return view('specialties.dentist', compact('doctors'));
    }

    public function psychologist()
    {
        $doctors = Doctor::where('specialty', 'Psychologist')
                        ->where('status', 'approved')
                        ->with('user')
                        ->get();

        return view('specialties.psychologist', compact('doctors'));
    }

    public function optometrist()
    {
        $doctors = Doctor::where('specialty', 'Optometrist')
                        ->where('status', 'approved')
                        ->with('user')
                        ->get();

        return view('specialties.optometrist', compact('doctors'));
    }

    public function chiropractor()
    {
        $doctors = Doctor::where('specialty', 'Chiropractor')
                        ->where('status', 'approved')
                        ->with('user')
                        ->get();

        return view('specialties.chiropractor', compact('doctors'));
    }

    public function podiatrist()
    {
        $doctors = Doctor::where('specialty', 'Podiatrist')
                        ->where('status', 'approved')
                        ->with('user')
                        ->get();

        return view('specialties.podiatrist', compact('doctors'));
    }
}
