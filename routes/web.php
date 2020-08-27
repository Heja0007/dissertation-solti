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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/front/trek/all', [
    'as' => 'front.trek.all',
    'uses' => 'TrekkingRouteController@allRoutes'
]);

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    Route::resource('guides', 'GuidesController');

    Route::resource('treks', 'TrekkingRouteController');

    Route::delete('/upload/delete/{id}', [
        'as' => 'uploads.destroy',
        'uses' => 'UploadController@destroy'
    ]);

    Route::get('/bookings', [
        'as' => 'bookings.index',
        'uses' => 'BookingDetailsController@index'
    ]);

});

Route::post('/charge', [
    'as' => 'charge',
    'uses' => 'PaymentController@charge'
]);


Route::get('/front/trek/{id}', [
    'as' => 'front.trek.view',
    'uses' => 'TrekkingRouteController@showFront'
]);

Route::get('/front/trek/form/{id}', [
    'as' => 'front.trek.form',
    'uses' => 'TrekkingRouteController@bookingPage'
]);

Route::post('/front/trek/search', [
    'as' => 'front.trek.search',
    'uses' => 'TrekkingRouteController@search'
]);

Route::post('/front/trek/book/{id}', [
    'as' => 'front.trek.book',
    'uses' => 'BookingDetailsController@store'
]);

Route::get('/front/trek/checkout/{id}', [
    'as' => 'front.payment.checkout',
    'uses' => 'BookingDetailsController@checkout'
]);
