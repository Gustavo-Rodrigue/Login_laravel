<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Página inicial
Route::get('/', [AuthController::class, 'home'])->name('home');

// Login
Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Cadastro
Route::get('/register', [AuthController::class, 'mostrarCadastro'])->name('register');
Route::post('/register', [AuthController::class, 'cadastrar']);

// Esqueceu a senha
Route::get('/forgot', [AuthController::class, 'mostrarEsqueciSenha'])->name('forgot');
Route::post('/forgot', [AuthController::class, 'processarEsqueciSenha']);
Route::get('/reset', [AuthController::class, 'mostrarRedefinir'])->name('reset');
Route::post('/reset', [AuthController::class, 'processarRedefinir']);

// Página de boas-vindas após login/cadastro
Route::get('/bem-vindo', [AuthController::class, 'bemVindo'])->middleware('auth')->name('bemvindo');
