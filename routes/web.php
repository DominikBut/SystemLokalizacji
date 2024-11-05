<?php

use App\Models\User;
use App\Mail\SendAlert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OldMapController;

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

    Route::get('/routes', function () {
        return view('routes');
    })->name('routes');

    Route::prefix('management')->name('management.')->group(function () {

        Route::get('/vehicles', function () {
            return view('vehicles');
        })->name('vehicles');

        Route::get('/history', function () {
            return view('history');
        })->name('history');

        Route::get('/geofence', function () {
            return view('geofence');
        })->name('fence');

        Route::get(
            '/historymap',
            [OldMapController::class, 'showMap']
        )->name('oldmap');
    });
    Route
        ::get('/test', function () {
            $name = "xddd";
            $id = "894806152";
            $data = '2323432';
            $ten = User::where('id', auth()->id())->first();
            Mail::to($ten->email)->send(new SendAlert($name, $id, $data));
        });
    Route::get('/mailable', function () {
        $name = "xddd";
        $id = "894806152";
        $data = '2323432';
        return new SendAlert($name, $id, $data);
    });
});
