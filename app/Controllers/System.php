<?php 

namespace App\Controllers;

class System extends BaseController
{
	public function index()
	{
        $datos["contenido"] = "dashboard";
        $pagina = view('plantilla/plantilla_backend', $datos);
		return $pagina; 
	}
	//--------------------------------------------------------------------

}
