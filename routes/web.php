<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siswa\AuthController;
use App\Http\Controllers\Siswa\RegisterController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('siswa')->name('siswa.')->group(function () {
    
    Route::middleware('guest:siswa')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])
            ->name('login');
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/register', [RegisterController::class, 'showRegister'])
            ->name('register');
        Route::post('register', [RegisterController::class, 'register']);
    });

    Route::middleware('auth:siswa')->group(function () {
        Route::view('/dashboard', 'siswa.dashboard')->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});



