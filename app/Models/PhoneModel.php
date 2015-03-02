<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\CifradoModel;
use Log;

/*
  |--------------------------------------------------------------------------
  | Modelo de acceso a datos para el teléfono
  |--------------------------------------------------------------------------
  |
  | En laravel no aparece el directorio MODEL y lo hemos creado nosotros
  |
 */

class PhoneModel extends Model {
    /*
      |--------------------------------------------------------------------------
      | getPhone: consulta del numero de teléfono
      |--------------------------------------------------------------------------
      |
     */

    /*
    public static function getPhone($id) {
        return CifradoModel::cifrar($id);
        //
    }*/

    /*
      |--------------------------------------------------------------------------
      | isValidPhoneNumber: check de si el numero de telefono es válido
      |--------------------------------------------------------------------------
      |
     */

    public static function isValidPhoneNumber($number) {
        //9 caracteres todos numericos y empezando por 6
        //Para trabajar con el emulador se eliminan estos chequeos
        //El emulador da valores como 15555215554
        //if ( (strlen($number) == 9) && ($number[0] == '6') && ctype_digit($number) ) {
        if ( ctype_digit($number) ) {            
            return true;
        } else {
            return false;
        }
    }

    /*
      |--------------------------------------------------------------------------
      | containsPhone: ¿Existe el teléfono?
      |--------------------------------------------------------------------------
      |
      | @return boolean
      |
      |
     */

    public static function containsPhone($number) {
   
        $count = DB::table('phone')->where('number', $number )->count();
        //DEBUG: echo "El valor es:"; var_dump($count);
                
        //$number_db = DB::select('select * from phone where number = ?', [$number]);
        if ( $count == 1 ) { //count devuelve 1 registro si lo encuentra
            Log::info('El teléfono se encuentra en la base de datos: '.$number);
            return true;
        } else   {
            Log::info('El teléfono NO se encuentra en la base de datos: '.$number);            
            return false;
        }
    }

}
