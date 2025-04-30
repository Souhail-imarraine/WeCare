<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

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
        $doctor = Doctor::find($id);
        $doctor->status = 'approved';
        $doctor->save();
        return redirect()->back()->with('success', 'Doctor approved successfully');
    }

    public function reject($id)
    {
        $doctor = Doctor::find($id);
        $doctor->status = 'rejected';
        $doctor->save();
        return redirect()->back()->with('success', 'Doctor rejected successfully');
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.requestsAdmin', compact('doctor'));
    }
}
