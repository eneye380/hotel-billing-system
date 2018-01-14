<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name', 'address', 'user_id', 'capacity'
    ];

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function bills(){
        return $this->hasMany(Bill::class);
    }
}
