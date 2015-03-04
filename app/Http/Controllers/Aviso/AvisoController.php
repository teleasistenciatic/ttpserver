<?php

namespace App\Http\Controllers\Aviso;

use Log;

use App\Http\Controllers\Controller;
use App\Models\AvisoModel;
use App\Models\PhoneModel;
use App\Models\CifradoModel;


    /*
      |--------------------------------------------------------------------------
      | Aviso
      |--------------------------------------------------------------------------
      |
      | Controlador para los avisos de usuarios del teléfono hacia el servidor
      |
     */

class AvisoController extends Controller {
    
    public static $FALSO_AVISO = 3; //TODO único fichero de configuración
    
    /*
    |--------------------------------------------------------------------------
    | crear un nuevo aviso
    |--------------------------------------------------------------------------
    | Sólo puede haber un aviso por usuario
    | la creación de un aviso elimina el anterior en caso de existir
    |
    */
    public function create($idCifrado) {

        //¿Existe el telefono en la base de datos?
        Log::info('Se intenta generar un aviso: '.$idCifrado);
        $number = CifradoModel::descifrar($idCifrado);
        
        $existeTelefono = PhoneModel::containsPhone($number);
               
        if ( !$existeTelefono ) {
            Log::info('Teléfono no existente en generación aviso: '.$idCifrado);
            return view('errors.404');
        }
               
        //Generación de datos para el aviso
        //id autonumerico
        //date time (2015-03-03 12:05:19)
        //numero telefono
        //estado
        $mysqltime = date ("Y-m-d H:i:s");     
        
        // UPDATE
        //Si existe la alarma, se actualiza la hora de llamada
        if ( AvisoModel::containsAvisoActivo($number) ) {            
            
            $resultado = AvisoModel::updateTimeDateAviso($number,$mysqltime);
            
        } else {
            // INSERT
            $resultado = AvisoModel::newAviso($number,$mysqltime,0);
        }
        
        //Casos de prueba
        // inserción de registro nuevo
        // actualización de un registro
        // actualización de un registro que no existe
                
        if ( $resultado > 0 ) {
            
            return "true";
            
        } else {
            
            return view('errors.404'); //No damos información al "atacante"
            
        }       
    }
    
    /*
      |--------------------------------------------------------------------------
      | Comprobar si existe un aviso previo
      |--------------------------------------------------------------------------
      |
     */    
    public function check($idCifrado) {

        $idDescifrado = CifradoModel::descifrar($idCifrado);
        
        $existe = AvisoModel::containsAvisoActivo($idDescifrado);
        
        if ( $existe ) {
            
            return "true";
            
        } else {
            
            return view('errors.404'); 
            
        }
            
    }
    
    /*
    |--------------------------------------------------------------------------
    | Borrado del aviso
    |--------------------------------------------------------------------------
    | Realmente no se borra, se hace un update del estado
    |
    */
    public function delete($idCifrado) {

        //¿Existe el telefono en la base de datos?
        $number = CifradoModel::descifrar($idCifrado);
        
        $existeTelefono = PhoneModel::containsPhone($number);
               
        if ( !$existeTelefono ) {
            return view('errors.404');
        }
               
        // UPDATE
        //Si existe la alarma, se hace un update de su status
        $resultado = AvisoModel::updateStatusAviso($number,Self::$FALSO_AVISO);
            
        if ( $resultado > 0 ) {
            
            return "true";
            
        } else {
            
            return view('errors.404'); //No damos información al "atacante"
        }       
    }    
    
}
