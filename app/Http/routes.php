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

Route::get('gestionavisos/clearlist', 'GestionAvisosController@clearList'); //Truncate de la tabla de avisos, cuidado


Route::get('gestionavisos/panelcreate', 
  ['as' => 'gestionavisos/panelcreate', 'uses' => 'GestionAvisosController@panelCreate']);
Route::post('gestionavisos/panelcreatestore', 
  ['as' => 'gestionavisos/panelcreatestore', 'uses' => 'GestionAvisosController@panelCreateStore']);

/*
|--------------------------------------------------------------------------
| Gestión de beneficiarios
|--------------------------------------------------------------------------
*/

Route::get('gestionbeneficiarios', 'GestionBeneficiariosController@index');
Route::get('gestionbeneficiarios/showedit/{number}', 'GestionBeneficiariosController@showedit');
Route::get('gestionbeneficiarios/delete/{number}', 'GestionBeneficiariosController@delete');

Route::get('gestionbeneficiarios/panelcreate', 
  ['as' => 'gestionbeneficiarios/panelcreate', 'uses' => 'GestionBeneficiariosController@panelCreate']);
Route::post('gestionbeneficiarios/panelcreatestore', 
  ['as' => 'gestionbeneficiarios/panelcreatestore', 'uses' => 'GestionBeneficiariosController@panelCreateStore']);


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