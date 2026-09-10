<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30"><title>Riwayat Pertandingan - Apex Arena</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-white antialiased">
    <nav class="flex justify-between items-center px-6 md:px-8 py-5 border-b border-zinc-800 bg-zinc-900/80">
        <a href="{{ route('home') }}" class="text-2xl font-black tracking-wider text-red-600">APEX<span class="text-white">ARENA</span></a>
        <a href="{{ route('home') }}" class="text-sm font-semibold text-zinc-300 hover:text-white">Beranda</a>
    </nav>
    <main class="max-w-6xl mx-auto px-6 py-14">
        <div class="flex items-end justify-between gap-4 mb-10"><div><p class="text-red-500 font-bold uppercase tracking-widest text-sm">Arsip pertarungan</p><h1 class="text-4xl font-black mt-2">Riwayat Pertandingan</h1></div><span class="text-sm text-zinc-500">Data terbaru dari admin</span></div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($fights as $fight)
                @include('fights._card', ['fight' => $fight])
            @empty
                <p class="lg:col-span-2 text-center text-zinc-500 py-16">Belum ada pertandingan selesai.</p>
            @endforelse
        </div>
        <div class="mt-8">{{ $fights->links() }}</div>
    </main>
</body>
</html>
