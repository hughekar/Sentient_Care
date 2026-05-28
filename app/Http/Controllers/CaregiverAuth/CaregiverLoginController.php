<?php

namespace App\Http\Controllers\CaregiverAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaregiverLoginController extends Controller
{
    public function showLoginForm()
    {
       
        return view('caregiver.login');
    }

    public function login(Request $request)
    {
         
        // Validate login form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login using the caregiver guard
        if (Auth::guard('caregiver')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // Login successful
            return redirect()->route('caregiver.dashboard');
        }

        // Login failed
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('caregiver')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('caregiver.login');
    }
}
