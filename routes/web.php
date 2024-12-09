<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImoveisController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource("/imoveis", ImoveisController::class);

Route::get('/imoveis/search', [ImoveisController::class, 'search'])->name('imoveis.search');

Route::get('/imoveis/create', [ImoveisController::class, 'create'])->name('imoveis.create');

Route::resource('imoveis', ImoveisController::class);
