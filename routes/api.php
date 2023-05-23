<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('updateUser', [AuthController::class, 'updateUser']);

    // New routes for user settings
    Route::get('user/{userId}/settings', [SettingsController::class, 'getUserSettings']);
    Route::patch('user/{userId}/settings', [SettingsController::class, 'updateUserSettings']);
});



