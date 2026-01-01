<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController; // TAMBAHKAN INI
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// GANTI ROUTE INI: Jangan panggil view langsung!
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Resource Routes
Route::resource('penduduk', PendudukController::class)->middleware('auth');
Route::resource('surat', SuratController::class)->middleware('auth');
Route::get('/surat/{id}/cetak', [SuratController::class, 'cetak'])->name('surat.cetak');
require __DIR__.'/auth.php';