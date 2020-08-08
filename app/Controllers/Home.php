<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
        $datos["contenido"] = "tenis";
        $pagina = view('plantilla/plantilla', $datos);
		return $pagina; 
	}

	//--------------------------------------------------------------------

}
