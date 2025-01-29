<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('sentinel.noAuth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.page');
    Route::post('/login', [AuthController::class, 'login'])->name('login.action');
});

Route::middleware('sentinel.auth')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('produtos', App\Http\Controllers\ProdutosController::class);
    Route::resource('banners', App\Http\Controllers\BannersController::class);
    Route::post('banners/{id}', [App\Http\Controllers\BannersController::class, 'update'])->name('banners.update');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
