<?php

use App\Http\Controllers\AuthSessionController;
use App\Http\Controllers\GeneratedKeyController;
use App\Http\Middleware\EnsureAdminIsAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('keys.index');
});

Route::get('/download/{token}', [GeneratedKeyController::class, 'publicDownload'])->name('keys.public-download');

Route::get('/login', [AuthSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthSessionController::class, 'store'])->name('login.store');

Route::middleware(EnsureAdminIsAuthenticated::class)->group(function (): void {
    Route::post('/logout', [AuthSessionController::class, 'destroy'])->name('logout');

    Route::get('/keys', [GeneratedKeyController::class, 'index'])->name('keys.index');
    Route::get('/keys/create', [GeneratedKeyController::class, 'create'])->name('keys.create');
    Route::post('/keys', [GeneratedKeyController::class, 'store'])->name('keys.store');
    Route::get('/keys/{key}', [GeneratedKeyController::class, 'show'])->name('keys.show');
    Route::get('/keys/{key}/download', [GeneratedKeyController::class, 'download'])->name('keys.download');
    Route::patch('/keys/{key}/status', [GeneratedKeyController::class, 'updateStatus'])->name('keys.status');
    Route::delete('/keys/{key}', [GeneratedKeyController::class, 'destroy'])->name('keys.destroy');
});
