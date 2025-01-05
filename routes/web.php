<?php

use App\Models\User;
use App\Mail\SendAlert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\OldMapController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
})->name('about');

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
    Route::get('/test/{email}', function ($email) {
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Zły adres'], 400);
        }

        $name = "BMW M5 Touring";
        $id = "555555555";
        $data = '2024-11-05 00:16:16';

        Mail::to($email)->send(new SendAlert($name, $id, $data));
        return "Wysłano na email: {$email}";
    });
    Route::get('/mailable', function () {
        $name = "BMW M5 Touring";
        $id = "555555555";
        $data = '2024-11-05 00:16:16';
        return new SendAlert($name, $id, $data);
    });
});
