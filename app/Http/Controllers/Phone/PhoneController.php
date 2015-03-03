<?php

namespace App\Http\Controllers\Phone;

use Log;

use App\Http\Controllers\Controller;
use App\Models\PhoneModel;
use App\Models\CifradoModel;

class PhoneController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Phone
      |--------------------------------------------------------------------------
      |
      | Controlador que interacciona con los telefonos mediante operaciones
      | de comprobación, acceso, etc...
      |
     */

    /**
     * Autentica un id de teléfono frente a nuestro sistema
     *
     * @return Response
     */
    public function check($idCifrado) {

        //Indicar si aparece en nuestra base de datos
        //Los números de teléfono son de 9 dígitos y empiezan por 6
        //Pasos del chequeo
        //X 1.Cadena vacia (el propio laravel evita esto)
        //2.Decodificacion correcta
        //3.Posible numero de telefono (9 digitos)
        Log::info('Se intenta chequear el numero de telefono: '.$idCifrado);


        $idDescifrado = CifradoModel::descifrar($idCifrado);
        
        //Cuando se intenta descifrar por fuerza bruta, se producen muchas cadenas
        //con caracteres extraños "F6R>·ÀI©ØÃhäx". Tras el descifrado hay que
        //comprobar que el numero de teléfono esté bien formado. 
        // TODO clase sanitize

        if ( PhoneModel::isValidPhoneNumber($idDescifrado) == true ) {
            Log::info('Se encuentra un telefono válido: '.$idDescifrado);

            $existeTelefono = PhoneModel::containsPhone($idDescifrado);

            if ($existeTelefono) {
                return "true";
            }
        }
               
        return view('errors.404'); //No damos información al "atacante"
    }

}
