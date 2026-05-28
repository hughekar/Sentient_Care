<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-sm font-medium text-gray-500">Total Patients</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">128</p>
                </div>

                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-sm font-medium text-gray-500">Appointments Today</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">14</p>
                </div>

                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-sm font-medium text-gray-500">Pending Forms</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">6</p>
                </div>
            </div>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Recent Activity -->
                <div class="lg:col-span-2 bg-white p-6 shadow rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h3>

                    <ul class="space-y-3">
                        <li class="border-b pb-3">New patient registered: <strong>Sarah O’Neill</strong></li>
                        <li class="border-b pb-3">Form submitted: <strong>Care Needs Assessment</strong></li>
                        <li class="border-b pb-3">Appointment updated: <strong>Dr. Byrne</strong></li>
                    </ul>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>

                    <div class="space-y-3">
                        <a href="#" class="block bg-blue-600 text-white px-4 py-2 rounded text-center">Add New Patient</a>
                        <a href="#" class="block bg-green-600 text-white px-4 py-2 rounded text-center">Create Appointment</a>
                        <a href="#" class="block bg-gray-700 text-white px-4 py-2 rounded text-center">Upload Document</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
