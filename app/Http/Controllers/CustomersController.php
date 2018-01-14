<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Booking;
use Sentinel;

class CustomersController extends Controller
{
    public function index(){
        $hotels = Hotel::all();
        $bookings = Booking::where('user_id', Sentinel::check()->id)->get();
        return view('customer.index')->with(compact('hotels'))->with(compact('bookings'));
    }
}
