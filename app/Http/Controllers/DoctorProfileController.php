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
        // Handle profile photo deletion
        if ($request->input('action') === 'delete_photo') {
            $doctor = Doctor::where('user_id', Auth::id())->first();

            // Delete the physical file if it exists and is not the default image
            if ($doctor->profile_image && $doctor->profile_image !== 'doctor_profile/default-avatar.png') {
                $imagePath = public_path($doctor->profile_image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Reset the profile_image field to null in database
            $doctor->update([
                'profile_image' => null
            ]);

            return redirect()->back()->with('success', 'Profile photo deleted successfully');
        }

        // Check if this is only a profile photo update
        if ($request->hasFile('profile_photo') && count($request->all()) === 3) {
            $request->validate([
                'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $doctor = Doctor::where('user_id', Auth::id())->first();

            // Handle the image upload
            if ($request->hasFile('profile_photo')) {
                $image = $request->file('profile_photo');
                $filename = time() . '.' . $image->getClientOriginalExtension();

                // Delete old image if it exists and is not the default image
                if ($doctor->profile_image && $doctor->profile_image !== 'doctor_profile/default-avatar.png') {
                    $oldImagePath = public_path($doctor->profile_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Store the new image
                $image->move(public_path('doctor_profile'), $filename);

                // Update the profile_image column in database
                $doctor->update([
                    'profile_image' => 'doctor_profile/' . $filename
                ]);

                return redirect()->back()->with('success', 'Profile photo updated successfully');
            }
        }

        $user = Auth::user();
        $doctor = Doctor::where('user_id', $user->id)->first();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'bio' => 'nullable|string|max:1000',
            'facebook_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
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

        // Update doctor information
        $doctorData = array_intersect_key($validated, array_flip([
            'phone_number', 'city', 'bio',
            'facebook_url', 'linkedin_url', 'instagram_url'
        ]));

        Doctor::where('id', $doctor->id)->update($doctorData);

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
