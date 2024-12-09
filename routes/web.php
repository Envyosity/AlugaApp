<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImoveisController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rota principal: se o usuário estiver logado, redireciona para o painel, senão para o login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Rota do painel (dashboard) após o login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rota para o perfil do usuário, só acessível quando estiver autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas para os imóveis: CRUD completo com recursos do controller
Route::middleware('auth')->group(function () {
    // Rota para listar, criar, editar, excluir imóveis
    Route::resource('imoveis', ImoveisController::class);

    // Rota para pesquisa de imóveis
    Route::get('/imoveis/search', [ImoveisController::class, 'search'])->name('imoveis.search');
});

require __DIR__.'/auth.php';  // Rota de autenticação



