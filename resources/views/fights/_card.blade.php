<article class="aa-card p-5">
    <div class="flex items-center justify-between gap-4 mb-5 text-xs uppercase tracking-widest text-zinc-500">
        <span>{{ $fight->weight_class }}</span>
        <span>{{ $fight->match_time->format('d M Y, H:i') }} WITA</span>
    </div>
    <div class="flex items-center justify-between mb-4">
        <span class="rounded-full px-2.5 py-1 text-xs font-bold {{ $fight->status === 'Live' ? 'bg-red-600 text-white animate-pulse' : ($fight->status === 'Upcoming' ? 'bg-yellow-400 text-zinc-950' : 'bg-zinc-700 text-zinc-200') }}">{{ $fight->status }}</span>
        <span class="text-xs text-zinc-500">Diperbarui {{ $fight->updated_at->locale('id')->diffForHumans() }}</span>
    </div>
    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-center">
        @foreach([$fight->redFighter, $fight->blueFighter] as $index => $fighter)
            <div class="text-center">
                @if($fighter?->photo)
                    <img src="{{ asset('storage/'.$fighter->photo) }}" alt="{{ $fighter->name }}" class="mx-auto h-24 w-24 rounded-lg object-cover border {{ $index === 0 ? 'border-red-700/60' : 'border-blue-700/60' }}">
                @else
                    <div class="mx-auto h-24 w-24 rounded-lg bg-zinc-800 border {{ $index === 0 ? 'border-red-700/60' : 'border-blue-700/60' }}"></div>
                @endif
                @if($fighter)
                    <a href="{{ route('fighters.show', $fighter) }}" class="mt-3 block font-extrabold {{ $index === 0 ? 'text-red-500' : 'text-blue-500' }} hover:underline">{{ $fighter->name }}</a>
                    @if($fighter->nickname)<p class="text-xs text-zinc-400">"{{ $fighter->nickname }}"</p>@endif
                    <p class="text-xs text-zinc-500 mt-1">{{ $fighter->record_win }}-{{ $fighter->record_loss }}-{{ $fighter->record_draw }}</p>
                @else
                    <p class="mt-3 font-bold text-zinc-500">TBA</p>
                @endif
            </div>
            @if($index === 0)<div class="text-xl font-black text-zinc-500">VS</div>@endif
        @endforeach
    </div>
    <a href="{{ route('fights.show', $fight) }}" class="mt-5 block text-center text-sm font-bold text-zinc-300 hover:text-white">Lihat detail fight &rarr;</a>
</article>
