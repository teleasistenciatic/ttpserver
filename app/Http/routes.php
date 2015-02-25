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

/*
|--------------------------------------------------------------------------
| Estado del servidor
|--------------------------------------------------------------------------
*/
Route::get('serverstatus', 'Server\ServerStateController@index');
Route::get('serverstatus/{id}', 'Server\ServerStateController@show');

/*
|--------------------------------------------------------------------------
| Comprobación de usuario de movil y envío de tokens de sesión
|--------------------------------------------------------------------------
*/
Route::get('phone/check/{id}', 'Phone\PhoneController@check');

/*
|--------------------------------------------------------------------------
| Autenticación y registro autogenerados
|--------------------------------------------------------------------------
*/

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
