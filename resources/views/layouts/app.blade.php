<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sentient Care') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cover bg-center"
      style="background-image: url('/images/background-medical.jpg');">

    {{-- Branding Header --}}
    <header class="bg-white/80 backdrop-blur-sm shadow-sm">
        <div class="max-w-6xl mx-auto py-4 px-6 flex items-center gap-4">
            <img src="/images/sentient-care-logo.png"
                 alt="Sentient Care Logo"
                 class="h-12 w-auto">

            <span class="text-2xl font-bold text-gray-900 tracking-wide">
                Sentient Care
            </span>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="max-w-6xl mx-auto py-10 px-6">
        {{ $slot }}
    </main>

</body>
</html>
