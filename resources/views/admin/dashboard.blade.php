<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-600 leading-tight">
            {{ __('Panel Kontrol Admin Apex Arena') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-zinc-950 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- STATS SUMMARY -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="aa-card p-6">
                    <p class="text-zinc-400 text-sm uppercase font-bold tracking-wider">Total Tiket Terjual</p>
                    <h3 class="text-3xl font-black text-red-500 mt-2">0</h3>
                </div>
                <div class="aa-card p-6">
                    <p class="text-zinc-400 text-sm uppercase font-bold tracking-wider">Total Pendapatan</p>
                    <h3 class="text-3xl font-black text-green-500 mt-2">Rp 0</h3>
                </div>
                <div class="aa-card p-6">
                    <p class="text-zinc-400 text-sm uppercase font-bold tracking-wider">Total Pendaftar</p>
                    <h3 class="text-3xl font-black text-blue-500 mt-2">1</h3>
                </div>
            </div>

            <!-- DASHBOARD CONTENT -->
            <div class="aa-card overflow-hidden p-6">
                <h3 class="text-lg font-bold mb-2">Selamat datang di panel admin, {{ Auth::user()->name }}.</h3>
                <p class="text-zinc-400">
                    Sistem dua peran Apex Arena sudah aktif. Di halaman ini kamu bisa mengelola jadwal Fight Night, penjualan tiket, dan data pengguna.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
