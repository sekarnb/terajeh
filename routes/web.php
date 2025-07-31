<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\LandingController;

// public routes
Route::get('/', [LandingController::class, 'index'])->name('pages.index');

Route::get('/reservasi', [ReservasiController::class, 'reservasi'])->name('pages.reservasi');
Route::post('/reservasi', [ReservasiController::class, 'store']);
Route::get('/reservasi/order', [ReservasiController::class, 'order'])->name('pages.order');
Route::get('/reservasi/checkout', [ReservasiController::class, 'checkout'])->name('pages.checkout');
Route::get('/reservasi/payment', [ReservasiController::class, 'payment'])->name('pages.payment');

// authentication routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

// admin panel routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::prefix('kategori')->name('categories.')->controller(KategoriController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{category}', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('destroy');
    });

    Route::prefix('menu')->name('menu.')->controller(MenuController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{menu}', 'update')->name('update');
        Route::delete('/{menu}', 'destroy')->name('destroy');
    });

    Route::prefix('reservasi')->name('reservasi.')->controller(ReservasiController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/{reservasi}', 'update')->name('update');
        Route::delete('/{reservasi}', 'destroy')->name('destroy');
    });
});
