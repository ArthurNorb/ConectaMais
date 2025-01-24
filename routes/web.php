<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContatoController;

Route::get('/', [ContatoController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/contacts/create', [ContactController::class, 'create']);

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::resources(['contatos' => ContatoController::class]);