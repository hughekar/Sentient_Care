<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'preferred_name',
        'address',
        'date_of_birth',
        'gender',
        'phone',
        'email',
        'ppsn',
        'emergency_contact_name',
        'emergency_contact_phone',
        'medical_card_number',
        'medical_card_expiry',
        'insurance_provider',
        'insurance_policy_number',
        'insurance_expiry',
        'status',
        'notes',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'medical_card_expiry' => 'date',
        'insurance_expiry' => 'date',
    ];

    public function caregivers()
    {
        return $this->belongsToMany(Caregiver::class, 'caregiver_patient');
    }
}
