<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialiteController;

Route::get('/', function () {
    return view('auth.register');
});

// Route
Route::get('/', [AuthController::class, 'register'])->name('register');
Route::post('/', [AuthController::class, 'auth_register']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'auth_login']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/redirect', [SocialiteController::class, 'redirect'])->name('auth.socialite.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('auth.socialite.callback');

Route::group(['middleware' => ['auth', 'useradmin']], function () {
    Route::get('/tickets', function () {
        return view('welcome');
    });
});
