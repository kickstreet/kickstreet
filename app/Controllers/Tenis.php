<?php namespace App\Controllers;

class Tenis extends BaseController
{
	public function index()
	{
        $datos["contenido"] = "tenis";
        $datos["sidebar"] = "1";
        $pagina = view('plantilla/plantilla', $datos);
		return $pagina; 
	}

	//--------------------------------------------------------------------

}
