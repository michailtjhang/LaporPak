<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\System\MenuController;
use App\Http\Controllers\System\RoleController;
use App\Http\Controllers\System\ReportController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\System\UserController;

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
    Route::get('/dashboard', [MenuController::class, 'dashboard'])->name('dashboard');

    Route::get ('/about', [MenuController::class, 'about'])->name('about');
    Route::get ('/faq', [MenuController::class, 'faq'])->name('faq');
    Route::get ('/contact', [MenuController::class, 'contact'])->name('contact');
    Route::get ('/privacy-policy', [MenuController::class, 'privacy_policy'])->name('privacy-policy');

    Route::resource('tickets', ReportController::class);
    Route::resource('role', RoleController::class);
    Route::resource('users', UserController::class);
});
