<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\DriverController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('passenger')->group(function () {
Route::post('ride', [PassengerController::class,'createRide']);
Route::post('ride/{ride}/approve-driver', [PassengerController::class,'approveDriver']);
Route::post('ride/{ride}/complete', [PassengerController::class,'completeRide']);
});


Route::prefix('driver')->group(function () {
Route::post('location', [DriverController::class,'updateLocation']);
Route::get('nearby-rides', [DriverController::class,'nearbyRides']);
Route::post('ride/{ride}/request', [DriverController::class,'requestRide']);
Route::post('ride/{ride}/complete', [DriverController::class,'completeRide']);
});
