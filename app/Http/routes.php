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

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('/products', function() { return view('products.index'); });

Route::get('/messages', ['as'=>'msgviewall','uses' => 'MessageController@viewall']);
Route::post('/users/login',['as' => 'loginuser', 'uses' => 'UsersController@login']);
Route::get('api/messages/notifications', ['uses' => 'MessageController@notify']);


Route::group(array('prefix' => 'api'), function() {
	Route::resource('messages', 'MessageController', 
		array('except' => array('create')
	));
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

