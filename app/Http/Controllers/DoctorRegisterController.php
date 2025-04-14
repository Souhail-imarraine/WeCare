<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register_doctor');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'specialty' => 'required|string|max:255',
            'consultation_price' => 'required|numeric|min:0',
            'years_experience' => 'required|numeric|min:0',
            'license_number' => 'required|string|unique:doctors',
            'city' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::beginTransaction();

        try {
            // Create user record
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'doctor'
            ]);

            // Create doctor record
            Doctor::create([
                'user_id' => $user->id,
                'specialty' => $request->specialty,
                'consultation_price' => $request->consultation_price,
                'years_experience' => $request->years_experience,
                'license_number' => $request->license_number,
                'city' => $request->city,
                'is_verified' => false
            ]);

            DB::commit();
            Auth::login($user);

            return redirect()->route('doctor.dashboard')->with('success', 'Registration successful! Welcome to your dashboard.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Registration failed. Please try again.'])->withInput();
        }
    }
}
