<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-600 leading-tight">
            {{ __('Kelola Fighter - Apex Arena') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-zinc-950 min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            @if(session('success'))
                <div class="rounded-lg border border-red-500 bg-red-600/20 p-4 text-red-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end">
                <a href="{{ route('admin.fighters.create') }}" class="aa-button-primary py-2.5 px-6">
                    Tambah Fighter
                </a>
            </div>

            <div class="aa-card p-6">
                <h3 class="text-lg font-bold mb-4">Daftar Fighter</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-zinc-800 text-zinc-400 text-xs uppercase">
                                <th class="p-3">Fighter</th>
                                <th class="p-3">Record</th>
                                <th class="p-3">Kelas</th>
                                <th class="p-3">Ukuran</th>
                                <th class="p-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-800/50 text-sm">
                            @forelse($fighters as $fighter)
                                <tr>
                                    <td class="p-3">
                                        <div class="flex items-center gap-3">
                                            @if($fighter->photo)
                                                <img src="{{ asset('storage/'.$fighter->photo) }}" alt="{{ $fighter->name }}" class="h-12 w-12 rounded-lg object-cover border border-zinc-800">
                                            @else
                                                <div class="h-12 w-12 rounded-lg bg-zinc-800 border border-zinc-700"></div>
                                            @endif
                                            <div>
                                                <div class="font-semibold text-zinc-100">{{ $fighter->name }}</div>
                                                @if($fighter->nickname)
                                                    <div class="text-xs text-red-400">"{{ $fighter->nickname }}"</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3 text-zinc-300">{{ $fighter->record_win }}-{{ $fighter->record_loss }}-{{ $fighter->record_draw }}</td>
                                    <td class="p-3 text-zinc-400">{{ $fighter->weight_class }}</td>
                                    <td class="p-3 text-zinc-400">
                                        {{ $fighter->height_cm ? $fighter->height_cm.' cm' : '-' }} / {{ $fighter->reach_cm ? $fighter->reach_cm.' cm' : '-' }}
                                    </td>
                                    <td class="p-3">
                                        <div class="flex items-center justify-end gap-3">
                                            <a href="{{ route('admin.fighters.edit', $fighter) }}" class="text-zinc-300 hover:text-white font-semibold text-xs">Edit</a>
                                            <form action="{{ route('admin.fighters.destroy', $fighter) }}" method="POST" onsubmit="return confirm('Hapus fighter ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-400 font-semibold text-xs">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-zinc-500">Belum ada fighter yang dibuat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $fighters->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
