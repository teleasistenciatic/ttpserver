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

        return view('gestionbeneficiarios.gestionbeneficiarios', compact('listaBeneficiarios'));
    }

    /**
     * 
     * @return type
     */
    public function panelCreate() {

        /*
          //Obtenemos el listado de beneficiarios
          $beneficiarios = \App\Models\PhoneUserModel::getAllPhones();
          $status = \App\Models\AvisoModel::getAllStatus();

          $data = [];
          $data['ben'] = $beneficiarios;
          $data['status'] = $status;
          $data['timedate'] = date('Y-m-d H:i:s');
         */

        return view('gestionbeneficiarios.panelcreate');
    }

    /**
     * 
     */
    public function panelCreateStore() {

        $input = Request::all();

        if (BeneficiarioModel::containsBeneficiario($input['number'])) {

            return "Error: el numero de teléfono ya existe";
        }

        //dd($input); exit;
        BeneficiarioModel::newBeneficiario($input['number'], $input['name']);

        $titulo = 'Gestión de beneficiarios';
        $contenido = 'Nuevo beneficiario/a insertado/a';

        return view('gestionbeneficiarios.generic', compact('titulo', 'contenido'));
    }

    
     /**
     * 
     * @return type
     */
    public function edit($number) {

        $beneficiario = BeneficiarioModel::getBeneficiario($number);

        $data = [];
        $data['beneficiario'] = $beneficiario[0];

        return view('gestionbeneficiarios.edit',$data);
    }
    
    public function editStore() {

        $input = Request::all();

        //dd($input); exit;
        BeneficiarioModel::updateBeneficiario($input['number'], $input['name']);

        $titulo = 'Gestión de beneficiarios';
        $contenido = 'Edición de beneficiario/a terminada con éxito.';

        return view('gestionbeneficiarios.generic', compact('titulo', 'contenido'));
    }    
    
    /**
     * 
     */
    public function showedit($number) {

        $existe = BeneficiarioModel::containsBeneficiario($number);

        if (!$existe) {
            return view('errors.404');
        }


        $beneficiario = BeneficiarioModel::getBeneficiario($number);

        $beneficiario = $beneficiario[0]; //Pasamos la primera row del array

        return view('gestionbeneficiarios.showedit', compact('beneficiario'));
    }

    /*
      |--------------------------------------------------------------------------
      | Eliminar un beneficiario
      |--------------------------------------------------------------------------
      |
     */

    public function delete($number) {

        $existe = BeneficiarioModel::containsBeneficiario($number);

        if (!$existe) {
             return view('errors.404');
        }


        $beneficiario = BeneficiarioModel::deleteBeneficiario($number);

        $titulo = "Borrado de un/a beneficiario/a";

        if ($beneficiario == 1) {
            $contenido = "Beneficiario/a correctamente eliminado/a";
        } else {
            $contenido = "Se ha producido un error al eliminar el/la beneficiario/a";
        }

        return view('gestionbeneficiarios.generic', compact('titulo', 'contenido'));
    }

}
