<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.patient_register');
    }

    public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'required|in:male,female,other',
            'height' => 'required|integer|min:0|max:250',
            'weight' => 'required|integer|min:0|max:300',
            'birthday' => 'required|date|before:today',
            'blood_type' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-,other,unknown',
        ], [
            'height.required' => 'The height field is required. Please enter 0 if unknown.',
            'height.integer' => 'Height must be a number.',
            'height.min' => 'Height must be at least 0.',
            'height.max' => 'Height cannot be more than 250 cm.',
            'weight.required' => 'The weight field is required. Please enter 0 if unknown.',
            'weight.integer' => 'Weight must be a number.',
            'weight.min' => 'Weight must be at least 0.',
            'weight.max' => 'Weight cannot be more than 300 kg.',
            'birthday.required' => 'Please enter your date of birth.',
            'birthday.date' => 'Please enter a valid date.',
            'birthday.before' => 'Birthday must be before today.',
            'blood_type.required' => 'Please select your blood type.',
            'blood_type.in' => 'Please select a valid blood type.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'patient',
        ]);

        // Create the patient profile
        $patient = Patient::create([
            'user_id' => $user->id,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'birthday' => $request->birthday,
            'blood_type' => $request->blood_type,
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to dashboard
        // return "souhail success";
        return redirect()->route('patient.dashboard')->with('success', 'Registration successful!');
    }
}
