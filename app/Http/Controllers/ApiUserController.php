<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


class ApiUserController extends Controller
{
    public function index() {
        $users = User::all();
        return response()->json(['message' => 'GET request received successfully', 'data' => $users]);
    }
    
    public function store(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password); 
    
        $user->save();
    
        return response()->json(['user' => $user]); 
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return response()->json(['user' => $user]);
    }

    public function destroy($id) {
        $room = User::find($id);
        $room->delete();
        return response()->json(['message' => "Successfully deleted!"]);
    }
}
