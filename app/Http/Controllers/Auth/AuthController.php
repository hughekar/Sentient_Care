<?php

namespace App\Http\Controllers;

use App\Models\Caregiver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:caregivers',
            'password' => 'required|min:6',
            'phone' => 'nullable',
            'role' => 'nullable|string'
        ]);

        $data['password'] = bcrypt($data['password']);

        $caregiver = Caregiver::create($data);

        $token = $caregiver->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'caregiver' => $caregiver
        ]);
    }

    public function login(Request $request)
    {
        $caregiver = Caregiver::where('email', $request->email)->first();

        if (! $caregiver || ! Hash::check($request->password, $caregiver->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $caregiver->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'caregiver' => $caregiver
        ]);
    }
}
