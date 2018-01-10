<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('room_number')->nullable();
            $table->double('room_rate')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('duration')->nullable();
            $table->timestamp('arrival_date')->nullable();
            $table->timestamp('departure_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
