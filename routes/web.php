<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\IslandTourController;
use App\Http\Controllers\MoreDetailController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BoatTourController;
use App\Http\Controllers\CombinationTourController;

// Regular user routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/island-tour', [IslandTourController::class, 'index'])->name('island-tour');

Route::get('/boat-tour', [BoatTourController::class, 'index'])->name('boat-tour');

Route::get('/combination-tour', [CombinationTourController::class, 'index'])->name('combination-tour');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/more-detail', function () {
    return view('pages.more_detail');
})->name('more-detail');

Route::get('/more-details/{id}', [PackageController::class, 'show'])->name('more.details');

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::post('/register', [AuthController::class, 'register']);

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin-page.dashboard');
    })->name('admin.dashboard');

    Route::get('/add-package', function () {
        return view('admin-page.add_package');
    })->name('admin.add-package');

    Route::get('/view-order', [BookingController::class, 'index'])->name('admin.view-order');

    Route::get('/view-package', [PackageController::class, 'index'])->name('admin.view-package');

    Route::get('/view-recommended-package', function () {
        return view('admin-page.view_recommended_package');
    })->name('admin.view-recommended-package');

    Route::post('/packages', [PackageController::class, 'store'])->name('packages.store');

    Route::delete('/admin/package/{id}', [PackageController::class, 'destroy'])->name('packages.destroy');

    Route::put('/admin/packages/{id}', [PackageController::class, 'update'])->name('packages.update');

    Route::post('/bookings/{id}/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');

    Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');

    Route::delete('/admin/booking/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});
