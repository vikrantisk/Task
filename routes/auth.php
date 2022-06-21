<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\User\{CarController, TruckController, BoatController};
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    // Routes for car management
    Route::get('cars', [CarController::class, 'index'])->name('cars.index');

    Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');

    Route::post('cars', [CarController::class, 'store'])->name('cars.store');

    Route::get('cars/{car}', [CarController::class, 'show'])->name('cars.show');

    Route::patch('cars/{car}', [CarController::class, 'update'])->name('cars.update');

    Route::delete('cars/{car}', [CarController::class, 'destroy'])->name('cars.delete');

    // Routes for truck management
    Route::get('trucks', [TruckController::class, 'index'])->name('trucks.index');

    Route::get('trucks/create', [TruckController::class, 'create'])->name('trucks.create');

    Route::post('trucks', [TruckController::class, 'store'])->name('trucks.store');

    Route::get('trucks/{truck}', [TruckController::class, 'show'])->name('trucks.show');

    Route::patch('trucks/{truck}', [TruckController::class, 'update'])->name('trucks.update');

    Route::delete('trucks/{truck}', [TruckController::class, 'destroy'])->name('trucks.delete');

    // Routes for boat management
    Route::get('boats', [BoatController::class, 'index'])->name('boats.index');

    Route::get('boats/create', [BoatController::class, 'create'])->name('boats.create');

    Route::post('boats', [BoatController::class, 'store'])->name('boats.store');

    Route::get('boats/{boat}', [BoatController::class, 'show'])->name('boats.show');

    Route::patch('boats/{boat}', [BoatController::class, 'update'])->name('boats.update');

    Route::delete('boats/{boat}', [BoatController::class, 'destroy'])->name('boats.delete');
});
