<?php namespace App\Controllers;

use App\Controllers\Utils;
use App\Models\TallaModel;

class Tallas extends BaseController{
	public function index(){
		$utils	= new Utils();
		// Validamos si es administrador
		if($utils->esAdministrador()){
			$datos["js_custom"][] = '<script src="/public/js/croppie.js"></script>';
			$datos["js_custom"][] = '<script src="/public/js/tallas.js"></script>';
			$datos["js_custom"][] = '<script src="/public/js/catalogo.js"></script>';
			$datos["js_custom"][] = '<script src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>';
			
			$datos["contenido"] = "tallas";
        	$pagina = view('plantilla/plantilla_backend', $datos);
			return $pagina; 
		}
	}
	//--------------------------------------------------------------------

	function guardar(){
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'talla'	=> 'required|min_length[1]|max_length[25]'
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
				$model = new TallaModel();
				$newData = [
                    'id_categoria' => $this->request->getVar('id_categoria'),
                    'id_tipo' => $this->request->getVar('id_tipo'),
                    'talla' => $this->request->getVar('talla'),
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
		$model = new TallaModel();
		$data = $model->lista();
		return json_encode(
			array(
				"data" => $data
			)
		);
	}

	function guardarImagen(){
		$model = new TallaModel();
		$data = array(
			"id" 		=> $this->request->getVar('id'),
			"imagen"	=> $this->request->getVar('imagen')
		);
		$response = $model->guardarImagen($data);
		echo json_encode($response);
	}

	function obtenerRegistro($id){
		$model = new TallaModel();
		$data = $model->find($id);
		return json_encode(
			array(
				"data" => $data
			)
		);
	}
}
