<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdminPatients 
{
    public function patients()
    {
        $patients = Patient::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.patientAdmin', compact('patients'));
    }

    public function show(Patient $patient)
    {
        return view('admin.patientAdmin', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $patient->user_id,
                'phone_number' => 'required|string|max:20',
                'status' => 'required|in:active,desactive',
            ]);

            $patient->user->update([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
            ]);

            $patient->update([
                'phone_number' => $validated['phone_number'],
                'status' => $validated['status'],
            ]);
            return redirect()->route('admin.patients')->with('success', 'Patient information updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update patient information. Please try again.');
        }
    }

    public function destroy(Patient $patient)
    {
        try {
            $patient->user->delete();
            $patient->delete();

            return redirect()->route('admin.patients')->with('success', 'Patient deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete patient. Please try again.');
        }
    }

    public function block(Patient $patient)
    {
        $patient->update(['status' => 'blocked']);
        return response()->json(['success' => true, 'message' => 'Patient has been blocked']);
    }

    public function unblock(Patient $patient)
    {
        $patient->update(['status' => 'active']);
        return response()->json(['success' => true, 'message' => 'Patient has been unblocked']);
    }
}
