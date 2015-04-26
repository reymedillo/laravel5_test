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
Session::put('cart_session', str_random(20));
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('/shop', ['as' => 'shopIndex', 'uses' => 'OrderController@home']);

Route::get('/messages', ['as'=>'msgviewall','uses' => 'MessageController@viewall']);
Route::post('/users/login',['as' => 'loginuser', 'uses' => 'UsersController@login']);
Route::get('api/messages/notifications', ['uses' => 'MessageController@notify']);

# post routes
Route::post('/shop/checkout', array('as'=>'shopCheckout', 'uses'=>'OrderController@checkout'));

# for api's
Route::group(['prefix' => 'api'], function() {
	Route::resource('products', 'ProductController', [
		'except' => ['create']
	]);
	Route::resource('messages', 'MessageController', 
		array('except' => array('create')
	));
	Route::resource('cart', 'CartController', array(
		'except' => array('create')
	));
	// Route::resource('order', 'OrderController', array(
	// 	'except' => array('create')
	// ));
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

