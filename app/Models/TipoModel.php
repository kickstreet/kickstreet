<?php namespace App\Models;

use CodeIgniter\Model;

class TipoModel extends Model{
  protected $table = 'cat_tipos';
  protected $returnType     = 'array';
  protected $allowedFields = ['id','tipo','id_user','estatus'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  protected function beforeInsert(array $data){

    $data['data']['fecha_creacion'] = date('Y-m-d H:i:s');

    return $data;
  }

  protected function beforeUpdate(array $data){

    $data['data']['fecha_actualizacion'] = date('Y-m-d H:i:s');
    return $data;
  }

  public function guardarImagen($data){
    $db      = \Config\Database::connect();
    $builder = $db->table('cat_tipos');
    $builder->where("id",$data["id"]);
    $builder->set("imagen",$data["imagen"]);
    if($builder->update())
      return array("success" =>true,"mensaje" => "Imagen actualizada con éxito","imagen" => $data["imagen"]);
    else
      return array("success" =>false,"mensaje" => "Ha ocurrido un error");


  }
}