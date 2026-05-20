<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * List all patients.
     */
    public function index()
    {
        return response()->json(
            Patient::orderBy('last_name')->get(),
            200
        );
    }

    /**
     * Create a new patient.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'preferred_name' => 'nullable|string|max:100',

            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'ppsn' => 'nullable|string|max:20',

            'emergency_contact_name' => 'nullable|string|max:200',
            'emergency_contact_phone' => 'nullable|string|max:20',

            'medical_card_number' => 'nullable|string|max:50',
            'medical_card_expiry' => 'nullable|date',

            'insurance_provider' => 'nullable|string|max:100',
            'insurance_policy_number' => 'nullable|string|max:100',
            'insurance_expiry' => 'nullable|date',

            'status' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ]);

        $patient = Patient::create($data);

        return response()->json([
            'message' => 'Patient created successfully.',
            'patient' => $patient
        ], 201);
    }

    /**
     * Show a single patient.
     */
    public function show($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        return response()->json($patient, 200);
    }

    /**
     * Update a patient.
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $data = $request->validate([
            'first_name' => 'sometimes|required|string|max:100',
            'last_name'  => 'sometimes|required|string|max:100',
            'preferred_name' => 'nullable|string|max:100',

            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'ppsn' => 'nullable|string|max:20',

            'emergency_contact_name' => 'nullable|string|max:200',
            'emergency_contact_phone' => 'nullable|string|max:20',

            'medical_card_number' => 'nullable|string|max:50',
            'medical_card_expiry' => 'nullable|date',

            'insurance_provider' => 'nullable|string|max:100',
            'insurance_policy_number' => 'nullable|string|max:100',
            'insurance_expiry' => 'nullable|date',

            'status' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ]);

        $patient->update($data);

        return response()->json([
            'message' => 'Patient updated successfully.',
            'patient' => $patient
        ], 200);
    }

    /**
     * Soft delete a patient.
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully.'], 200);
    }

public function caregivers($id)
{
    $patient = Patient::with('caregivers')->findOrFail($id);

    return response()->json([
        'success' => true,
        'data' => $patient->caregivers
    ]);
}

public function attachCaregiver(Request $request, $id)
{
    $request->validate([
        'caregiver_id' => 'required|exists:caregivers,id'
    ]);

    $patient = Patient::findOrFail($id);
    $patient->caregivers()->syncWithoutDetaching([$request->caregiver_id]);

    return response()->json([
        'success' => true,
        'message' => 'Caregiver assigned to patient'
    ]);
}

public function detachCaregiver(Request $request, $id)
{
    $request->validate([
        'caregiver_id' => 'required|exists:caregivers,id'
    ]);

    $patient = Patient::findOrFail($id);
    $patient->caregivers()->detach($request->caregiver_id);

    return response()->json([
        'success' => true,
        'message' => 'Caregiver removed from patient'
    ]);
}

}
