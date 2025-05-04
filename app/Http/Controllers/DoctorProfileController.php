<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorProfileController extends Controller
{
    public function settings()
    {
        $user = Auth::user();
        $doctor = Doctor::where('user_id', $user->id)->with('user')->first();

        return view('doctor.settings', compact('doctor'));
    }

    public function updateProfile(Request $request)
    {
        // Check if this is a general  update
        if ($request->has(['first_name', 'last_name', 'email'])) {
            $user = Auth::user();
            $doctor = Doctor::where('user_id', $user->id)->first();

            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'phone_number' => 'nullable|string|max:20',
                'city' => 'nullable|string|max:100',
                'bio' => 'nullable|string|max:1000',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $validated = $validator->validated();

            User::where('id', $user->id)->update([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
            ]);

            Doctor::where('id', $doctor->id)->update([
                'phone_number' => $validated['phone_number'],
                'city' => $validated['city'],
                'bio' => $validated['bio'],
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully');
        }

        if ($request->input('action') === 'delete_photo') {
            $doctor = Doctor::where('user_id', Auth::id())->first();

            if ($doctor->profile_image && $doctor->profile_image !== 'doctor_profile/default-avatar.png') {
                $imagePath = public_path($doctor->profile_image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $doctor->update([
                'profile_image' => null
            ]);

            return redirect()->back()->with('success', 'Profile photo deleted successfully');
        }

        if ($request->has(['facebook', 'linkedin', 'instagram'])) {
            $doctor = Doctor::where('user_id', Auth::id())->first();

            $validated = $request->validate([
                'facebook' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
            ]);

            $doctor->update([
                'facebook' => $validated['facebook'] ?: null,
                'linkedin' => $validated['linkedin'] ?: null,
                'instagram' => $validated['instagram'] ?: null,
            ]);

            return redirect()->back()->with('success', 'Social media links updated successfully');
        }

        if ($request->hasFile('profile_photo') && count($request->all()) === 3) {
            $request->validate([
                'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $doctor = Doctor::where('user_id', Auth::id())->first();

            if ($request->hasFile('profile_photo')) {
                $image = $request->file('profile_photo');
                $filename = time() . '.' . $image->getClientOriginalExtension();

                if ($doctor->profile_image && $doctor->profile_image !== 'doctor_profile/default-avatar.png') {
                    $oldImagePath = public_path($doctor->profile_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $image->move(public_path('doctor_profile'), $filename);

                $doctor->update([
                    'profile_image' => 'doctor_profile/' . $filename
                ]);

                return redirect()->back()->with('success', 'Profile photo updated successfully');
            }
        }

        return redirect()->back()->with('error', 'Invalid request');
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

        // Update user password *********8
        User::where('id', Auth::id())->update([
            'password' => Hash::make($validated['new_password'])
        ]);

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
