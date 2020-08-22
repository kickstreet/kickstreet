<?php

namespace App\Controllers;

use App\Controllers\Utils;
use App\Models\MarcaModel;
use App\Models\CategoriaModel;
use App\Models\TipoModel;
use App\Models\TallaModel;
use App\Models\ProductosModel;

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
            $datos["js_custom"][] = "<script src='assets_admin/js/adm_productos.js'></script>";
            $datos["js_custom"][] = '<script src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>';
        	$pagina = view('plantilla/plantilla_backend', $datos);
			return $pagina; 
            
		}
	}
    
    public function tallas(){
        $request = \Config\Services::request();
        
        $categoria = $request->getPost('catagoria');
        $tipo = $request->getPost('tipo');
        $tallaModel = new TallaModel();
        $talla = $tallaModel->where('id_categoria', $categoria)
                            ->where('id_tipo', $tipo)
                            ->findAll();    
        echo json_encode($talla);
    }
    
    public function nuevo_producto(){
        $request = \Config\Services::request();
       
        $data = [
            'codigo' => $request->getPost('codigo'),
            'producto' => $request->getPost('producto'),
            'id_marca' => $request->getPost('marca'),
            'id_talla' => $request->getPost('talla'),
            'precio' => $request->getPost('precio'),
            'descripcion' => $request->getPost('descripcion'),
            'estatus' => $request->getPost('estatus'),
            'fecha_alta' => date('Y-m-d H:i:s')
        ];
        
        $productosModel = new ProductosModel();
        echo $productosModel->save($data);    
    }
    
    public function lista_productos(){
        $productosModel = new ProductosModel();
        $productos = $productosModel->where('id_talla', '1')->findAll();
        $data['data'] = $productos;
        print_r($data);
    }
    
}