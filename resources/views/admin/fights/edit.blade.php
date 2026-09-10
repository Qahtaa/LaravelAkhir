<x-app-layout>
    <x-slot name="header"><h2 class="font-bold text-2xl text-red-600 leading-tight">Edit Fight</h2></x-slot>
    <div class="py-12 bg-zinc-950 min-h-screen text-white">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="aa-card p-6">
                <form action="{{ route('admin.fights.update', $fight) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf @method('PUT')
                    <div><label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Sudut Merah</label><select name="red_fighter_id" required class="w-full aa-input p-2.5 text-sm">@foreach($fighters as $fighter)<option value="{{ $fighter->id }}" @selected($fight->red_fighter_id === $fighter->id)>{{ $fighter->name }}</option>@endforeach</select></div>
                    <div><label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Sudut Biru</label><select name="blue_fighter_id" required class="w-full aa-input p-2.5 text-sm">@foreach($fighters as $fighter)<option value="{{ $fighter->id }}" @selected($fight->blue_fighter_id === $fighter->id)>{{ $fighter->name }}</option>@endforeach</select></div>
                    <div><label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Kelas Tanding</label><input name="weight_class" value="{{ old('weight_class', $fight->weight_class) }}" required class="w-full aa-input p-2.5 text-sm"></div>
                    <div><label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Waktu Pertandingan</label><input type="datetime-local" name="match_time" value="{{ old('match_time', $fight->match_time->format('Y-m-d\\TH:i')) }}" required class="w-full aa-input p-2.5 text-sm"></div>
                    <div><label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Status</label><select name="status" class="w-full aa-input p-2.5 text-sm"><option @selected($fight->status === 'Upcoming')>Upcoming</option><option @selected($fight->status === 'Live')>Live</option><option @selected($fight->status === 'Finished')>Finished</option></select></div>
                    <div class="md:col-span-2 flex justify-end gap-3"><a href="{{ route('admin.fights.index') }}" class="aa-button-secondary">Batal</a><button class="aa-button-primary">Simpan Perubahan</button></div>
                </form>
                @if($errors->any())<div class="mt-4 text-sm text-red-400">{{ $errors->first() }}</div>@endif
            </div>
        </div>
    </div>
</x-app-layout>
