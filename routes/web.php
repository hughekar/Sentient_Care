<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CaregiverDashboardController;
use App\Http\Controllers\CaregiverAuth\CaregiverLoginController;

// Redirect root to caregiver login
Route::get('/', function () {
    return redirect()->route('caregiver.login');
});

// Default Laravel dashboard (for normal users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (normal users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Caregiver Authentication Routes
|--------------------------------------------------------------------------
*/

// Show caregiver login form
Route::get('/caregiver/login', [CaregiverLoginController::class, 'showLoginForm'])
    ->name('caregiver.login');

// Handle caregiver login
Route::post('/caregiver/login', [CaregiverLoginController::class, 'login'])
    ->name('caregiver.login.submit');

// Caregiver logout
Route::post('/caregiver/logout', [CaregiverLoginController::class, 'logout'])
    ->name('caregiver.logout');

/*
|--------------------------------------------------------------------------
| Caregiver Dashboard (Protected by caregiver guard)
|--------------------------------------------------------------------------
*/
Route::get('/caregiver/dashboard', [CaregiverDashboardController::class, 'index'])
    ->middleware('auth:caregiver')
    ->name('caregiver.dashboard');

require __DIR__.'/auth.php';
