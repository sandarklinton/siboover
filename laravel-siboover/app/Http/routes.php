<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','Main@index');
Route::get('/home', array('as' => 'home', 'uses' => 'Main@home'));
Route::get('/booking', array('as' => 'booking', 'uses' => 'Main@booking'));
Route::get('/profile', array('as' => 'profile', 'uses' => 'Main@profile'));
Route::get('/history', array('as' => 'history', 'uses' => 'Main@history'));
Route::get('/managebooking', array('as' => 'managebooking', 'uses' => 'Main@managebooking'));
Route::get('/manageasset', array('as' => 'manageasset', 'uses' => 'Main@manageasset'));
Route::get('/manageaccount', array('as' => 'manageaccount', 'uses' => 'Main@manageaccount'));
Route::get('/managevehicle', array('as' => 'managevehicle', 'uses' => 'Main@managevehicle'));
Route::get('/addvehicle', array('as' => 'addvehicle', 'uses' => 'Main@addvehicle'));
Route::get('/vehicledetail', array('as' => 'vehicledetail', 'uses' => 'Main@vehicledetail'));
Route::get('/pickdriver', array('as' => 'pickdriver', 'uses' => 'Main@pickdriver'));
Route::get('/driverdetail', array('as' => 'driverdetail', 'uses' => 'Main@driverdetail'));
Route::get('/review', array('as' => 'review', 'uses' => 'Main@review'));
Route::get('/profileuser', array('as' => 'profileuser', 'uses' => 'Main@profileuser'));
Route::get('/managevehiclef', array('as' => 'managevehiclef', 'uses' => 'Main@managevehiclef'));
Route::get('/addmaintenance', array('as' => 'addmaintenance', 'uses' => 'Main@addmaintenance'));
Route::get('/trips', array('as' => 'trips', 'uses' => 'Main@trips'));
Route::get('/driver', array('as' => 'driver', 'uses' => 'Main@driver'));
Route::get('/bookinglist', array('as' => 'bookinglist', 'uses' => 'Main@bookinglist'));
Route::get('/bookingdetails', array('as' => 'bookingdetails', 'uses' => 'Main@bookingdetails'));

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
