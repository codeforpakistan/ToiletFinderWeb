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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('filter','APIs\ToiletController@filterSearch')->name('filter');
Route::post('city','APIs\ToiletController@cityBase')->name('city');
Route::get('toiletlist','APIs\ToiletController@index');
Route::post('all_toilets','APIs\ToiletController@city')->name('all_toilets');
Route::post('get_toilet_near','APIs\ToiletController@toiletnear')->name('get_toilet_near');

Route::post('toilet','APIs\ToiletController@store');
Route::resource('review','APIs\FeedbackController');
Route::post('register','APIs\RegisterApiController@register')->name('register');
Route::post('login','APIs\LoginApiController@login')->name('login');

Route::group(['middleware' => 'APIToken'], function ()
        {
        	Route::get('publictoiletfinder','APIs\ToiletController@index')->name('publictoiletfinder');
        	Route::post('filterBase','APIs\ToiletController@filterBaseSearch')->name('filterBase');

        });