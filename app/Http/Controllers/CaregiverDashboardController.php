<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CaregiverDashboardController extends Controller
{
    public function index()
    {
        dd(Auth::user());
        $caregiver = Auth::user();
        $patients = $caregiver->patients()->orderBy('name')->get();

        return view('caregiver.dashboard', compact('caregiver', 'patients'));
    }
}
