<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FightController;
use App\Http\Controllers\FighterController;
use App\Models\Fight;

// Landing Page Utama (Mengambil data jadwal dari database)
Route::get('/', function () {
    $fights = Fight::with(['redFighter', 'blueFighter'])
                   ->orderBy('match_time', 'asc')
                   ->get();

    return response()->view('welcome', compact('fights'))->header('Cache-Control', 'no-store, max-age=0');
})->name('home');

Route::get('/fights/history', [FightController::class, 'history'])->name('fights.history');
Route::get('/fights/{fight}', [FightController::class, 'show'])->name('fights.show');
Route::get('/fighters/{fighter}', [FighterController::class, 'show'])->name('fighters.show');

// Dashboard User Biasa
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// GRUP ROUTE KHUSUS ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin Kelola Fight
    Route::get('/fights', [FightController::class, 'index'])->name('admin.fights.index');
    Route::post('/fights', [FightController::class, 'store'])->name('admin.fights.store');
    Route::get('/fights/{fight}/edit', [FightController::class, 'edit'])->name('admin.fights.edit');
    Route::put('/fights/{fight}', [FightController::class, 'update'])->name('admin.fights.update');
    Route::patch('/fights/{fight}/status', [FightController::class, 'updateStatus'])->name('admin.fights.status');
    Route::delete('/fights/{fight}', [FightController::class, 'destroy'])->name('admin.fights.destroy');

    // Admin Kelola Fighter
    Route::resource('fighters', FighterController::class)->except('show')->names('admin.fighters');
});

// ROUTE PROFILE USER
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
