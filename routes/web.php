<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailLogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email-logs', [EmailLogController::class, 'index'])->name('email.logs');

Route::get('/birthday', function () {
    return view('birthday');
});
