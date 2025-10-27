<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PatientProfileController
{
    public function show()
    {
        $patient = Auth::user()->patient;
        return view('patient.profile', compact('patient'));
    }

    public function settings()
    {
        $user = Auth::user();
        $patient = Patient::where('user_id', $user->id)->with('user')->first();

        return view('patient.settings', compact('patient'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $patient = Patient::where('user_id', $user->id)->first();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
            'birthday' => 'required|date|before:today',
            'blood_type' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'height' => 'required|numeric|min:1|max:300',
            'weight' => 'required|numeric|min:1|max:500',
        ], [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already in use',
            'birthday.required' => 'Date of birth is required',
            'birthday.date' => 'Please enter a valid date',
            'birthday.before' => 'Birthday must be a date before today',
            'blood_type.required' => 'Blood type is required',
            'height.required' => 'Height is required',
            'height.numeric' => 'Height must be a number',
            'height.min' => 'Height must be at least 1 cm',
            'height.max' => 'Height cannot exceed 300 cm',
            'weight.required' => 'Weight is required',
            'weight.numeric' => 'Weight must be a number',
            'weight.min' => 'Weight must be at least 1 kg',
            'weight.max' => 'Weight cannot exceed 500 kg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        // Update user information
        User::where('id', $user->id)->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
        ]);

        // Update patient information
        Patient::where('id', $patient->id)->update([
            'phone_number' => $validated['phone_number'],
            'birthday' => $validated['birthday'],
            'blood_type' => $validated['blood_type'],
            'height' => $validated['height'],
            'weight' => $validated['weight'],
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required'
        ], [
            'current_password.required' => 'Please enter your current password',
            'new_password.required' => 'Please enter a new password',
            'new_password.min' => 'New password must be at least 8 characters',
            'new_password.confirmed' => 'Password confirmation does not match',
            'new_password_confirmation.required' => 'Please confirm your new password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        // Update user password
        User::where('id', Auth::id())->update([
            'password' => Hash::make($validated['new_password'])
        ]);

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
