<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;

class DoctorsAdminController extends Controller
{
    public function doctors(Request $request)
    {
        $query = Doctor::with('user');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            })->orWhere('phone_number', 'like', "%{$search}%");
        }

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        $doctors = $query->latest()->paginate(10)->withQueryString();
        return view('admin.doctors', compact('doctors'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $doctor->user_id,
            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        try {
            // Update user information
            $doctor->user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
            ]);

            // Update doctor information
            $doctor->update([
                'phone_number' => $request->phone_number,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.doctors')->with('success', 'Doctor information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.doctors')->with('error', 'Failed to update doctor information. Please try again.');
        }
    }
}
