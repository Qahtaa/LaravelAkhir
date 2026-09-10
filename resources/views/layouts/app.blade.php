<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Apex Arena') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-zinc-950 text-white">
        <div class="min-h-screen bg-zinc-950">
            
            <!-- PANGGIL FILE NAVIGATION DI SINI -->
            @include('layouts.navigation')

            <!-- Judul halaman -->
            @if (isset($header))
                <header class="border-b border-zinc-800 bg-zinc-900/80 shadow-sm shadow-black/20">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Konten halaman -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
