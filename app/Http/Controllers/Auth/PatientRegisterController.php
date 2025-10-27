<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PatientRegisterController 
{
    public function showRegistrationForm()
    {
        return view('auth.patient_register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|in:male,female',
            'height' => 'nullable|numeric|min:0|max:250',
            'weight' => 'nullable|numeric|min:0|max:300',
            'birthday' => 'required|date|before:today',
            'blood_type' => 'nullable|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-,other,unknown',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'first_name.required' => 'Please enter your first name.',
            'last_name.required' => 'Please enter your last name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'phone_number.required' => 'Please enter your phone number.',
            'gender.required' => 'Please select your gender.',
            'birthday.required' => 'Please enter your date of birth.',
            'birthday.before' => 'Birthday must be a date before today.',
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
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'patient'
            ]);

            Patient::create([
                'user_id' => $user->id,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'height' => $request->height ?: null,
                'weight' => $request->weight ?: null,
                'date_of_birth' => $request->birthday,
                'blood_type' => $request->blood_type ?: 'unknown'
            ]);

            DB::commit();
            Auth::login($user);

            return redirect()->route('patient.dashboard')->with('success', 'Registration successful! Welcome to WeCare.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Registration failed. Please try again.'])->withInput();
        }
    }
}
