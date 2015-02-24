<?php namespace App\Http\Controllers\Phone;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;

class PhoneController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Phone
	|--------------------------------------------------------------------------
	|
	| Controlador que interacciona con los telefonos mediante operaciones
        | de comprobación, acceso, etc... 
        |
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}
        
        /*
	public function index()
	{
		return view('serverstate')->with('id',$id);
	}
        */
        
	/**
	 * Autentica un id de teléfono frente a nuestro sistema
	 *
	 * @return Response
	 */        
        public function authenticate($id) {
            
                  //Indicar si aparece en nuestra base de datos
                  // Los números de teléfono son de 9 dígitos y empiezan por 6
            
                  $results = DB::select('select * from phone where number = ?', [$id]);
                  
                  var_dump($results);
                  
            
           	  return "TRUE";
            
        }
}