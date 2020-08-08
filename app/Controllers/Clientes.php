<?php namespace App\Controllers;

class Clientes extends BaseController
{
	public function index()
	{
        $datos["contenido"] = "clientes";
        $datos["sidebar"] = "0";
        $pagina = view('plantilla/plantilla', $datos);
		return $pagina; 
	}

	//--------------------------------------------------------------------

}
