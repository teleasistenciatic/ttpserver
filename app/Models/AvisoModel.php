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
     |--------------------------------------------------------------------------
     | Actualizamos el estado de un aviso
     |--------------------------------------------------------------------------
     |
     */
    public static function updateStatusAviso($number,$status) {    
                       
        $filasAfectadas = DB::table('aviso')
        ->where( array('number' => $number) ) 
        ->update( array('status' => $status) );           

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
    |---------------------------------------------------------------------------
    | Chequea si existe un aviso por su ID
    |---------------------------------------------------------------------------
    |
    */
    public static function containsAvisoActivoById($number) {

        $aviso = DB::select('select * from aviso where id = ?', [$number]);

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
    
    /*
    |--------------------------------------------------------------------------
    | Obtener información de un aviso con su id
    |--------------------------------------------------------------------------
    |
    */

    public static function getAvisoById($id) {
       
        $aviso = DB::select('SELECT aviso.id, aviso.number, aviso.time, aviso.status, phone.name '
                           . 'FROM aviso,phone '
                           . 'WHERE aviso.number = phone.number and id = ?', [$id]);
        
        return $aviso;
    }   
    
    /*
    |--------------------------------------------------------------------------
    | OBtiene el nombre de un estado según su identificativo
    |--------------------------------------------------------------------------
    |
    */

    public static function getStatusNameById($id) {
       
        $aviso = DB::select('SELECT name '
                           . 'FROM avisostatus '
                           . 'WHERE id = ?', [$id]);
        
           //var_dump($aviso);
        
        return $aviso[0]['name'];
    }     
    
    /*
    |--------------------------------------------------------------------------
    | Borra un aviso por su aviso
    |--------------------------------------------------------------------------
    |
    */

    public static function deleteAvisoById($id) {
       
        $aviso = DB::table('aviso')->where('id', '=', $id)->delete();
        
        return $aviso;
    }       
}
