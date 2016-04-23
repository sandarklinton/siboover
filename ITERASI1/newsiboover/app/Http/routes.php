<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();


	
	
Route::group(['middlewareGroups' => ['web']], function () {
	Route::get('/', function () {

    if (Session::has('role')){
          $back = Session::get('role');
          
        if ($back !== 'driver') {
            # code...
        	return redirect()->route($back);
        }else{
          return redirect()->route('drivers');
		}
    }else{
		return view('auth/login');
      }
}) ->name('mula');
	   // Route::get('/home', 'HomeController@index') -> name('home');
	//view4logginginmenu
	Route::get('/customer', function(){
		$back = Session::get('role');
		if ($back!=='customer') {
			if ($back == 'driver') {
				return redirect()->route('drivers');
			}else
			return redirect()->route($back);
		}else
		return view('userview');
	}) -> name('customer');

	Route::get('/admin', function(){
		$back = Session::get('role');
		if ($back!=='admin') {
			if ($back == 'driver') {
				return redirect()->route('drivers');
			}else
			return redirect()->route($back);
		}else
		return view('adminview');
	}) -> name('admin');
	Route::get('/finance', function(){
		$back = Session::get('role');
		if ($back!=='finance') {
			if ($back == 'driver') {
				return redirect()->route('drivers');
			}else
			return redirect()->route($back);
		}else
		return view('financeview');
	}) -> name('finance');

	Route::get('/drivers', function(){
		$back = Session::get('role');
		if ($back!=='driver') {
			return redirect()->route($back);
		}else
		return view('driverview');
	}) -> name('drivers');



	//Route::get('/home/history', 'HistoryController@getHistory');

	//view 4 route loggedin


	//view 4 customer
	Route::get('/history', 'HistoryController@getHistory')->name('history'); //untuk customer
	Route::get('/booking', 'BookingController@getBookingForm')->name('booking');
	Route::post('/pickdriver', 'BookingController@getDriver')->name('pickdriver');
	Route::get('/pickdriver', 'BookingController@showDriver')->name('driverview');
	Route::get('/driverdetail/{username}', 'BookingController@getDriverDetail')->name('driverdetail');
	Route::post('/booking/{username}', 'BookingController@postBook');
	Route::get('/review/{idbook}', 'ReviewController@review')->name('review');
	Route::post('/review/{idbook}', 'ReviewController@tambahReview');
	Route::get('/cancelbooking/{idbook}', 'BookingController@cancelBooking');
	Route::post('/profile', 'UserController@updateProfile');



	//view 4 admin
	//Route::get('/history', 'HistoryController@getHistory')->name('history');
	Route::get('/managebooking', 'BookingController@manageBooking')->name('managebooking');
	Route::get('/manageaccount', 'UserController@manageAccount')->name('manageaccount');
	Route::get('/manageasset', 'AssetController@manageasset')->name('manageasset');
	Route::get('/managevehicle','AssetController@managevehicle')->name('managevehicle');
	Route::post('deletekendaraan/{nomorpolisi}','AssetController@destroy')->name('deletekendaraan');
	Route::get('/addvehicle', 'AssetController@addVehicle')->name('addvehicle');
	Route::post('/addvehicle', 'AssetController@addKendaraan')->name('addvehicle');
	Route::get('/profile', 'UserController@profile')->name('profile');
	Route::get('/vehicledetail/{nomorpolisi}', 'AssetController@vehicleDetail')->name('vehicledetail');
	Route::post('/vehicledetail/{nomorpolisi}', 'AssetController@updateVehicle');
	//Route Admin & Finance
	Route::get('/addmaintenance', 'MaintenanceController@addMaintenance')->name('addmaintenance');
	Route::post('/addmaintenance', 'MaintenanceController@tambahMaintenance');
	Route::get('/maintenancehistory', 'MaintenanceController@maintenanceHistory')->name('maintenancehistory');

	//Route Driver
	Route::get('/trips', 'DriverController@trips')->name('trips');
	Route::post('/trips', 'DriverController@addtrips');
	Route::get('/driverutility','DriverController@driver')->name('driverutility');
	Route::post('/bookinglist', 'DriverController@tambahPesanWarning');


	//Route::post('trips/{idmaintenance}', 'UploadController@handleUpload')->name('tripupload');
	Route::get('upload/{idmaintenance}', 'UploadController@upload')->name('upload');
	Route::post('doupload/{idmaintenance}', 'UploadController@handleUpload');
	Route::get('/bookinglist', 'DriverController@bookingList')->name('bookinglist');
	Route::get('/bookingdetails/{id}', 'DriverController@bookingDetails')->name('bookingdetails');
	//route undefined yet
	//Route::get('/booking', array('as' => 'booking', 'uses' => 'Main@booking'));
	

	
	
	

	


	
	//Route::get('/profileuser', array('as' => 'profileuser', 'uses' => 'Main@profileuser'));
	Route::get('/managevehiclef', array('as' => 'managevehiclef', 'uses' => 'Main@managevehiclef'));
	
	//Route::get('/trips', array('as' => 'trips', 'uses' => 'Main@trips'));
	
	
	Route::get('/bookingdetails', array('as' => 'bookingdetails', 'uses' => 'Main@bookingdetails'));
});
