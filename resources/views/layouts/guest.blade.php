<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Apex Arena') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-zinc-100 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center px-4 py-8 bg-zinc-950">
            <div>
                <a href="/" class="text-2xl font-black tracking-wider text-red-600">
                    APEX<span class="text-white">ARENA</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-6 aa-card overflow-hidden">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
