<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Caregiver;
use App\Models\Patient; // <-- REQUIRED
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CaregiverController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Caregiver::select('id', 'first_name', 'last_name', 'email', 'phone', 'role')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:caregivers,email',
            'password'   => 'required|string|min:6',
            'phone'      => 'nullable|string|max:20',
            'role'       => 'required|string|in:caregiver,admin',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $caregiver = Caregiver::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Caregiver created successfully',
            'data' => $caregiver->makeHidden(['password'])
        ], 201);
    }

    public function show($id)
    {
        $caregiver = Caregiver::find($id);

        if (!$caregiver) {
            return response()->json([
                'success' => false,
                'message' => 'Caregiver not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $caregiver->makeHidden(['password'])
        ]);
    }

    public function update(Request $request, $id)
    {
        $caregiver = Caregiver::find($id);

        if (!$caregiver) {
            return response()->json([
                'success' => false,
                'message' => 'Caregiver not found'
            ], 404);
        }

        $validated = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name'  => 'sometimes|required|string|max:255',
            'email'      => 'sometimes|required|email|unique:caregivers,email,' . $caregiver->id,
            'password'   => 'sometimes|required|string|min:6',
            'phone'      => 'nullable|string|max:20',
            'role'       => 'sometimes|required|string|in:caregiver,admin',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $caregiver->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Caregiver updated successfully',
            'data' => $caregiver->makeHidden(['password'])
        ]);
    }

    public function destroy($id)
    {
        $caregiver = Caregiver::find($id);

        if (!$caregiver) {
            return response()->json([
                'success' => false,
                'message' => 'Caregiver not found'
            ], 404);
        }

        $caregiver->delete();

        return response()->json([
            'success' => true,
            'message' => 'Caregiver deleted successfully'
        ]);
    }

    public function attachPatient(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id'
        ]);

        $caregiver = Caregiver::findOrFail($id);
        $caregiver->patients()->syncWithoutDetaching([$request->patient_id]);

        return response()->json([
            'success' => true,
            'message' => 'Patient assigned to caregiver'
        ]);
    }

    public function detachPatient(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id'
        ]);

        $caregiver = Caregiver::findOrFail($id);
        $caregiver->patients()->detach($request->patient_id);

        return response()->json([
            'success' => true,
            'message' => 'Patient removed from caregiver'
        ]);
    }

    public function patients($id)
    {
        $caregiver = Caregiver::with('patients')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $caregiver->patients
        ]);
    }
}
