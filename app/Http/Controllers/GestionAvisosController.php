<?php namespace App\Http\Controllers;

use App\Models\AvisoModel;

class GestionAvisosController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Gestion de Avisos Controller
	|--------------------------------------------------------------------------
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth'); //TODO
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Recuperar los avisos
                $listaAvisos = AvisoModel::getAvisosListByStatus(0);
                //var_dump($listaAvisos); exit;
                //$listaAvisos = ['1','2','3'];

                return view( 'gestionavisos', compact('listaAvisos') );
	}

}
