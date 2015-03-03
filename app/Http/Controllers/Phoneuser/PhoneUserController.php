<?php

namespace App\Http\Controllers\Phoneuser;

use Log;

use App\Http\Controllers\Controller;
use App\Models\PhoneModel;
use App\Models\CifradoModel;

class PhoneUserController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | AppUser - usuario de la aplicación (en diferencia a los usuarios
      | que interactuan con la web del servidor
      |--------------------------------------------------------------------------
      |
      | Controlador que realiza operaciones sobre los usuarios de la aplicación
      |
     */

    public function get_phoneuser_name_by_id($idCifrado) {

        //Indicar si aparece en nuestra base de datos
        Log::info('Se solicita información del PhoneUser: '.$idCifrado);

        $idDescifrado = CifradoModel::descifrar($idCifrado);
        
        if ( PhoneModel::isValidPhoneNumber($idDescifrado) == true ) {
            Log::info('Se encuentra un telefono/id válido: '.$idDescifrado);

            $phoneuserName = PhoneUserModel::getPhoneUserName($idDescifrado);

            if ($$phoneuserName) {
                return "true";
            }
        }
               
        return view('errors.404'); //No damos información al "atacante"
    }

}
