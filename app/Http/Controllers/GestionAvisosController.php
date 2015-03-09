<?php

namespace App\Http\Controllers;

use App\Models\AvisoModel;

//use Illuminate\Http\Request;
use Request;

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
        $activos = 'activos';

        return view('gestionavisos.gestionavisos', compact('listaAvisos', 'activos'));
    }

    /*
      |--------------------------------------------------------------------------
      | Listado de avisos activos
      |--------------------------------------------------------------------------
      |
     */

    public function showAllAvisos() {
        //Recuperar los avisos
        $listaAvisos = AvisoModel::getAvisosList();
        $activos = '';

        return view('gestionavisos.gestionavisos', compact('listaAvisos', 'activos'));
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
        $aviso = $aviso[0]; //Pasamos la primera row del array
        $aviso['statusname'] = AvisoModel::getStatusNameById($aviso['status']);

        return view('gestionavisos.showedit', compact('aviso'));
    }

    /*
      |--------------------------------------------------------------------------
      | Eliminar un aviso
      |--------------------------------------------------------------------------
      |
     */

    public function delete($id) {

        $existe = AvisoModel::containsAvisoActivoById($id);

        if (!$existe) {
            return view('errors.404');
        }


        $aviso = AvisoModel::deleteAvisoById($id);

        $titulo = "Borrado de un aviso";

        if ($aviso == 1) {
            $contenido = "Aviso correctamente eliminado";
        } else {
            $contenido = "Se ha producido un error al eliminar el aviso";
        }

        return view('gestionavisos.generic', compact('titulo', 'contenido'));
    }
    
    /*
      |--------------------------------------------------------------------------
      | Eliminar TODOS los avisos
      |--------------------------------------------------------------------------
      |
     */

    public function clearList() {

        $respuesta = AvisoModel::truncateTableAviso();

        $titulo = "Borrado de la lista de avisos";

        $contenido = "Tabla de avisos borrada (".$respuesta.")";

        return view('gestionavisos.generic', compact('titulo', 'contenido'));
    }    

    /*
      |--------------------------------------------------------------------------
      | Cambiar el estado de un aviso
      |--------------------------------------------------------------------------
      |
     */

    public function setStatus($id, $status) {

        $existe = AvisoModel::containsAvisoActivoById($id);

        if (!$existe) {
            return view('errors.404');
        }

        $aviso = AvisoModel::updateStatusAvisoById($id, $status);

        $titulo = "Actualización de estado de un aviso";

        if ($aviso == 1) {
            $contenido = "Estado correctamente cambiado";
        } else {
            $contenido = "Se ha producido un error al cambiar el estado";
        }

        return view('gestionavisos.generic', compact('titulo', 'contenido'));
    }

    /*
      |--------------------------------------------------------------------------
      | Panel de creación de nuevo aviso
      |--------------------------------------------------------------------------
      |
      | Aunque los avisos los generan los terminales, a nivel de operativa
      | puede ser necesaria la creación de avisos directamente desde el
      | aplicativo web.
      |
     */

    public function panelCreate() {

        //Obtenemos el listado de beneficiarios
        $beneficiarios = \App\Models\PhoneUserModel::getAllPhones();
        $status = \App\Models\AvisoModel::getAllStatus();

        $data = [];
        $data['ben']= $beneficiarios; 
        $data['status'] = $status;
        $data['timedate'] = date('Y-m-d H:i:s');
        
        return view('gestionavisos.panelcreate', $data);
    }

    public function panelCreateStore() {

        $input = Request::all();
        //dd($input); exit;
        
        //El beneficiario no puede tener ya un aviso activo
        $avisoActivo = AvisoModel::containsAvisoActivo($input['number']);
        
        if ($avisoActivo && $input['status'] == 0) { //Status = 0 aviso activo
            return "Ese beneficiario ya tiene un aviso activo";
        }

        $number = $input['number'];
        $time = $input['time'];
        $status = $input['status'];
        
        if ( $number == -1 or $status == -1) {
            return "El beneficiario o el estado del aviso no pueden ser indeterminados";
        }

        AvisoModel::newAviso($number, $time, $status);
        $contenido = "Nuevo aviso creado";
        $titulo = "Gestión de avisos";

        return view( 'gestionavisos.generic',compact('contenido','titulo') );
    }

}
