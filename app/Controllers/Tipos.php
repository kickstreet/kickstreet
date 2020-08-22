<?php namespace App\Controllers;

use App\Controllers\Utils;
use App\Models\TipoModel;

class Tipos extends BaseController{
	public function index(){
		$utils	= new Utils();
		// Validamos si es administrador
		if($utils->esAdministrador()){
			$datos["js_custom"][] = '<script src="/public/js/croppie.js"></script>';
			$datos["js_custom"][] = '<script src="/public/js/tipos.js"></script>';
			$datos["js_custom"][] = '<script src="/public/js/catalogo.js"></script>';
			$datos["js_custom"][] = '<script src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>';
			
			$datos["contenido"] = "tipos";
        	$pagina = view('plantilla/plantilla_backend', $datos);
			return $pagina; 
		}
	}
	//--------------------------------------------------------------------

	function guardar(){
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'tipo'	=> 'required|min_length[3]|max_length[50]'
			];

			/*$errors = [
				''  => [
                    'validateUser'  => 'Correo y/o cotraseña incorrectos',
                    'activeUser'      => 'La cuenta no ha sido activada, por favor revisa tu bandeja de entrada y spam'
                ],  
			];*/

			if (! $this->validate($rules)) {
				$response = array("success" => false, "mensaje" => $this->validator->listErrors());
			}else{
				$model = new TipoModel();
				$newData = [
					'tipo' => $this->request->getVar('tipo'),
					'id_user' 	=> session()->get('id'),
					'estatus' 	=> $this->request->getVar('estatus')
				];

				if($this->request->getVar('id')){
					$newData["id"] = $this->request->getVar('id');
					
					$model->save($newData);
				}
				else
					$model->save($newData);

				$response = array("success" => true, "mensaje" => "Registro guardado con éxito");
			}

			echo json_encode($response);
		}
		
	}

	function lista(){
		$model = new TipoModel();
		$data = $model->findAll();
		return json_encode(
			array(
				"data" => $data
			)
		);
	}

	function guardarImagen(){
		$model = new TipoModel();
		$data = array(
			"id" 		=> $this->request->getVar('id'),
			"imagen"	=> $this->request->getVar('imagen')
		);
		$response = $model->guardarImagen($data);
		echo json_encode($response);
	}

	function obtenerRegistro($id){
		$model = new TipoModel();
		$data = $model->find($id);
		return json_encode(
			array(
				"data" => $data
			)
		);
	}
}
