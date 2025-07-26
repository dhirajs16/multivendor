<?php

use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\VendorVerificationController;
use Illuminate\Support\Facades\Route;


// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// auth and verified routes
Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('isVendor');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');


        // Vendor verification page
        Route::middleware(['vendor.verification'])->group(function () {
            Route::get('/vendor-verification', [VendorVerificationController::class, 'index'])->name('vendor-verification');
            Route::post('/vendor-verification', [VendorVerificationController::class, 'store'])->name('vendor-verification.store');
        });
    });


require __DIR__ . '/auth.php';
