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
Route::get('serverstatus', 'Server\ServerStatusController@index');
//Route::get('serverstatus/{id}', 'Server\ServerStatusController@show');

/*
|--------------------------------------------------------------------------
| Comprobación de usuario de movil 
|--------------------------------------------------------------------------
*/
Route::get('phone/check/{id}', 'Phone\PhoneController@check');

/*
|--------------------------------------------------------------------------
| Manejo de Avisos 
|--------------------------------------------------------------------------
*/
Route::get('aviso/create/{id}', 'Aviso\AvisoController@create');
Route::get('aviso/check/{id}', 'Aviso\AvisoController@check');
Route::get('aviso/delete/{id}', 'Aviso\AvisoController@delete');

/*
|--------------------------------------------------------------------------
| Gestión de avisos
|--------------------------------------------------------------------------
*/

Route::get('gestionavisos', 'GestionAvisosController@index');
Route::get('gestionavisos/list', 'GestionAvisosController@showAllAvisos');
Route::get('gestionavisos/showedit/{id}', 'GestionAvisosController@showedit');
Route::get('gestionavisos/delete/{id}', 'GestionAvisosController@delete');
Route::get('gestionavisos/setstatus/{id}/{status}', 'GestionAvisosController@setStatus');

//Formulario de creación de aviso
//Route::get('gestionavisos/panelcreate', 'GestionAvisosController@panelCreate');
//Route::post('gestionavisos/panelcreatestore', 'GestionAvisosController@panelCreateStore');

Route::get('gestionavisos/panelcreate', 
  ['as' => 'gestionavisos/panelcreate', 'uses' => 'GestionAvisosController@panelCreate']);
Route::post('gestionavisos/panelcreatestore', 
  ['as' => 'gestionavisos/panelcreatestore', 'uses' => 'GestionAvisosController@panelCreateStore']);

/*
|--------------------------------------------------------------------------
| Usuario móvil 
|--------------------------------------------------------------------------
*/
Route::get('phoneuser/name/{id}', 'PhoneUser\PhoneUserController@getPhoneUserNameById');

/*
|--------------------------------------------------------------------------
| Acciones para debug, que se eliminarán en produccion o se activarán sólo
| con los permisos de usuario correspondiente
|--------------------------------------------------------------------------
*/

Route::get('debug/cifrar/{id}', 'Debug\CifradoController@cifrar');
Route::get('debug/descifrar/{id}', 'Debug\CifradoController@descifrar');

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