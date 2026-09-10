<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-600 leading-tight">
            {{ __('Kelola Jadwal Fight Night - Apex Arena') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-zinc-950 min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @if(session('success'))
                <div class="rounded-lg border border-red-500 bg-red-600/20 p-4 text-red-300">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="rounded-lg border border-red-500 bg-red-600/20 p-4 text-red-300">{{ $errors->first() }}</div>
            @endif

            <!-- FORM TAMBAH JADWAL -->
            <div class="aa-card p-6">
                <h3 class="text-lg font-bold text-red-500 mb-4">Tambah Pertandingan Baru</h3>
                <form action="{{ route('admin.fights.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @csrf
                    <div>
                        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Sudut Merah</label>
                        <select name="red_fighter_id" required class="w-full aa-input p-2.5 text-sm">
                            <option value="">Pilih fighter merah</option>
                            @foreach($fighters as $fighter)
                                <option value="{{ $fighter->id }}" @selected(old('red_fighter_id') == $fighter->id)>
                                    {{ $fighter->name }}{{ $fighter->nickname ? ' "'.$fighter->nickname.'"' : '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('red_fighter_id') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Sudut Biru</label>
                        <select name="blue_fighter_id" required class="w-full aa-input p-2.5 text-sm">
                            <option value="">Pilih fighter biru</option>
                            @foreach($fighters as $fighter)
                                <option value="{{ $fighter->id }}" @selected(old('blue_fighter_id') == $fighter->id)>
                                    {{ $fighter->name }}{{ $fighter->nickname ? ' "'.$fighter->nickname.'"' : '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('blue_fighter_id') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Kelas Tanding</label>
                        <input type="text" name="weight_class" placeholder="Contoh: Ringan 70 kg" required class="w-full aa-input p-2.5 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Waktu Pertandingan</label>
                        <input type="datetime-local" name="match_time" required class="w-full aa-input p-2.5 text-sm">
                    </div>
                    <div class="md:col-span-2 lg:col-span-4 flex justify-end">
                        <button type="submit" class="aa-button-primary py-2.5 px-6">
                            Simpan Pertandingan
                        </button>
                    </div>
                </form>
            </div>

            <!-- DAFTAR PERTANDINGAN -->
            <div class="aa-card p-6">
                <h3 class="text-lg font-bold mb-4">Daftar Pertandingan</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                                <thead>
                            <tr class="border-b border-zinc-800 text-zinc-400 text-xs uppercase">
                                <th class="p-3">Pertandingan</th>
                                <th class="p-3">Kelas</th>
                                <th class="p-3">Waktu</th>
                                <th class="p-3">Status</th><th class="p-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-800/50 text-sm">
                            @forelse($fights as $fight)
                                <tr>
                                    <td class="p-3 font-semibold">
                                        <span class="text-red-500">{{ $fight->redFighter?->name ?? 'Fighter belum dipilih' }}</span> 
                                        <span class="text-zinc-500 font-normal px-1">VS</span> 
                                        <span class="text-blue-500">{{ $fight->blueFighter?->name ?? 'Fighter belum dipilih' }}</span>
                                    </td>
                                    <td class="p-3 text-zinc-400">{{ $fight->weight_class }}</td>
                                    <td class="p-3 text-zinc-300">{{ \Carbon\Carbon::parse($fight->match_time)->format('d M Y, H:i') }} WITA</td>
                                    <td class="p-3">
                                        <div class="flex items-center gap-2">
                                            <span class="text-xs font-bold">{{ $fight->status }}</span>
                                            @if($fight->status !== 'Finished')
                                                <form action="{{ route('admin.fights.status', $fight) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="status" value="{{ $fight->status === 'Upcoming' ? 'Live' : 'Finished' }}">
                                                    <button class="text-xs text-red-400 hover:text-red-300">{{ $fight->status === 'Upcoming' ? 'Jadikan Live' : 'Selesaikan' }}</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-3 text-right">
                                        <a href="{{ route('admin.fights.edit', $fight) }}" class="text-zinc-300 hover:text-white font-semibold text-xs mr-3">Edit</a>
                                        <form class="inline" action="{{ route('admin.fights.destroy', $fight->id) }}" method="POST" onsubmit="return confirm('Hapus pertandingan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-400 font-semibold text-xs">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-zinc-500">Belum ada jadwal pertandingan yang dibuat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
