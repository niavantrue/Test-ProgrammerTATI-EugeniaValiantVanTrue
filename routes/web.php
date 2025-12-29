<?php

use App\Http\Controllers\LogHarianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerifikasiLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('log-harian', LogHarianController::class)
        ->only(['index', 'create', 'store']);

    Route::get('verifikasi-log', [VerifikasiLogController::class, 'index'])
        ->name('verifikasi.index');

    Route::post('log/{log}/approve', [VerifikasiLogController::class, 'approve'])
        ->name('log.approve');

    Route::post('log/{log}/reject', [VerifikasiLogController::class, 'reject'])
        ->name('log.reject');

    Route::get('verifikasi-history', [VerifikasiLogController::class, 'history'])
        ->name('verifikasi.history');
});

require __DIR__.'/auth.php';

