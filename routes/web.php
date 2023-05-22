<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {

    Route::get('/', [LoginController::class, 'showLoginForm'])->name('show.login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('show.registration.form');
    Route::post('/register', [RegisterController::class, 'registration'])->name('registration');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('showForgotPasswordForm');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot.password.request');

    Route::get('/password/reset', [ResetPasswordController::class, 'showPasswordResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'passwordReset'])->name('password.reset.request');

    Route::get('/google/login', [GoogleController::class, 'login'])->name('google.login');
    Route::any('/google/callback', [GoogleController::class, 'googleCallback'])->name('google.callback');

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Это вью с кнопкой дополнительного запроса
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Этот эндпоинт будет в сообщение отправленном на эмейл для завершения регистрации
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Отправка письма
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

