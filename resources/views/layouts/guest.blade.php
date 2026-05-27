<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans text-gray-900 antialiased bg-no-repeat bg-top"
          style="background-image: url('/images/sentient-bg.png'); background-size: 100% auto;">

        <div class="min-h-screen flex items-center justify-end">

    <div class="w-full max-w-md px-8 py-8
            bg-teal-600/20
            backdrop-blur-sm
            shadow-[0_8px_30px_rgba(0,0,0,0.25)]
            rounded-2xl
            border border-white/70
            mr-12
            text-white">
        {{ $slot }}
    </div>
   </div>

    </body>
</html>


