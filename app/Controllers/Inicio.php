<?php namespace App\Controllers;

class Inicio extends BaseController
{
	public function index()
	{
        $datos["contenido"] = "inicio";
        $datos["barra"] = "0";
        $pagina = view('plantilla/plantilla', $datos);
		return $pagina; 
	}

	//--------------------------------------------------------------------

}
