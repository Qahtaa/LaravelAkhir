<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30"><title>Detail Fight - Apex Arena</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-white antialiased">
    <nav class="flex justify-between items-center px-6 md:px-8 py-5 border-b border-zinc-800 bg-zinc-900/80"><a href="{{ route('home') }}" class="text-2xl font-black tracking-wider text-red-600">APEX<span class="text-white">ARENA</span></a><a href="{{ route('fights.history') }}" class="text-sm text-zinc-300 hover:text-white">Riwayat</a></nav>
    <main class="max-w-5xl mx-auto px-6 py-14">
        <div class="text-center mb-10"><p class="text-red-500 font-bold uppercase tracking-widest text-sm">{{ $fight->weight_class }}</p><h1 class="text-4xl font-black mt-2">Fight Detail</h1><p class="text-zinc-400 mt-3">{{ $fight->match_time->format('d M Y, H:i') }} WITA</p><div class="mt-4 flex items-center justify-center gap-3"><span class="rounded-full px-3 py-1 text-sm font-bold {{ $fight->status === 'Live' ? 'bg-red-600 animate-pulse' : ($fight->status === 'Upcoming' ? 'bg-yellow-400 text-zinc-950' : 'bg-zinc-700') }}">{{ $fight->status }}</span><span class="text-xs text-zinc-500">Diperbarui {{ $fight->updated_at->locale('id')->diffForHumans() }}</span></div></div>
        <div class="grid md:grid-cols-[1fr_auto_1fr] gap-8 items-center">
            @foreach([$fight->redFighter, $fight->blueFighter] as $index => $fighter)
                <div class="aa-card p-6 text-center"><a href="{{ $fighter ? route('fighters.show', $fighter) : '#' }}"><div class="mx-auto h-48 w-48 rounded-lg overflow-hidden bg-zinc-800 border {{ $index === 0 ? 'border-red-700/60' : 'border-blue-700/60' }}">@if($fighter?->photo)<img src="{{ asset('storage/'.$fighter->photo) }}" alt="{{ $fighter->name }}" class="h-full w-full object-cover">@endif</div><h2 class="mt-5 text-2xl font-black {{ $index === 0 ? 'text-red-500' : 'text-blue-500' }}">{{ $fighter?->name ?? 'TBA' }}</h2></a>@if($fighter)<p class="text-zinc-400">{{ $fighter->nickname ? '"'.$fighter->nickname.'"' : '' }}</p><p class="mt-3 font-bold text-zinc-200">{{ $fighter->record_win }}-{{ $fighter->record_loss }}-{{ $fighter->record_draw }}</p><p class="text-sm text-zinc-500 mt-2">{{ $fighter->height_cm ?? '-' }} cm · Reach {{ $fighter->reach_cm ?? '-' }} cm</p>@endif</div>
                @if($index === 0)<div class="text-3xl font-black text-zinc-600 text-center">VS</div>@endif
            @endforeach
        </div>
    </main>
</body>
</html>
