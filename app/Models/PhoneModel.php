<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\CifradoModel;

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

    public static function getPhone ($id) {
        return CifradoModel::cifrar($id);
        //return DB::select('select * from phone where number = ?', [$id]);
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
        
        return CifradoModel::cifrar($id);
    }
         
}