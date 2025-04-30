<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DoctorRequestsController extends Controller
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
            DB::beginTransaction();

            $doctor->update(['status' => 'approved']);
            $doctor->user->update(['status' => 'active']);

            DB::commit();

            return redirect()->route('admin.doctor.requests')
                ->with('success', 'Doctor request approved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.doctor.requests')
                ->with('error', 'Failed to approve doctor request. Please try again.');
        }
    }

    public function reject(Doctor $doctor)
    {
        try {
            DB::beginTransaction();

            $doctor->update(['status' => 'rejected']);
            $doctor->user->update(['status' => 'inactive']);

            DB::commit();

            return redirect()->route('admin.doctor.requests')
                ->with('success', 'Doctor request rejected successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.doctor.requests')
                ->with('error', 'Failed to reject doctor request. Please try again.');
        }
    }
}
