<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChartController;

use App\Models\Room;
use App\Models\Booking;

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

route::get('/',[HomeController::class,'home']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/home',[HomeController::class,'index']);

route::get('/create_room',[HomeController::class,'create_room']);

route::post('/add_room',[HomeController::class,'add_room']);

route::get('/view_room',[HomeController::class,'view_room']);

route::get('/room_delete/{id}',[HomeController::class,'room_delete']);

route::get('/room_update/{id}',[HomeController::class,'room_update']);

route::post('/room_details/{id}',[HomeController::class,'room_details']);

route::get('/edit_room/{id}',[HomeController::class,'edit_room']);

route::post('/add_booking/{id}',[HomeController::class,'add_booking']);

route::get('/room_details/{id}',[HomeController::class,'room_details']);

route::get('/bookings',[HomeController::class,'bookings']);

route::get('/delete_booking/{id}',[HomeController::class,'delete_booking']);

route::get('/approve_booking/{id}',[HomeController::class,'approve_booking']);

route::get('/reject_booking/{id}',[HomeController::class,'reject_booking']);

route::post('/contact',[HomeController::class,'contact']);

route::get('/all_messages',[HomeController::class,'all_messages']);

route::get('/send_mail/{id}',[HomeController::class,'send_mail']);

route::get('/send_verification/{id}',[HomeController::class,'send_verification']);

route::post('/mail/{id}',[HomeController::class,'mail']);

route::post('/verification/{id}',[HomeController::class,'verification']);

route::get('/user_chart',[ChartController::class,'user_chart']);

route::get('/room_chart',[ChartController::class,'room_chart']);












