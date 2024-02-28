<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use App\Notifications\SendEmailVerification;

use Illuminate\Support\Facades\Notification;


class HomeController extends Controller
{
    public function index() {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == '0') {
                $room = Room::all();
                return view('home.index', compact('room'));
            }elseif ($usertype == '1') {
                return view ('admin.index');
            }else {
                return redirect()->back();
            }
            
        }
    }


    public function verification(Request $request, $id) {
        $data = Booking::find($id);
        $details = [
            'greeting' => $request -> greeting,
            'body' => $request -> body,
            'endline' => $request -> endline,
        ];
        Notification::send($data, new SendEmailVerification($details));
        return redirect()->back();
    }

    public function send_verification($id)  {
        $data = Booking::find($id);
        return view('admin.send_verification', compact('data'));
    }

    public function mail(Request $request, $id) {
        $data = Contact::find($id);
        $details = [
            'greeting' => $request -> greeting,
            'body' => $request -> body,
            'endline' => $request -> endline,
        ];
        Notification::send($data, new SendEmailNotification($details));
        return redirect()->back();
    }

    public function send_mail($id) {
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }

    public function all_messages()  {

        $data = Contact::all();

        return view ('admin.all_messages', compact('data'));

    }

    public function contact (Request $request) {
        $contact = new Contact;
        $contact ->name = $request-> name;
        $contact ->email = $request-> email;
        $contact ->phone = $request-> phone;
        $contact ->message = $request-> message;
        $contact->save();
        return redirect()->back()->with('message', 'Message Sent Successfully!');
    }

    public function reject_booking($id)  {
        $booking = Booking::find($id);
        $booking->status='Rejected';
        $booking->save();
        return redirect()->back();
    }

    public function approve_booking($id)  {
        $booking = Booking::find($id);
        $booking->status='Approved';
        $booking->save();
        return redirect()->back();
    }

    public function delete_booking($id) {
        $data  = Booking::find($id);
        $data-> delete();
        return redirect()->back();
    }

    public function add_booking(Request $request, $id){

        $request->validate([
            'startDate' => 'required|date',
            'endDate'=> 'date|after:startDate',
        ]);

        $data = new Booking;
        $data->room_id = $id;
        $data ->name = $request->name;
        $data ->email = $request->email;
        $data ->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
        ->where('start_date', '<=', $endDate)
        ->where('end_date', '>=', $startDate)->exists();

        if ($isBooked) {
            return redirect()->back()->with('message', 'Room Already Booked Pleased try different date!');
        }
        else{
            $data ->start_date = $request->startDate;
            $data ->end_date = $request->endDate;
            $data->save();
            return redirect()->back()->with('message', 'Room Booked Succesfully!');
        }



        $data ->start_date = $request->startDate;
        $data ->end_date = $request->endDate;

    }

    public function bookings(){
        $data=Booking::all();
        return view('admin.booking', compact('data'));
    }

    public function home() {
        $room = Room::all();
        return view('home.index', compact('room'));
    }

    public function create_room(){
        return view('admin.create_room');
    }

    public function view_room() {

        $data = Room::all();
        return view('admin.view_room', compact('data'));

    }

    public function room_details($id) {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));

    }

    public function room_delete($id) {
        $data = Room::find($id);
        
        $data->delete();
        return redirect()->back();
    }

    public function room_update($id) {
        $data = Room::find($id);
        return view('admin.update_room', compact ('data'));
    }

    public function edit_room(Request $request, $id) {
        $data = Room::find($id);

        $data-> room_title = $request->title;
        $data-> room_description = $request->description;
        $data-> room_price =$request -> price;
        $data-> roomtype = $request -> roomtype;

        $image = $request->uploadimages;
        if ($image) {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->uploadimages->move('room',$imagename);
            $data->room_image=$imagename;
        }

        $data->save();
        return redirect()->back();
    }

    public function add_room(Request $request) {
        $data = new Room();
        $data->room_title = $request->title;
        $data->room_description = $request->description;
        $data->room_price = $request->price;
        $data->roomtype = $request->roomtype;

        $image = $request->uploadimages;
        if ($image) {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->uploadimages->move('room',$imagename);
            $data->room_image=$imagename;
        }

        $data->save();
        return redirect()->back();
    }

}