<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apex Arena - Event & Match Fight Night</title>
    <meta http-equiv="refresh" content="30">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-white font-sans antialiased">

    <!-- NAVBAR APEX ARENA -->
    <nav class="flex justify-between items-center px-8 py-5 border-b border-zinc-800 bg-zinc-900/50 backdrop-blur-md fixed top-0 w-full z-50">
        <div class="text-2xl font-black tracking-wider text-red-600">
            APEX<span class="text-white">ARENA</span>
        </div>
        <div>
            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ url('/admin/dashboard') }}" class="font-semibold text-red-500 hover:text-red-400">Dashboard Admin</a>
                    @else
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-zinc-300 hover:text-white">Dashboard Saya</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-zinc-300 hover:text-white mr-4">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold transition">Daftar</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="min-h-screen flex flex-col justify-center items-center text-center p-6 pt-24 relative bg-gradient-to-b from-red-950/40 via-zinc-950 to-zinc-950">
        <span class="text-red-500 font-bold tracking-widest uppercase text-sm mb-4">
            SABTU, 24 OKTOBER 2026 | GOR MAKASSAR
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold max-w-4xl tracking-tight leading-tight mb-6">
            APEX ARENA: SABUK THAI TEA AKAN MENEMUKAN PEMILIK BARUNYA
        </h1>
        <p class="text-zinc-400 text-lg max-w-2xl mb-8">
            Pantau pertarungan terbaru dan perubahan status dari Apex Arena.
        </p>
        <a href="#tiket" class="bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-8 rounded-lg shadow-lg transition">
            AMBIL TIKET SEKARANG
        </a>
    </section>

    <!-- SECTION TIKET -->
    <section class="max-w-6xl mx-auto px-6 py-16">
        <h2 class="text-3xl font-extrabold text-center mb-12 text-zinc-100">JADWAL FIGHT</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($fights as $fight)
                <div class="aa-card p-5">
                    <div class="flex items-center justify-between gap-4 mb-5 text-xs uppercase tracking-widest text-zinc-500">
                        <span>{{ $fight->weight_class }}</span>
                        <span>{{ $fight->match_time->format('d M Y, H:i') }} WITA</span>
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <span class="rounded-full px-2.5 py-1 text-xs font-bold {{ $fight->status === 'Live' ? 'bg-red-600 text-white animate-pulse' : 'bg-yellow-400 text-zinc-950' }}">{{ $fight->status }}</span>
                        <span class="text-xs text-zinc-500">Diperbarui {{ $fight->updated_at->locale('id')->diffForHumans() }}</span>
                    </div>

                    <div class="grid grid-cols-[1fr_auto_1fr] gap-4 items-center">
                        <div class="text-center">
                            @if($fight->redFighter?->photo)
                                <img src="{{ asset('storage/'.$fight->redFighter->photo) }}" alt="{{ $fight->redFighter->name }}" class="mx-auto h-28 w-28 rounded-lg object-cover border border-red-700/60">
                            @else
                                <div class="mx-auto h-28 w-28 rounded-lg bg-zinc-800 border border-red-700/60"></div>
                            @endif
                            <a href="{{ $fight->redFighter ? route('fighters.show', $fight->redFighter) : '#' }}" class="mt-3 block font-extrabold text-red-500 hover:underline">{{ $fight->redFighter?->name ?? 'TBA' }}</a>
                            @if($fight->redFighter?->nickname)
                                <p class="text-xs text-zinc-400">"{{ $fight->redFighter->nickname }}"</p>
                            @endif
                            @if($fight->redFighter)<p class="text-xs text-zinc-500 mt-1">{{ $fight->redFighter->record_win }}-{{ $fight->redFighter->record_loss }}-{{ $fight->redFighter->record_draw }}</p>@endif
                        </div>

                        <div class="text-xl font-black text-zinc-500">VS</div>

                        <div class="text-center">
                            @if($fight->blueFighter?->photo)
                                <img src="{{ asset('storage/'.$fight->blueFighter->photo) }}" alt="{{ $fight->blueFighter->name }}" class="mx-auto h-28 w-28 rounded-lg object-cover border border-blue-700/60">
                            @else
                                <div class="mx-auto h-28 w-28 rounded-lg bg-zinc-800 border border-blue-700/60"></div>
                            @endif
                            <a href="{{ $fight->blueFighter ? route('fighters.show', $fight->blueFighter) : '#' }}" class="mt-3 block font-extrabold text-blue-500 hover:underline">{{ $fight->blueFighter?->name ?? 'TBA' }}</a>
                            @if($fight->blueFighter?->nickname)
                                <p class="text-xs text-zinc-400">"{{ $fight->blueFighter->nickname }}"</p>
                            @endif
                            @if($fight->blueFighter)<p class="text-xs text-zinc-500 mt-1">{{ $fight->blueFighter->record_win }}-{{ $fight->blueFighter->record_loss }}-{{ $fight->blueFighter->record_draw }}</p>@endif
                        </div>
                    </div>
                    <a href="{{ route('fights.show', $fight) }}" class="mt-5 block text-center text-sm font-bold text-zinc-300 hover:text-white">Lihat detail fight &rarr;</a>
                </div>
            @empty
                <div class="lg:col-span-2 text-center text-zinc-500">
                    Belum ada jadwal fight yang tersedia.
                </div>
            @endforelse
        </div>
    </section>

    <section id="tiket" class="max-w-6xl mx-auto px-6 py-16">
        <h2 class="text-3xl font-extrabold text-center mb-12 text-zinc-100">PILIH TIKET PERTANDINGAN</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="aa-card p-6 flex flex-col justify-between hover:border-zinc-700 transition">
                <div>
                    <h3 class="text-xl font-bold mb-2">TRIBUN</h3>
                    <p class="text-zinc-400 text-sm mb-4">Akses masuk area Tribun Utama</p>
                    <div class="text-3xl font-extrabold mb-6">Rp 75.000</div>
                    <ul class="text-sm text-zinc-300 space-y-2 mb-6">
                        <li>&check; Gratis 1 produk sponsor</li>
                        <li>&check; Akses Gate Utama</li>
                    </ul>
                </div>
                <a href="{{ route('register') }}" class="w-full text-center bg-zinc-800 hover:bg-zinc-700 text-white font-semibold py-3 rounded-lg transition block">
                    Beli Tiket Tribun
                </a>
            </div>

            <div class="bg-zinc-900 border-2 border-red-600 rounded-lg p-6 flex flex-col justify-between relative shadow-xl shadow-red-950/30">
                <span class="absolute -top-3 right-6 bg-red-600 text-xs font-bold px-3 py-1 rounded-full uppercase">Paling Populer</span>
                <div>
                    <h3 class="text-xl font-bold mb-2">RINGSIDE</h3>
                    <p class="text-zinc-400 text-sm mb-4">Tempat duduk tepat di samping arena ring</p>
                    <div class="text-3xl font-extrabold mb-6">Rp 200.000</div>
                    <ul class="text-sm text-zinc-300 space-y-2 mb-6">
                        <li>&check; Jarak pandang paling dekat</li>
                        <li>&check; Kaos eksklusif acara</li>
                        <li>&check; Jalur masuk prioritas</li>
                    </ul>
                </div>
                <a href="{{ route('register') }}" class="w-full text-center bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg transition block">
                    Beli Tiket Ringside
                </a>
            </div>

            <div class="aa-card p-6 flex flex-col justify-between hover:border-zinc-700 transition">
                <div>
                    <h3 class="text-xl font-bold mb-2">VIP PASS</h3>
                    <p class="text-zinc-400 text-sm mb-4">Pengalaman menonton kelas eksklusif</p>
                    <div class="text-3xl font-extrabold mb-6">Rp 500.000</div>
                    <ul class="text-sm text-zinc-300 space-y-2 mb-6">
                        <li>&check; Tempat duduk paling depan (baris 1-2)</li>
                        <li>&check; Akses lounge VIP dan konsumsi</li>
                        <li>&check; Temu sapa dan foto bersama atlet</li>
                    </ul>
                </div>
                <a href="{{ route('register') }}" class="w-full text-center bg-zinc-800 hover:bg-zinc-700 text-white font-semibold py-3 rounded-lg transition block">
                    Beli Tiket VIP
                </a>
            </div>
        </div>
    </section>

</body>
</html>
