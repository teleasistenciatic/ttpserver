<?php namespace App\Http\Controllers\Debug;

use App\Http\Controllers\Controller;
use App\Models\CifradoModel;


class CifradoController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Phone
	|--------------------------------------------------------------------------
	|
	| Controlador que interacciona con los telefonos mediante operaciones
        | de comprobación, acceso, etc... 
        |
	*/
    
	public function __construct()
	{
		$this->middleware('auth');
                //echo Auth::user()->name;
                //var_dump($this); exit;
                
                //Sólo administradores, no usuarios identificados
                
	}    
               
        
        public function cifrar($id) {        
           
                  return CifradoModel::cifrar($id);           
                                              
        }       
        
        public function descifrar($id) {        
           
                  return CifradoModel::descifrar($id);           
                                              
        }     
        
}