<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailLogController;
use App\Http\Controllers\ChangePasswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email-logs', [EmailLogController::class, 'index'])->name('email.logs');

Route::get('/birthday', function () {
    return view('birthday');
});

Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->middleware('auth');
Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->middleware('auth');

// Route::get('/change-password', function () {
//     return view('change-password');
// })->middleware('auth');  // optional, if you want only logged-in users to see it

Route::get('/change-password', function () {
    return view('change-password');
});


Route::get('/change-password', [ChangePasswordController::class, 'showForm']);
Route::post('/change-password', [ChangePasswordController::class, 'changePassword']);

// Password changed confirmation page
Route::get('/password-changed', function () {
    return view('password-changed');
})->name('password-changed');


// Instructor message page
Route::get('/instructor-message', function () {
    return view('instructor-message');
});
