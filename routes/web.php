<?php

use App\Http\Controllers\Frontend\CartItemController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\VendorVerificationController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;


// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// auth and verified routes
Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');


        // List Services
        Route::get('services/{category}', [ServiceController::class, 'show'])->name('services.show');

        // Cart items
        Route::resource('cart-items', CartItemController::class);


        // Vendor verification page
        Route::middleware(['vendor.verification'])->group(function () {
            Route::get('/vendor-verification', [VendorVerificationController::class, 'index'])->name('vendor-verification');
            Route::post('/vendor-verification', [VendorVerificationController::class, 'store'])->name('vendor-verification.store');
        });

        // Vendor services
        Route::middleware(['isVendor'])->group(function () {
            Route::get('services/vendor-services/{vendor}', [ServiceController::class, 'index'])->name('vendor-services.index');
            Route::get('services/vendor-services/create/{vendor}', [ServiceController::class, 'create'])->name('vendor-services.create');
            Route::post('services/vendor-services/create/', [ServiceController::class, 'store'])->name('vendor-services.store');
            Route::get('services/vendor-services/edit/{service}', [ServiceController::class, 'edit'])->name('vendor-services.edit');
            Route::put('services/vendor-services/update/{service}', [ServiceController::class, 'update'])->name('vendor-services.update');
            Route::delete('services/vendor-services/delete/{service}', [ServiceController::class, 'destroy'])->name('vendor-services.destroy');
        });

    });


require __DIR__ . '/auth.php';
