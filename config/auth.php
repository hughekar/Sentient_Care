<?php

use App\Models\User;
use App\Models\Caregiver;

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // ⭐ Caregiver guard
        'caregiver' => [
            'driver' => 'session',
            'provider' => 'caregivers',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [
        // Default Laravel users
        'users' => [
            'driver' => 'eloquent',
            'model' => User::class,
        ],

        // ⭐ Caregiver provider
        'caregivers' => [
            'driver' => 'eloquent',
            'model' => Caregiver::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Reset Settings
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        // ⭐ Caregiver password reset (optional)
        'caregivers' => [
            'provider' => 'caregivers',
            'table' => 'caregiver_password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
