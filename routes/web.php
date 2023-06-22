<?php

use App\Http\Controllers\Admin\InqueryController as AdminInqueryController;
use App\Http\Controllers\Admin\OwnersCarController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\ShowCarsController;
use App\Http\Controllers\Admin\TrippedHistroyController;
use App\Http\Controllers\Customer\BookingController;
use App\Http\Controllers\Customer\ViewCarsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// customer
Route::get('/', [ViewCarsController::class, 'index'])->name('index.customer');
Route::get('/search', [ViewCarsController::class, 'search'])->name('index.customer.search');

// Booked Cars
Route::prefix('booked')->group(function () {
    Route::post('/store', [BookingController::class, 'store'])->name('index.booked.store');
    Route::post('/update/{id}', [BookingController::class, 'update'])->name('index.booked.update');
    Route::delete('/delete/{id}', [BookingController::class, 'destroy'])->name('index.booked.destroy');
});

// ================

// admin
Route::prefix('admin')->group(function () {
    // registration custoemr
    Route::get('/registration', [RegistrationController::class, 'index'])->name('index.admin.registration');
    Route::get('/show-cars', [ShowCarsController::class, 'index'])->name('index.admin.show-cars');

    // owner cars
    Route::prefix('owner-cars')->group(function () {
        Route::get('/search', [OwnersCarController::class, 'search'])->name('index.admin.search');
        Route::get('/create', [OwnersCarController::class, 'create'])->name('index.admin.create');
        Route::get('/edit/{id}', [OwnersCarController::class, 'edit'])->name('index.admin.edit');

        Route::post('/store', [OwnersCarController::class, 'store'])->name('admin.owner-cars.store');
        Route::post('/update/{id}', [OwnersCarController::class, 'update'])->name('admin.owner-cars.update');
        Route::delete('/delete/{id}', [OwnersCarController::class, 'destroy'])->name('admin.owner-cars.destroy');
    });

    // inquery
    Route::get('/inquery', [AdminInqueryController::class, 'index'])->name('index.admin.inquery');
    Route::prefix('inquery')->group(function () {
        Route::post('/update/{id}', [AdminInqueryController::class, 'update'])->name('admin.inquery.update');
        Route::delete('/delete/{id}', [AdminInqueryController::class, 'destroy'])->name('admin.inquery.destroy');
    });

    // tripped history
    Route::get('/tripped-history', [TrippedHistroyController::class, 'index'])->name('index.admin.tripped-history');
    Route::prefix('tripped-history')->group(function () {
        Route::get('/add', [TrippedHistroyController::class, 'add'])->name('admin.tripped-history.add');
        Route::post('/store', [TrippedHistroyController::class, 'store'])->name('admin.tripped-history.store');
        Route::post('/update/{id}', [TrippedHistroyController::class, 'update'])->name('admin.tripped-history.update');
        Route::delete('/delete/{id}', [TrippedHistroyController::class, 'destroy'])->name('admin.tripped-history.destroy');
    });
});
