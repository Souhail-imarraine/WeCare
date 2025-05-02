<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = Auth::user();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.login')
                ->with('success', 'Logged out successfully');
        }

        return redirect()->route('login')
            ->with('success', 'Logged out successfully');
    }
}
