<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'logar'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource(
            'produtos',
            App\Http\Controllers\ProdutosController::class
        );
    }
);
