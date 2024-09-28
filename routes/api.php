<?php

use App\Http\Controllers\Api\CoordinatesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('data', CoordinatesController::class, ['only' => ['store']]);
