<?php

namespace App\Http\Controllers;

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
    public function __construct() {
        $this->middleware('auth'); //TODO
    }

    /*
    |--------------------------------------------------------------------------
    | Listado de avisos activos
    |--------------------------------------------------------------------------
    |
   */

    public function index() {
        //Recuperar los avisos
        $listaAvisos = AvisoModel::getAvisosListByStatus(0);
        //var_dump($listaAvisos); exit;
        //$listaAvisos = ['1','2','3'];

        return view('gestionavisos', compact('listaAvisos'));
    }

    /*
    |--------------------------------------------------------------------------
    | Mostrar información de un aviso y editarlo
    |--------------------------------------------------------------------------
    |
   */

    public function showedit($id) {

        $existe = AvisoModel::containsAvisoActivoById($id);

        if (!$existe) {
            return view('errors.404');
        }
        
        //Obtener información del id
        //generar la view
        
        $aviso = AvisoModel::getAvisoById($id);
        
        var_dump($aviso);
        exit;
    }

}
