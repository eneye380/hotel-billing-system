<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('visitor.index');
});
Route::group(['middleware'=>'visitors'], function () {
    Route::get('/login', function(){
        return view('visitor.login');
    });
    Route::get('/register', function(){
        return view('visitor.register');
    });
    
    Route::post('/login-me', 'LoginMeController@login')->name('login-me');

    Route::get('/admin', 'AdminController@show');
Route::post('/admin', 'AdminController@login');
});
Route::group(['middleware'=>'loggedin'], function () {
    Route::resource('admin/hotels', 'HotelsController');
Route::resource('admin/bookings', 'BookingsController');
Route::get('hotel/{id}/bookings', 'BookingHotelController@index');
Route::get('booking/{id}/bill', 'BillsController@bill');
Route::get('admin/bills', 'BillsController@index');
Route::get('bill/{id}/receipt', 'BillsController@receipt');

Route::get('/customer','CustomersController@index');
Route::get('/customer/hotels/{id}','RoomController@display');
    Route::post('/customer/hotels','RoomController@book');
    Route::get('/customer/booking/{id}','RoomController@ticket');
});
Route::post('/logout', 'LoginMeController@logout');
Route::resource('users', 'UsersController');


