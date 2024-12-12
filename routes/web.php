<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ConfirmationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/confirmation', [ConfirmationController::class, 'index']);

Route::prefix('api')->group(function () {
    Route::middleware('api')->group(base_path('routes/api.php'));
});