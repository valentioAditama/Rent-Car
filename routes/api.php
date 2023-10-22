<?php

use App\Http\Controllers\api\Auth\AuthController;
use App\Http\Controllers\api\customer\BookingController;
use App\Http\Controllers\api\customer\ViewCarsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {
    // show cars
    Route::get('/cars', [ViewCarsController::class, 'index']);

    // booking cars
    Route::post('/cars', [BookingController::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);
});