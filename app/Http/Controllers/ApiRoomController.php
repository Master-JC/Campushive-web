<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;


class ApiRoomController extends Controller
{
    public function index() {
        $rooms = Room::all();
        return response()->json(['message' => 'GET request received successfully', 'data' => $rooms]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'room_title' => 'required|string',
            'room_image' => 'nullable|string', 
            'room_description' => 'required|string',
            'room_price' => 'required|numeric',
            'roomtype' => 'required|string',
        ]);
    
        $imageName = null;
        if ($request->hasFile('room_image')) {
            $image = $request->file('room_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else if ($request->has('room_image')) {
            $imageName = $request->room_image; 
        }
    
        $room = new Room();
        $room->room_title = $request->room_title;
        $room->room_image = $imageName;
        $room->room_description = $request->room_description;
        $room->room_price = $request->room_price;
        $room->roomtype = $request->roomtype;
        $room->save();
    
        return response()->json(['room' => $room]);
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'room_title' => 'required|string',
            'room_image' => 'nullable|string', 
            'room_description' => 'required|string',
            'room_price' => 'required|numeric',
            'roomtype' => 'required|string',
        ]);
    
        $room = Room::find($id);
    
        if (!$room) {
            return response()->json(['error' => 'Room not found'], 404);
        }
    
        $room->room_title = $request->room_title;
        $room->room_description = $request->room_description;
        $room->room_price = $request->room_price;
        $room->roomtype = $request->roomtype;
    
        if ($request->hasFile('room_image')) {
            $image = $request->file('room_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $room->room_image = $imageName;
        } elseif ($request->has('room_image')) {
            $room->room_image = $request->room_image;
        }
    
        $room->save();
    
        return response()->json(['room' => $room]);
    }
    
    public function destroy($id) {
        $room = Room::find($id);
        $room->delete();
        return response()->json(['message' => "Successfully deleted!"]);
    }

}
