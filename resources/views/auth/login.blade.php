<x-guest-layout>

    <!-- Logo -->
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/bottom-icon.png') }}" class="h-10" alt="Sentient Care Icon">
    </div>

    <!-- Title -->
    <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800">
        Sign in
    </h2>

    <!-- Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

      <!-- Username -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Username')" class="font-semibold text-gray-800" />

            <x-text-input id="email"
                type="email"
                name="email"
                required
                autofocus
                autocomplete="username"
                class="block mt-1 w-full
                    bg-teal-600/20
                    text-gray-900
                    border border-white/60
                    rounded-lg
                    h-11 px-4
                    focus:border-teal-600
                    focus:ring-teal-600
                    shadow-sm"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember + Forgot -->
        <div class="flex items-center justify-between mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="rounded border-gray-300">
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>

            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                Forgot password?
            </a>
        </div>

        <!-- Login Button -->
        <button class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
            Login
        </button>

        <!-- Register -->
        <div class="mt-6 text-center text-sm">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                Register now
            </a>
        </div>

    </form>

</x-guest-layout>
