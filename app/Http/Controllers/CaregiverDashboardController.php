<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CaregiverDashboardController extends Controller
{
    public function index()
    {
        $caregiver = Auth::user();
         
       $patients = $caregiver->patients()
        ->orderBy('last_name')
        ->orderBy('first_name')
        ->get();


        return view('caregiver_dashboard', compact('caregiver', 'patients'));

    }
}
