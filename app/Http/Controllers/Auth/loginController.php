<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:doctor,patient',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role !== $request->role) {
                Auth::logout();
                return redirect()->back()
                    ->with('error', 'Invalid role selected.')
                    ->withInput();
            }

            if ($user->role === 'doctor') {
                $doctor = $user->doctor;

                if ($doctor->status === 'pending') {
                    Auth::logout();
                    return redirect()->back()
                        ->with('error', 'Your account is still pending approval. Please wait for admin verification.')
                        ->withInput();
                } elseif ($doctor->status === 'rejected') {
                    Auth::logout();
                    return redirect()->back()
                        ->with('error', 'Your account has been rejected. Please contact support for more information.')
                        ->withInput();
                }
            }

            if ($user->role === 'patient') {
                $patient = $user->patient;

                if ($patient->status === 'desactive') {
                    Auth::logout();
                    return redirect()->back()
                        ->with('error', 'Your account is deactivated. Please contact support for more information.')
                        ->withInput();
                }
            }

            if ($user->role === 'doctor') {
                return redirect()->route('doctor.dashboard');
            } else {
                return redirect()->route('patient.dashboard');
            }
        }

        return redirect()->back()
            ->with('error', 'Invalid credentials.')
            ->withInput();
    }
}
