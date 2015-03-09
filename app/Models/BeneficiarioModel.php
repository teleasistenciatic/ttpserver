<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Log;

/*
|--------------------------------------------------------------------------
| Modelo de acceso a datos los avisos
|--------------------------------------------------------------------------
|
*/

class BeneficiarioModel extends Model {
 
   
    /*
    |---------------------------------------------------------------------------
    | Chequea si existe un beneficiario
    |---------------------------------------------------------------------------
    |
    */
    public static function containsBeneficiario($number) {

        $existe = DB::select('select * from phone where number = ?', [$number]);

        if ( $existe ) {
            return true;
        } else {
            return false;
        }
    }
    

    public static function getBeneficiariosList() {
    
        $beneficiarios = DB::select('SELECT * '
                           . 'FROM phone '
                           . 'ORDER BY name DESC');
           
        
        return $beneficiarios;
    }
    
}
