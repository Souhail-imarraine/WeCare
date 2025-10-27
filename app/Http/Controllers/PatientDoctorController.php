<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\AppointmentRequest;
use Illuminate\Support\Facades\Auth;

class PatientDoctorController
{
    public function index(Request $request)
    {
        $query = Doctor::query()->where('status', 'approved');

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
}
