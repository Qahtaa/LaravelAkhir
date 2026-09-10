<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-500 leading-tight">
            {{ __('Dashboard Saya') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-zinc-950 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="aa-card overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-white">Selamat datang, {{ Auth::user()->name }}.</h3>
                    <p class="mt-2 text-sm text-zinc-400">
                        Akun kamu sudah aktif. Gunakan dashboard ini untuk melihat informasi tiket dan aktivitas Apex Arena.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
