<?php

namespace App\Http\Controllers;

use App\Models\Fighter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FighterController extends Controller
{
    public function index()
    {
        $fighters = Fighter::orderBy('name')->paginate(10);

        return view('admin.fighters.index', compact('fighters'));
    }

    public function create()
    {
        return view('admin.fighters.create');
    }

    public function show(Fighter $fighter)
    {
        $fights = \App\Models\Fight::with(['redFighter', 'blueFighter'])
            ->where(function ($query) use ($fighter) {
                $query->where('red_fighter_id', $fighter->id)
                    ->orWhere('blue_fighter_id', $fighter->id);
            })
            ->orderByDesc('match_time')
            ->get();

        return response()->view('fighters.show', compact('fighter', 'fights'))->header('Cache-Control', 'no-store, max-age=0');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('fighters', 'public');
        }

        Fighter::create($data);

        return redirect()->route('admin.fighters.index')->with('success', 'Fighter berhasil ditambahkan!');
    }

    public function edit(Fighter $fighter)
    {
        return view('admin.fighters.edit', compact('fighter'));
    }

    public function update(Request $request, Fighter $fighter)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('photo')) {
            if ($fighter->photo) {
                Storage::disk('public')->delete($fighter->photo);
            }

            $data['photo'] = $request->file('photo')->store('fighters', 'public');
        }

        $fighter->update($data);

        return redirect()->route('admin.fighters.index')->with('success', 'Fighter berhasil diperbarui!');
    }

    public function destroy(Fighter $fighter)
    {
        if ($fighter->fights()->exists()) {
            return redirect()->back()->withErrors(['fighter' => 'Fighter tidak dapat dihapus karena masih terdaftar dalam fight.']);
        }

        if ($fighter->photo) {
            Storage::disk('public')->delete($fighter->photo);
        }

        $fighter->delete();

        return redirect()->route('admin.fighters.index')->with('success', 'Fighter berhasil dihapus!');
    }

    private function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'record_win' => ['required', 'integer', 'min:0'],
            'record_loss' => ['required', 'integer', 'min:0'],
            'record_draw' => ['required', 'integer', 'min:0'],
            'weight_class' => ['required', 'string', 'max:255'],
            'height_cm' => ['nullable', 'integer', 'min:0', 'max:300'],
            'reach_cm' => ['nullable', 'integer', 'min:0', 'max:300'],
            'bio' => ['nullable', 'string'],
        ];
    }
}
