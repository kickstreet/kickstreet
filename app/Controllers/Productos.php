<?php

namespace App\Controllers;

use App\Controllers\Utils;
use App\Models\MarcaModel;
use App\Models\CategoriaModel;
use App\Models\TipoModel;
use App\Models\TallaModel;

class Productos extends BaseController{
	public function index(){
		$utils	= new Utils();
		// Validamos si es administrador
		if($utils->esAdministrador()){
            
            $marcaModel = new MarcaModel();
            $categoriaModel = new CategoriaModel();
            $tipoModel = new TipoModel();
            $marca = $marcaModel->where('es', 'Activo')->findAll();
            $categoria = $categoriaModel->where('estatus', 'Activo')->findAll();
            $tipo = $tipoModel->where('estatus', 'Activo')->findAll();
           
			$datos["contenido"] = "productos";
            $datos["marca"] = $marca;
            $datos["categoria"] = $categoria;
            $datos["tipo"] = $tipo;
        	$pagina = view('plantilla/plantilla_backend', $datos);
			return $pagina; 
            
		}
	}
    
    public function tallas(){
        $request = \Config\Services::request();
        
        $categoria = $request->getPost('catagoria');
        $tipo = $request->getPost('tipo');
        $tallaModel = new TallaModel();
        $talla = $tallaModel->where('id_categoria', $categoria)->where('id_tipo', $tipo)->findAll();    
        echo json_encode($talla);
    }
    
}