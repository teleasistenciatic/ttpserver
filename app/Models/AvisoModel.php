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

class AvisoModel extends Model {
    /*
      |--------------------------------------------------------------------------
      | Crea un nuevo aviso
      |--------------------------------------------------------------------------
      |
     */

    public static function newAviso($number, $datetime, $status) {
                                    
        //Si no existe el aviso se crea
        $idAutonumericoInsertado = DB::table('aviso')->insertGetId(
        array('time' => $datetime, 'number' => $number, 'status' => $status )  );

        return $idAutonumericoInsertado;  
               
    }

     /*
     |--------------------------------------------------------------------------
     | ACtualizamos la fecha y hora del aviso
     |--------------------------------------------------------------------------
     |
     */
    public static function updateTimeDateAviso($number,$mysqldatetime) {    
        
        //Si existe se hace un update                  
        $filasAfectadas = DB::table('aviso')
        ->where( array('number' => $number, 'status' => 0) ) // Status activo
        ->update( array('time' => $mysqldatetime) );           

        return $filasAfectadas;
    }
    
    /*
    |---------------------------------------------------------------------------
    | Chequea si existe un aviso previo activo
    |---------------------------------------------------------------------------
    |
    */
    public static function containsAvisoActivo($number) {

        $aviso = DB::select('select * from aviso where number = ? and status = ?', [$number,0]);

        if ( $aviso ) {
            return true;
        } else {
            return false;
        }
    }
    
    /*
      |--------------------------------------------------------------------------
      | Chequea si existe un aviso previo de cualquier tipo
      |--------------------------------------------------------------------------
      |
     */

    public static function containsAviso($number) {

        $aviso = DB::select('select * from aviso where number = ?', [$number]);

        if ( $aviso ) {
            return true;
        } else {
            return false;
        }
    }
    
    /*
      |--------------------------------------------------------------------------
      | Obtener la lista completa de avisos
      |--------------------------------------------------------------------------
      |
     */

    public static function getAvisosListByStatus($status) {

        //SELECT aviso.id, aviso.number, aviso.time, phone.name FROM aviso,phone WHERE aviso.number = phone.number
        //$avisos = DB::select('select * from aviso where status = ?', [$status]);
        
        $avisos = DB::select('SELECT aviso.id, aviso.number, aviso.time, phone.name '
                           . 'FROM aviso,phone '
                           . 'WHERE aviso.number = phone.number and status = ?', [$status]);
        
        return $avisos;
    }
    
}
