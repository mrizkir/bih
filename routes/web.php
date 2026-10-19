<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/term', [HomeController::class, 'term'])->name('term');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'disablepreventback'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/indikator/{indicator}/cetak', [IndicatorController::class, 'print'])->name('indikator.cetak');
    Route::get('/indikator/{indicator}', [IndicatorController::class, 'index'])->name('indikator.index');
    Route::post('/indikator/{indicator}', [IndicatorController::class, 'store'])->name('indikator.store');
    Route::put('/indikator/{indicator}/{record}', [IndicatorController::class, 'update'])
        ->where('record', '.*')
        ->name('indikator.update');
    Route::delete('/indikator/{indicator}/{record}', [IndicatorController::class, 'destroy'])
        ->where('record', '.*')
        ->name('indikator.destroy');

    Route::middleware('role:superadmin')->group(function () {
        Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');
        Route::post('/pengguna', [UserController::class, 'store'])->name('pengguna.store');
        Route::post('/pengguna/{user}', [UserController::class, 'update'])->name('pengguna.update');
        Route::delete('/pengguna/{user}', [UserController::class, 'destroy'])->name('pengguna.destroy');
    });
});
