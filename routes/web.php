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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Reservations
Route::get('/reservations', 'ReservationController@index');
Route::post('/reservations', 'ReservationController@store');
Route::get('/reservations/{reservation}', 'ReservationController@show');
Route::get('/reservations/create/{flight}', 'ReservationController@create');
Route::delete('/reservations/{reservation}', 'ReservationController@destroy');
//Flights
Route::get('/flights', 'FlightController@index');
//Places
Route::get('/places', 'PlaceController@index');
Route::post('/places', 'PlaceController@store');
Route::get('/places/{place}', 'PlaceController@show');