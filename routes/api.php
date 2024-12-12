<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfirmationController;

Route::get('/test', function () { return 'test'; });

Route::post('/confirmation/send-code', [ConfirmationController::class, 'sendCode']);
Route::post('/confirmation/verify-code', [ConfirmationController::class, 'verifyCode']);