<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Hotel;
use DB;

class RoomController extends Controller
{
    public function book(Request $request){
        $booking = Booking::where('user_id', $request->user_id)
                    ->where('hotel_id',$request->hotel_id)->first();
        if($booking){
            return response()->json(['redirect'=>"You have already made a booking."]);
        }
        $booking = Booking::where('room_number', $request->room_number)
                    ->where('hotel_id',$request->hotel_id)->first();
        if($booking){
            return response()->json(['redirect'=>"Booking $request->room_number already taken."]);
        }

        $book = Booking::create($request->all());
        return response()->json(['redirect'=>"true",'booking'=>$book]);
    }

    public function display($id)
    {
        $hotel = Hotel::findOrFail($id);
        $spaces = range(1, $hotel->capacity, 1);

        $booked = DB::table('bookings')
                ->where('hotel_id',$id)
                ->orderBy('room_number', 'asc')
                ->get();

        //$booked = range(10, 13);
        return view('customer.parkings')->with(compact('hotel'))->with(compact('spaces'))->with(compact('booked'));
    }

    public function ticket($id){
        $booking = Booking::find($id);
        $hotel = Hotel::find($booking->hotel_id);
        return view('customer.booking')->with(compact('booking'))->with(compact('hotel'));
    }
}
