<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)
    ->group(function() {
        Route::get('/login', 'login')->name('login');
        Route::post('/log', 'index')->name('login.form');
    });