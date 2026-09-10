<?php

namespace App\Http\Controllers;

use App\Models\Fight;
use App\Models\Fighter;
use App\Http\Requests\FightRequest;
use App\Http\Requests\FightStatusRequest;

class FightController extends Controller
{
    public function index()
    {
        $fights = Fight::with(['redFighter', 'blueFighter'])->orderBy('match_time')->get();
        $fighters = Fighter::orderBy('name')->get();

        return view('admin.fights.index', compact('fights', 'fighters'));
    }

    public function store(FightRequest $request)
    {
        Fight::create($request->validated());

        return redirect()->back()->with('success', 'Jadwal pertandingan berhasil ditambahkan!');
    }

    public function edit(Fight $fight)
    {
        $fighters = Fighter::orderBy('name')->get();
        return view('admin.fights.edit', compact('fight', 'fighters'));
    }

    public function update(FightRequest $request, Fight $fight)
    {
        $fight->update($request->validated());
        return redirect()->route('admin.fights.index')->with('success', 'Jadwal pertandingan berhasil diperbarui!');
    }

    public function updateStatus(FightStatusRequest $request, Fight $fight)
    {
        $data = $request->validated();
        $allowed = ['Upcoming' => ['Live'], 'Live' => ['Finished'], 'Finished' => []];

        if (! in_array($data['status'], $allowed[$fight->status] ?? [], true)) {
            return redirect()->back()->withErrors(['status' => 'Status hanya dapat bergerak dari Upcoming ke Live lalu Finished.']);
        }

        $fight->update($data);
        return redirect()->back()->with('success', 'Status fight berhasil diperbarui.');
    }

    public function destroy(Fight $fight)
    {
        $fight->delete();
        return redirect()->back()->with('success', 'Jadwal pertandingan berhasil dihapus!');
    }

    public function show(Fight $fight)
    {
        $fight->load(['redFighter', 'blueFighter']);
        return response()->view('fights.show', compact('fight'))->header('Cache-Control', 'no-store, max-age=0');
    }

    public function history()
    {
        $fights = Fight::with(['redFighter', 'blueFighter'])
            ->where('status', 'Finished')
            ->latest('match_time')
            ->paginate(9);

        return response()->view('fights.history', compact('fights'))->header('Cache-Control', 'no-store, max-age=0');
    }
}
