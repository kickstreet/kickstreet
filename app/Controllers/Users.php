<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\Utils;

class Users extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);


		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'email'     => 'required|min_length[6]|max_length[50]|valid_email',
                'password'  => 'required|min_length[8]|max_length[255]|validateUser[email,password]|activeUser[email]',
                
			];

			$errors = [
				'password'  => [
                    'validateUser'  => 'Correo y/o cotraseña incorrectos',
                    'activeUser'      => 'La cuenta no ha sido activada, por favor revisa tu bandeja de entrada y spam'
                ],
                
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
											->first();

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/');

			}
		}

        $data["contenido"] = "users/login";
        $pagina = view('plantilla/plantilla', $data);
		return $pagina; 

		
	}

	private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function register(){
		$data = [];
		helper(['form']);
        
		if ($this->request->getMethod() == 'post') {

            

			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'rol_id' => $this->request->getVar('rol_id'),
				];
				$model->save($newData);
				$session = session();
                
                $this->enviarActivacion($newData);
                $session->setFlashdata('success', 'Registro exitoso, hemos enviado un mensaje a tu correo para activar tu cuenta, por favor revisa tu bandeja de spam');
				return redirect()->to('/login');

			}
		}
        

        $data["contenido"] = "users/register";
        $pagina = view('plantilla/plantilla', $data);
		return $pagina; 

	
	}

	public function profile(){
		
		$data = [];
		helper(['form']);
		$model = new UserModel();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				];

			if($this->request->getPost('password') != ''){
				$rules['password'] = 'required|min_length[8]|max_length[255]';
				$rules['password_confirm'] = 'matches[password]';
			}


			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{

				$newData = [
					'id' => session()->get('id'),
					'firstname' => $this->request->getPost('firstname'),
					'lastname' => $this->request->getPost('lastname'),
					];
					if($this->request->getPost('password') != ''){
						$newData['password'] = $this->request->getPost('password');
					}
				$model->save($newData);

				session()->setFlashdata('success', 'Successfuly Updated');
				return redirect()->to('/profile');

			}
		}

		$data['user'] = $model->where('id', session()->get('id'))->first();
		echo view('templates/header', $data);
		echo view('profile');
		echo view('templates/footer');
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

    //--------------------------------------------------------------------
    

    function enviarActivacion($data){
        $email = \Config\Services::email();
        $email->setTo($data["email"]);
        $mensaje = "Hola <b>".$data["firstname"]."</b> bienvenido a kickstreet, para activar tu cuenta por favor da click en el siguiente enlace:<br><br> <a href='https://".$_SERVER["SERVER_NAME"]."/users/activarCuenta/".base64_encode($data["email"])."'>https://".$_SERVER["SERVER_NAME"]."/users/activarCuenta/".base64_encode($data["email"])."</a>";
        $email->setSubject('Activar cuenta');
        $email->setMessage($mensaje);
        $email->send();
    }

    function enviarAvisoAdministrador($data){
        $email = \Config\Services::email();
        $email->setTo(MAIL_ADMIN);
        $mensaje = "Estimado administrador, se ha registrado el usuario <b>".$data."</b> de tipo proveedor y ha verificado su cuenta de correo, por favor acceda a la plataforma para activar su acceso<br><br> Ir a <a href='https://".$_SERVER["SERVER_NAME"]."/login'>kickstreethome</a>";
        $email->setSubject('Registro de nuevo proveedor');
        $email->setMessage($mensaje);
        $email->send();
    }

    function activarCuenta($email){
        $model = new UserModel();
        $response = $model->activarCuenta($email);
        $session = session();

        if($response["tipo"] != ""){
            $session->setFlashdata('success', $response["mensaje"]);
            if($response["tipo"] == "Proveedor")
                $this->enviarAvisoAdministrador(base64_decode($email));
        }
        else
            $session->setFlashdata('error', $response["mensaje"]);

		return redirect()->to('/login');
        
    }

	function admin(){
		$utils	= new Utils();
		// Validamos si es administrador
		if($utils->esAdministrador()){
			$datos["js_custom"][] = '<script src="/public/js/croppie.js"></script>';
			$datos["js_custom"][] = '<script src="/public/js/usuarios.js"></script>';
			$datos["js_custom"][] = '<script src="/public/js/catalogo.js"></script>';
			$datos["js_custom"][] = '<script src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>';
			
			$datos["contenido"] = "usuarios";
        	$pagina = view('plantilla/plantilla_backend', $datos);
			return $pagina; 
		}
	}

	function lista(){
		$model = new UserModel();
		$data = $model->lista();
		return json_encode(
			array(
				"data" => $data
			)
		);
	}

	function registro($id){
		$model = new UserModel();
		$data = $model->find($id);
		return json_encode(
			array(
				"data" => $data
			)
		);
	}

	function guardarImagen(){
		$model = new UserModel();
		$data = array(
			"id" 		=> $this->request->getVar('id'),
			"imagen"	=> $this->request->getVar('imagen')
		);
		$response = $model->guardarImagen($data);
		echo json_encode($response);
	}

	function guardar(){
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname'	=> 'required|min_length[3]|max_length[50]'
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
				$model = new UserModel();
				$newData = [
					'firstname' 	=> $this->request->getVar('firstname'),
					'lastname' 		=> $this->request->getVar('lastname'),
					'email' 		=> $this->request->getVar('email'),
					'estatus' 		=> $this->request->getVar('estatus'),
					'rol_id'		=> $this->request->getVar('rol_id')
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
}
