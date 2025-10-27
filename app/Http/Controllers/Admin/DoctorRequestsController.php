<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DoctorRequestsController 
{
    public function index()
    {
        $pendingDoctors = Doctor::with('user')
            ->where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.doctorRequests', compact('pendingDoctors'));
    }

    public function approve(Doctor $doctor)
    {
        try {
            $doctor->update(['status' => 'approved']);
            $doctor->user->update(['status' => 'active']);

            return redirect()->route('admin.doctor.requests')
                ->with('success', 'Doctor request approved successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.doctor.requests')
                ->with('error', 'Failed to approve doctor request. Please try again.');
        }
    }

    public function reject(Doctor $doctor)
    {
        try {
            $doctor->update(['status' => 'rejected']);
            $doctor->user->update(['status' => 'inactive']);

            return redirect()->route('admin.doctor.requests')
                ->with('success', 'Doctor request rejected successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.doctor.requests')
                ->with('error', 'Failed to reject doctor request. Please try again.');
        }
    }
}
