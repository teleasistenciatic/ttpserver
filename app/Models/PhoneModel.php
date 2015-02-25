<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    | getPhone: query del numero de teléfono 
    |--------------------------------------------------------------------------
    |
    */

    public static function getPhone ($id) {
        return DB::select('select * from phone where number = ?', [$id]);
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

    public static function containsPhone ($id) {
        
                  $results = Self::getPhone($id);
                  
                  if ( isset($results[0]) ) {
                      //var_dump($results[0]['number']);
                    return TRUE;
                  } else {
                      return FALSE;
                  }
    }    
}