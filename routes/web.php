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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');
Route::get('/contactus', 'HomeController@contactus')->name('contactus');
Route::get('/add', 'HomeController@create')->name('add');
Route::post('/home.store', 'HomeController@store')->name('home.store');
Route::post('/apistore', 'ApiResourceController@store')->name('apistore');
Route::get('apiresource', 'ApiResourceController@create')->name('apiresource');
Route::middleware('auth')
	   ->namespace('Admin')
	   ->prefix('admin')
	   ->name('admin.')
	   ->group(function ()
	{
		Route::get('dashboard', 'DashboardController@index')->name('dashboard');
		Route::resource('toilet', 'ToiletController');
		Route::get('verify/{id}/accept', 'ToiletController@accept')->name('verify.accept');
		Route::get('verify/{id}/reject', 'ToiletController@reject')->name('verify.reject');
		Route::resource('feedback', 'FeedBackController');
		// Route::get('users/{id}/accept', 'UserController@accept')->name('users.accept');
	});
	
// 	Route::get('clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     // return what you want
// });
	

