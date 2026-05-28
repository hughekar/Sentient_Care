<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\CaregiverController;

/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
| These routes do NOT require authentication.
| Used for caregiver registration + login.
|--------------------------------------------------------------------------
*/

Route::post('/caregiver/register', [CaregiverController::class, 'register']);
Route::post('/caregiver/login', [CaregiverController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Protected API Routes (Sanctum)
|--------------------------------------------------------------------------
| These routes require a valid API token.
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // Patients CRUD
    Route::apiResource('patients', PatientController::class);

    // Caregivers CRUD
    Route::apiResource('caregivers', CaregiverController::class);

    /*
    |--------------------------------------------------------------------------
    | Caregiver → Patient Relationship
    |--------------------------------------------------------------------------
    */

    Route::post('/caregivers/{id}/attach', [CaregiverController::class, 'attachPatient']);
    Route::post('/caregivers/{id}/detach', [CaregiverController::class, 'detachPatient']);
    Route::get('/caregivers/{id}/patients', [CaregiverController::class, 'patients']);

    /*
    |--------------------------------------------------------------------------
    | Patient → Caregiver Relationship (reverse)
    |--------------------------------------------------------------------------
    */

    Route::get('/patients/{id}/caregivers', [PatientController::class, 'caregivers']);
    Route::post('/patients/{id}/attach-caregiver', [PatientController::class, 'attachCaregiver']);
    Route::post('/patients/{id}/detach-caregiver', [PatientController::class, 'detachCaregiver']);
});
