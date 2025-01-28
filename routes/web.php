<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::middleware('sentinel.noAuth')->group(
    function () {
        Route::get('/login', [AuthController::class, 'index'])->name('login.page');
        Route::post('/login', [AuthController::class, 'login'])->name('login.action');
    }
);

Route::middleware('sentinel.auth')->group(
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource(
            'produtos',
            App\Http\Controllers\ProdutosController::class
        );
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);
