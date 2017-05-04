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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('sites/index');
// });

Route::group(['namespace' => 'V1'], function() {
	Route::get('/', 'TransferController@index');
	Route::get('/private-transfer', 'TransferController@privateTransfer');
	Route::get('/private-transfer/view/{slug}/{transferName_id}', 'TransferController@viewTransfer');
	Route::get('/private-transfer/package/{slug}', 'TransferController@detailTransfer');
	Route::get('/airport-transfer', 'TransferController@airportTransfer');
	Route::get('/airport-transfer/view/{slug}/{transferName_id}', 'TransferController@viewAirportTransfer');
	Route::get('/airport-transfer/package/{slug}', 'TransferController@detailAirportTransfer');
	Route::post('/book-transfer/{slug}', 'TransferBookingController@bookForm');
	Route::post('/book-transfer/confirmation/', 'TransferBookingController@confirmation');
});

Route::get('/admin', 'TransferController@index');

Route::get('/places', 'PlaceController@index');
Route::get('/place/create', 'PlaceController@create');
Route::post('/place', 'PlaceController@store');
Route::get('/place/{id}', 'PlaceController@show');
Route::get('/place/{id}/edit', 'PlaceController@edit');
Route::put('/place/{id}', 'PlaceController@update');
Route::delete('/place/{id}', 'PlaceController@destroy');

Route::get('/types', 'TypeController@index');
Route::get('/type/create', 'TypeController@create');
Route::post('/type', 'TypeController@store');
Route::get('/type/{id}', 'TypeController@show');
Route::get('/type/{id}/edit', 'TypeController@edit');
Route::put('/type/{id}', 'TypeController@update');
Route::delete('/type/{id}', 'TypeController@destroy');

Route::get('/blogs', 'BlogController@index');
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog', 'BlogController@store');
Route::get('/blog/{id}', 'BlogController@show');
Route::get('/blog/{id}/edit', 'BlogController@edit');
Route::put('/blog/{id}', 'BlogController@update');
Route::delete('/blog/{id}', 'BlogController@destroy');

Route::get('/tours', 'TourController@index');
Route::get('/tour/create', 'TourController@create');
Route::post('/tour', 'TourController@store');
Route::get('/tour/{id}', 'TourController@show');
Route::get('/tour/{id}/edit', 'TourController@edit');
Route::put('/tour/{id}', 'TourController@update');
Route::delete('/tour/{id}', 'TourController@destroy');

Route::get('/transfers', 'TransferController@index');
Route::get('/transfer/create', 'TransferController@create');
Route::post('/transfer', 'TransferController@store');
Route::get('/transfer/{id}', 'TransferController@show');
Route::get('/transfer/{id}/edit', 'TransferController@edit');
Route::put('/transfer/{id}', 'TransferController@update');
Route::delete('/transfer/{id}', 'TransferController@destroy');
Route::get('/transfer/file/upload', 'TransferController@file');
Route::post('/transfer/file', 'TransferController@upload');

Route::get('/transferNames', 'TransferNameController@index');
Route::get('/transferName/create', 'TransferNameController@create');
Route::post('/transferName', 'TransferNameController@store');
Route::get('/transferName/{id}', 'TransferNameController@show');
Route::get('/transferName/{id}/edit', 'TransferNameController@edit');
Route::put('/transferName/{id}', 'TransferNameController@update');
Route::delete('/transferName/{id}', 'TransferNameController@destroy');
Route::get('/transferName/file/upload', 'TransferNameController@file');
Route::post('/transferName/file', 'TransferNameController@upload');

Route::get('/drivers', 'DriverController@index');
Route::get('/driver/create', 'DriverController@create');
Route::post('/driver', 'DriverController@store');
Route::get('/driver/{id}', 'DriverController@show');
Route::get('/driver/{id}/edit', 'DriverController@edit');
Route::put('/driver/{id}', 'DriverController@update');
Route::delete('/driver/{id}', 'DriverController@destroy');

Route::get('/cars', 'CarController@index');
Route::get('/car/create', 'CarController@create');
Route::post('/car', 'CarController@store');
Route::get('/car/{id}', 'CarController@show');
Route::get('/car/{id}/edit', 'CarController@edit');
Route::put('/car/{id}', 'CarController@update');
Route::delete('/car/{id}', 'CarController@destroy');
