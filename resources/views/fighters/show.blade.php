<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="refresh" content="30"><title>{{ $fighter->name }} - Apex Arena</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-white antialiased">
    <nav class="flex justify-between items-center px-6 md:px-8 py-5 border-b border-zinc-800 bg-zinc-900/80"><a href="{{ route('home') }}" class="text-2xl font-black tracking-wider text-red-600">APEX<span class="text-white">ARENA</span></a><a href="{{ route('home') }}" class="text-sm text-zinc-300 hover:text-white">Beranda</a></nav>
    <main class="max-w-6xl mx-auto px-6 py-14">
        <section class="grid md:grid-cols-[260px_1fr] gap-8 items-start"><div class="h-64 w-64 rounded-lg overflow-hidden bg-zinc-800 border border-red-700/60">@if($fighter->photo)<img src="{{ asset('storage/'.$fighter->photo) }}" alt="{{ $fighter->name }}" class="h-full w-full object-cover">@endif</div><div><p class="text-red-500 font-bold uppercase tracking-widest text-sm">Profil fighter</p><h1 class="text-4xl font-black mt-2">{{ $fighter->name }}</h1><p class="text-xl text-zinc-400 mt-1">{{ $fighter->nickname ? '"'.$fighter->nickname.'"' : '' }}</p><p class="text-3xl font-black mt-6">{{ $fighter->record_win }}-{{ $fighter->record_loss }}-{{ $fighter->record_draw }}</p><p class="text-zinc-500 text-sm">Menang - Kalah - Seri</p><div class="mt-5 flex flex-wrap gap-3 text-sm text-zinc-300"><span class="aa-panel px-3 py-2">{{ $fighter->weight_class }}</span><span class="aa-panel px-3 py-2">Tinggi {{ $fighter->height_cm ?? '-' }} cm</span><span class="aa-panel px-3 py-2">Reach {{ $fighter->reach_cm ?? '-' }} cm</span></div><p class="text-zinc-400 mt-6 leading-relaxed">{{ $fighter->bio }}</p></div></section>
        <section class="mt-16"><div class="flex items-end justify-between mb-8"><h2 class="text-2xl font-black">Daftar Fight</h2><span class="text-xs text-zinc-500">Data terbaru dari admin</span></div><div class="grid lg:grid-cols-2 gap-6">@forelse($fights as $fight) @include('fights._card', ['fight' => $fight]) @empty <p class="text-zinc-500">Belum ada fight.</p> @endforelse</div></section>
    </main>
</body>
</html>
