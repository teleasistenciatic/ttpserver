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

Route::get('/', 'WelcomeController@index');

/////////////////////////////////////////////////////////////////
//Controlador de estado de servidor
Route::get('serverstatus', 'ServerStateController@index');
Route::get('serverstatus/{id}', 'ServerStateController@show');
/////////////////////////////////////////////////////////////////

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
