@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Nama Fighter</label>
        <input type="text" name="name" value="{{ old('name', $fighter->name ?? '') }}" required class="w-full aa-input p-2.5 text-sm">
        @error('name') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Nickname</label>
        <input type="text" name="nickname" value="{{ old('nickname', $fighter->nickname ?? '') }}" class="w-full aa-input p-2.5 text-sm">
        @error('nickname') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Foto</label>
        <input type="file" name="photo" accept="image/*" class="w-full aa-input p-2.5 text-sm">
        @error('photo') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror

        @isset($fighter)
            @if($fighter->photo)
                <img src="{{ asset('storage/'.$fighter->photo) }}" alt="{{ $fighter->name }}" class="mt-3 h-24 w-24 rounded-lg object-cover border border-zinc-800">
            @endif
        @endisset
    </div>

    <div>
        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Kelas Berat</label>
        <input type="text" name="weight_class" value="{{ old('weight_class', $fighter->weight_class ?? '') }}" required class="w-full aa-input p-2.5 text-sm">
        @error('weight_class') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Menang</label>
        <input type="number" name="record_win" value="{{ old('record_win', $fighter->record_win ?? 0) }}" min="0" required class="w-full aa-input p-2.5 text-sm">
        @error('record_win') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Kalah</label>
        <input type="number" name="record_loss" value="{{ old('record_loss', $fighter->record_loss ?? 0) }}" min="0" required class="w-full aa-input p-2.5 text-sm">
        @error('record_loss') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Seri</label>
        <input type="number" name="record_draw" value="{{ old('record_draw', $fighter->record_draw ?? 0) }}" min="0" required class="w-full aa-input p-2.5 text-sm">
        @error('record_draw') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Tinggi (cm)</label>
        <input type="number" name="height_cm" value="{{ old('height_cm', $fighter->height_cm ?? '') }}" min="0" max="300" class="w-full aa-input p-2.5 text-sm">
        @error('height_cm') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Reach (cm)</label>
        <input type="number" name="reach_cm" value="{{ old('reach_cm', $fighter->reach_cm ?? '') }}" min="0" max="300" class="w-full aa-input p-2.5 text-sm">
        @error('reach_cm') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="block text-xs uppercase text-zinc-400 font-bold mb-1">Bio</label>
        <textarea name="bio" rows="5" class="w-full aa-input p-2.5 text-sm">{{ old('bio', $fighter->bio ?? '') }}</textarea>
        @error('bio') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6 flex items-center justify-end gap-3">
    <a href="{{ route('admin.fighters.index') }}" class="text-sm font-semibold text-zinc-400 hover:text-white">Batal</a>
    <button type="submit" class="aa-button-primary py-2.5 px-6">
        {{ $submitLabel }}
    </button>
</div>
