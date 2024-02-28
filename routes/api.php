<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiRoomController;
use App\Http\Controllers\ApiBookingController;
use App\Http\Controllers\ApiUserController;



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

Route::apiResource('users', ApiUserController::class);
Route::apiResource('rooms', ApiRoomController::class);
Route::apiResource('bookings', ApiBookingController::class);