<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\CaregiverController;

Route::apiResource('patients', PatientController::class);

Route::post('/caregiver/register', [AuthController::class, 'register']);
Route::post('/caregiver/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // CRUD for caregivers
    Route::apiResource('caregivers', CaregiverController::class);

    // Caregiver → Patient
    Route::post('/caregivers/{id}/attach', [CaregiverController::class, 'attachPatient']);
    Route::post('/caregivers/{id}/detach', [CaregiverController::class, 'detachPatient']);
    Route::get('/caregivers/{id}/patients', [CaregiverController::class, 'patients']);

    // Patient → Caregiver (reverse)
    Route::get('/patients/{id}/caregivers', [PatientController::class, 'caregivers']);
    Route::post('/patients/{id}/attach-caregiver', [PatientController::class, 'attachCaregiver']);
    Route::post('/patients/{id}/detach-caregiver', [PatientController::class, 'detachCaregiver']);
});
