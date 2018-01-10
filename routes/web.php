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

Route::resource('admin/hotels', 'HotelsController');

Route::resource('users', 'UsersController');

Route::get('/login', function(){
    return view('visitor.login');
});
Route::get('/register', function(){
    return view('visitor.register');
});

Route::post('/login-me', 'LoginMeController@login')->name('login-me');

Route::post('/logout', 'LoginMeController@logout');

Route::get('/admin', 'AdminController@show');
Route::post('/admin', 'AdminController@login');

