<?php namespace App\Http\Controllers\Phone;

use App\Http\Controllers\Controller;
use App\Models\PhoneModel;


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
        public function check($id) {
            
                  //Indicar si aparece en nuestra base de datos
                  // Los números de teléfono son de 9 dígitos y empiezan por 6
            
                  $existeTelefono = PhoneModel::containsPhone($id);
                  
                  if ( $existeTelefono ) {
                    return "TRUE";
                  } else {
                      return "FALSE";
                  }                              
        }
}