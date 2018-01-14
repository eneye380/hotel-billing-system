<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;

class BookingHotelController extends Controller
{
    public function index($hotelId){
        $hotel = Hotel::find($hotelId);
$bookings = $hotel->bookings;
        return view('bookings.index')->with(compact('bookings'))->with(compact('hotel'));
    }
}
