<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FlightController;
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


Route::resource('cities', CityController::class);

Route::resource('airlines', AirlineController::class);

Route::resource('flights',FlightController::class);
