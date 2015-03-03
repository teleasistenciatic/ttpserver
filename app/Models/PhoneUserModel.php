<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Log;

/*
  |--------------------------------------------------------------------------
  | Modelo de acceso a datos para el usuario del teléfono
  |--------------------------------------------------------------------------
  |
 */

class PhoneUserModel extends Model {

    public static function getPhoneUserNameById($number) {
                
        $phonenumber = DB::select('select * from phone where number = ?', [$number]);
        //var_dump($phonenumber); exit;
        
        if ( isset( $phonenumber[0]['name'] ) ) {
            
            return $phonenumber[0]['name'];
            
        } else {       
            
            return null;
            
        }
        
    }

}
