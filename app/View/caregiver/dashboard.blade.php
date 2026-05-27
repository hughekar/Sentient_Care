<x-app-layout>

    <div class="max-w-5xl mx-auto py-10">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            Welcome, {{ $caregiver->name }}
        </h1>

        <h2 class="text-xl font-semibold text-gray-700 mb-4">
            Your Patients
        </h2>

        @if($patients->isEmpty())
            <p class="text-gray-500">You have no assigned patients yet.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($patients as $patient)
                    <div class="bg-white shadow rounded-lg p-6 border border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800">
                            {{ $patient->name }}
                        </h3>

                        <p class="text-gray-600 mt-1">
                            Age: {{ $patient->age ?? 'N/A' }}
                        </p>

                        <p class="text-gray-600">
                            Condition: {{ $patient->condition ?? 'N/A' }}
                        </p>

                        <div class="mt-4">
                            <a href="{{ route('patients.show', $patient->id) }}"
                               class="text-blue-600 font-semibold hover:underline">
                                View Profile
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>

</x-app-layout>
