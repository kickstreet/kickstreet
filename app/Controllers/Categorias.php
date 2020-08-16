<?php namespace App\Controllers;

use App\Controllers\Utils;
use App\Models\CategoriaModel;

class Categorias extends BaseController{
	public function index(){
		$utils	= new Utils();
		// Validamos si es administrador
		if($utils->esAdministrador()){
			$datos["contenido"] = "categorias";
        	$pagina = view('plantilla/plantilla_backend', $datos);
			return $pagina; 
		}
	}
	//--------------------------------------------------------------------

	function guardar(){
		$model = new CategoriaModel();
		$newData = [
			'categoria' => "test",
			'id_user' => session()->get('id')
		];
		$model->save($newData);
	}
}
