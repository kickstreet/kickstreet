<?php namespace App\Controllers;

class Ropa extends BaseController
{
	public function index()
	{
        $datos["contenido"] = "ropa";
        $datos["sidebar"] = "1";
        $pagina = view('plantilla/plantilla', $datos);
		return $pagina; 
	}

	//--------------------------------------------------------------------

}
