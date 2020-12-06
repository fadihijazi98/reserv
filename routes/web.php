<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/show/{id}', function ($id) {

    $destination = \App\Destination::find($id);

    if(!$destination) {
        abort(404);
    }

   return view('destinations.show', compact('destination'));

});

Auth::routes(['reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cards', 'CardsController@index');
Route::post('/cards', 'CardsController@store');

Route::middleware(\App\Http\Middleware\AdminMode::class)->group(function () {
    Route::resource('/drivers', 'DriversController');
    Route::resource('/destinations', 'DestinationsController');
    Route::resource('/trips', 'TripsController');
    Route::get('/passengers_trip/{id}', 'TripsController@passengers');
    Route::delete('/passenger/{passenger}', 'PassengersController@destroy');
    Route::delete('/cards/{card}', 'CardsController@destroy');
});

Route::post('/passenger', 'PassengersController@store');
