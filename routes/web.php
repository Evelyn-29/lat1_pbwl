<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{npm}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{npm}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{npm}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    // Trash & Restore
    Route::get('/mahasiswa/trash', [MahasiswaController::class, 'trash'])->name('mahasiswa.trash');
    Route::post('/mahasiswa/{npm}/restore', [MahasiswaController::class, 'restore'])->name('mahasiswa.restore');
    Route::delete('/mahasiswa/{npm}/force', [MahasiswaController::class, 'forceDelete'])->name('mahasiswa.forceDelete');
});

require __DIR__ . '/auth.php';
