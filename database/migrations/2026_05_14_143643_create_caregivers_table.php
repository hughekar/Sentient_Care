<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('caregivers', function (Blueprint $table) {
            $table->id();

            // Basic identity
            $table->string('first_name');
            $table->string('last_name');

            // Login credentials
            $table->string('email')->unique();
            $table->string('password');

            // Optional fields
            $table->string('phone')->nullable();

            // Role system (admin, caregiver, gp)
            $table->string('role')->default('caregiver');

            // Laravel auth helpers
            $table->rememberToken();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caregivers');
    }
};
