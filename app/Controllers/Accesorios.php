<?php namespace App\Controllers;

class Accesorios extends BaseController
{
	public function index()
	{
        $datos["contenido"] = "accesorios";
        $datos["sidebar"] = "1";
        $pagina = view('plantilla/plantilla', $datos);
		return $pagina; 
	}

	//--------------------------------------------------------------------

}
