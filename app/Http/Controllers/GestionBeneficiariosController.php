<?php

namespace App\Http\Controllers;

use App\Models\BeneficiarioModel;

use Request;

class GestionBeneficiariosController extends Controller {
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
      | Listado de beneficiarios registrados
      |--------------------------------------------------------------------------
      |
     */

    public function index() {
        $listaBeneficiarios = BeneficiarioModel::getBeneficiariosList();
        //var_dump($listaBeneficiarios); exit;
 
        return view('gestionbeneficiarios.gestionbeneficiarios', compact('listaBeneficiarios') );
    }
}
