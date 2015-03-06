<?php namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;

class ServerStatusController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Server State controller
	|--------------------------------------------------------------------------
	|
	| Controlador que comprueba el estado online del servidor
        | La versión cliente, dentro de sus opciones de comprobación de conexión,
        | intenta leer este controlador http://servidor/serverstatus y almacenarlo
	| en una cadena de texto. 
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	/*public function __construct()
	{
		$this->middleware('guest');
	}*/

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
                return "true";
                /*$id = '';
		return view('serverstate')->with('id',$id);*/
	}
        
	/**
	 * Dummy: sólo para ver que funciona la carga de parámetros para un controlador
	 *
	 * @return Response
	 */        
        
        /*
        public function show($id) {
            
            	  return view('serverstatus')->with('id',$id);
            
        }
        */
}