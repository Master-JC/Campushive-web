<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;


class ApiBookingController extends Controller
{
    public function index() {
        $bookings = Booking::all();
        return response()->json(['message' => 'GET request received successfully', 'data' => $bookings]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'room_id' => 'required|exists:rooms,id', 
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
    
        $booking = new Booking();
        $booking->room_id = $request->room_id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $booking->save();
    
        return response()->json(['booking' => $booking]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
    
        $booking = Booking::find($id);
    
        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }
    
        $booking->room_id = $request->room_id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
    
        $booking->save();
    
        return response()->json(['booking' => $booking]);
    }

    public function destroy($id) {
        $room = Booking::find($id);
        $room->delete();
        return response()->json(['message' => "Successfully deleted!"]);
    }


}
