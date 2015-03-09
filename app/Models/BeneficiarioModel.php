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

        if ($existe) {
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
    

    public static function newBeneficiario($number, $name) {

        $idAutonumericoInsertado = DB::table('phone')->insertGetId(
                array('number' => $number, 'name' => $name) );

        return $idAutonumericoInsertado;
    }
    
    public static function updateBeneficiario($number,$name) {    
                     
        $filasAfectadas = DB::table('phone')
        ->where( array( 'number' => $number) ) 
        ->update( array( 'name' => $name) );           

        return $filasAfectadas;
    }    

    public static function getBeneficiario($number) {
       
        $beneficiario = DB::select('SELECT * '
                           . 'FROM phone '
                           . 'WHERE number = ?', [$number]);
        
        return $beneficiario;
    }   
    
    /*
    |--------------------------------------------------------------------------
    | Borra un beneficiario
    |--------------------------------------------------------------------------
    |
    */

    public static function deleteBeneficiario($number) {
       
        $beneficiario = DB::table('phone')->where('number', '=', $number)->delete();
        
        return $beneficiario;
    }         
}