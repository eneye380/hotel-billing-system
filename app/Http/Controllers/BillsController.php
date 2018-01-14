<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Bill;

class BillsController extends Controller
{
    public function index(){
        $bills = Bill::all();
        return view('bills.summary', compact('bills'));
    }

    public function receipt($billId){
        $bill = Bill::find($billId);
        return view('bills.receipt', compact('bill'));
    }

    public function bill($bookingId){
        $booking = Booking::find($bookingId);

        $fee = $booking->room_rate * $booking->duration;

        $bill = Bill::where('user_id',$booking->user_id)
                    ->where('hotel_id', $booking->hotel_id)
                    ->where('arrival_date', $booking->arrival_date)->first();
        if($bill){
            return redirect()->back()->with(["error"=>"Bill already calculated."]);
        }

        $bill = new Bill;
        $bill->user_id = $booking->user_id;
        $bill->hotel_id = $booking->hotel_id;
        $bill->room_number = $booking->room_number;
        $bill->room_rate = $booking->room_rate;
        $bill->duration = $booking->duration;
        $bill->arrival_date = $booking->arrival_date;
        $bill->bill = $fee;

        $bill->save();
        Booking::destroy($bookingId);
        //return $fee;
        return view('bills.bill')->with(compact('booking'))->with(compact('fee'));
    }
}
