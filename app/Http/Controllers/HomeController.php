<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $doctors = Doctor::with('user')
            ->where('status', 'approved')
            ->select('id', 'user_id', 'specialty', 'city', 'profile_image', 'consultation_price')
            ->take(6)
            ->get();

        return view('welcome', compact('doctors'));
    }
}
