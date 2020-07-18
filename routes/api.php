<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('treks' , 'TrekkingRouteController@index');
Route::get('trek/{id}' , 'TrekkingRouteController@show');
Route::post('trek' , 'TrekkingRouteController@store');
Route::put('trek/{id}' , 'TrekkingRouteController@update');
Route::delete('trek/{id}' , 'TrekkingRouteController@destroy');
