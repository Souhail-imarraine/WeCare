<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DoctorRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register_doctor');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'specialty' => 'required|string|max:255',
            'consultation_price' => 'required|numeric|min:0',
            'years_experience' => 'required|numeric|min:0|max:50',
            'license_number' => 'required|string|unique:doctors',
            'city' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'first_name.required' => 'Please enter your first name.',
            'first_name.max' => 'First name cannot be longer than 255 characters.',
            'last_name.required' => 'Please enter your last name.',
            'last_name.max' => 'Last name cannot be longer than 255 characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'specialty.required' => 'Please select your specialty.',
            'consultation_price.required' => 'Please enter your consultation price.',
            'consultation_price.numeric' => 'Consultation price must be a number.',
            'consultation_price.min' => 'Consultation price cannot be negative.',
            'years_experience.required' => 'Please enter your years of experience.',
            'years_experience.numeric' => 'Years of experience must be a number.',
            'years_experience.min' => 'Years of experience cannot be negative.',
            'years_experience.max' => 'Years of experience cannot be more than 50.',
            'license_number.required' => 'Please enter your license number.',
            'license_number.unique' => 'This license number is already registered.',
            'city.required' => 'Please enter your city.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

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
