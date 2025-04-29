<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdminPatients extends Controller
{
    public function index()
    {
        $patients = Patient::with('user')->paginate(10);
        return view('admin.patientAdmin', compact('patients'));
    }

    public function show(Patient $patient)
    {
        if (request()->ajax()) {
            return response()->json($patient->load('user'));
        }

        return view('admin.patients.show', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $patient->user_id,
            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:active,blocked,pending',
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

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Patient information updated successfully']);
        }

        return redirect()->back()->with('success', 'Patient information updated successfully');
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
