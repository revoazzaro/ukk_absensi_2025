<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.app');
});

Route::controller(App\Http\Controllers\AuthController::class)->group(function() {
    Route::middleware('guest')->group(function() {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'login');
    });

    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function() {
    Route::controller(App\Http\Controllers\KaryawanController::class)->group(function() {
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile', 'update_profile');

        Route::middleware('role:admin')->group(function() {
            Route::get('/karyawan', 'index')->name('karyawan_list');
            Route::get('/karyawan/create', 'create')->name('karyawan_create');
            Route::post('/karyawan/create', 'store');
            Route::get('/karyawan/{id}/edit', 'edit')->name('karyawan_edit');
            Route::post('/karyawan/{id}/edit', 'update');
            Route::get('/karyawan/{id}/delete', 'destroy')->name('karyawan_delete');
        });
    });

    Route::controller(App\Http\Controllers\AbsensiController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');

        Route::middleware('role:karyawan')->group(function() {
            Route::get('/absensi', 'index')->name('absensi');
            Route::post('/absensi', 'proses_absensi');
        });
    });
});         
