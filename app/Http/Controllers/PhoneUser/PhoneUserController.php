<?php

namespace App\Http\Controllers\PhoneUser;

use Log;

use App\Http\Controllers\Controller;
use App\Models\PhoneUserModel;
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

    public function getPhoneUserNameById($idCifrado) {

        //Indicar si aparece en nuestra base de datos
        Log::info('Se solicita información del PhoneUser: '.$idCifrado);

        $idDescifrado = CifradoModel::descifrar($idCifrado);
        
        $phoneuserName = PhoneUserModel::getPhoneUserNameById($idDescifrado);

        if ( $phoneuserName ) {
            
            return $phoneuserName;
            
        } else {
               
            return view('errors.404'); //No damos información al "atacante"        
            
        }
        
    }

}
