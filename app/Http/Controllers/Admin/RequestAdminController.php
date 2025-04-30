<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Mail\DoctorApprovalMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\DoctorRejectionMail;

class RequestAdminController extends Controller
{
    public function index()
    {
        $requests = Doctor::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.requestsAdmin', compact('requests'));
    }

    public function approve($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->status = 'approved';
            $doctor->save();

            Mail::to($doctor->user->email)->send(new DoctorApprovalMail($doctor));

            return redirect()->back()->with('success', 'Doctor approved successfully and notification email sent.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to approve doctor. Please try again.');
        }
    }

    public function reject($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->status = 'rejected';
            $doctor->save();

            Mail::to($doctor->user->email)->send(new DoctorRejectionMail($doctor));

            return redirect()->back()->with('success', 'Doctor rejected successfully and notification email sent.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to reject doctor. Please try again.');
        }
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.requestsAdmin', compact('doctor'));
    }
}
