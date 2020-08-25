<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
  protected $table = 'users';
  protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'rol_id', 'updated_at'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];




  protected function beforeInsert(array $data){
    $data = $this->passwordHash($data);
    $data['data']['created_at'] = date('Y-m-d H:i:s');

    return $data;
  }

  protected function beforeUpdate(array $data){
    $data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }

  protected function passwordHash(array $data){
    if(isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

    return $data;
  }

  public function activarCuenta($email){
    $db      = \Config\Database::connect();
    $builder = $db->table('users');
    
    $builder->select('*');
    $builder->where('email',base64_decode($email));
    $query = $builder->get()->getRow();
    
    // Si es proveedor dejamos activacion en pendiente
    if($query->rol_id == 4){
      $response = array("mensaje" => "Cuenta verificada pero pendiente de aprobación", "tipo" => "Proveedor");
      $builder->set("estatus",3);
    }

    // Si es cliente activamos cuenta
    else{
      $builder->set("estatus",2);
      $response = array("mensaje" => "Cuenta activada con éxito!", "tipo" => "Cliente");
    }

    $builder->where("email",base64_decode($email));

    if($builder->update())
      return $response;
    else
      return array("mensaje" => "Ha ocurrido un error", "tipo" => "");
  }
  public function guardarImagen($data){
    $db      = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->where("id",$data["id"]);
    $builder->set("imagen",$data["imagen"]);
    if($builder->update())
      return array("success" =>true,"mensaje" => "Imagen actualizada con éxito","imagen" => $data["imagen"]);
    else
      return array("success" =>false,"mensaje" => "Ha ocurrido un error");


  }

}
