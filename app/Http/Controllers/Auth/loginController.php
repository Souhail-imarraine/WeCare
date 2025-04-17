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
            'role' => 'required|in:doctor,patient'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()
                ->with('error', 'Invalid login credentials')
                ->withInput();
        }

        $user = Auth::user();

        // Check if user role matches selected role
        if ($user->role !== $request->role) {
            Auth::logout();
            return redirect()->back()
                ->with('error', 'Access denied. This account is not a ' . $request->role . ' account.')
                ->withInput();
        }

        // Redirect based on role
        if ($user->role === 'doctor') {
            return redirect()->route('doctor.dashboard')
                ->with('success', 'Welcome back, Doctor!');
        } else {
            return redirect()->route('patient.dashboard')
                ->with('success', 'Welcome back!');
        }
    }
}
