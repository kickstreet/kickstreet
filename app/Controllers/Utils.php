<?php namespace App\Controllers;

use App\Models\UserModel;


class Utils extends BaseController{

    public function validarSesion(){
        if(!session()->get('id')){
            echo "Por favor inicia sesión...";
            exit();
			return false;
        }else{
            return true;
        }
        
    }
    public function usuarioSesion(){
        $model  = new UserModel();
        if($this->validarSesion()){
            $usuario = $model->where('id', session()->get('id'))->first();	
            return $usuario;
        }
    }

    public function  esAdministrador(){
        $usuario = $this->usuarioSesion();
        if($usuario["rol_id"] == SUPERUSUARIO || $usuario["rol_id"] == ADMINISTRADOR)
            return true;
        else{
            echo "No tienes permiso para acceder a esta seccion...";
            exit();
        }
    }

    public function  esCliente(){
        $usuario = $this->usuarioSesion();
        if($usuario["rol_id"] == CLIENTE)
            return true;
        else{
            echo "No tienes permiso para acceder a esta seccion...";
            exit();
        }
    }

    public function  esProveedor(){
        $usuario = $this->usuarioSesion();
        if($usuario["rol_id"] == PROVEEDOR)
            return true;
        else{
            echo "No tienes permiso para acceder a esta seccion...";
            exit();
        }
    }

}