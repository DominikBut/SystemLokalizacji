<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/location', function () {
        return view('location');
    })->name('location');

    Route::prefix('management')->name('management.')->group(function () {

        Route::get('/vehicles', function () {
            return view('vehicles');
        })->name('vehicles');

        Route::get('/history', function () {
            return view('history');
        })->name('history');

        Route::get('/fence', function () {
            return view('fence');
        })->name('fence');
    });
});
