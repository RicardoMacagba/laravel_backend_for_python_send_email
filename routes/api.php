<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\EmailController;
use App\Http\Controllers\LaravelMailController;
use App\Http\Controllers\EmailLogController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::post('/send-email', [EmailController::class, 'send']);

//Route::post('/send-email', [EmailController::class, 'sendEmail']);

Route::post('/send-mail', [LaravelMailController::class, 'send']);

Route::get('/email-log', [EmailLogController::class, 'store']);

