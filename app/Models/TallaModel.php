<?php namespace App\Models;

use CodeIgniter\Model;

class TallaModel extends Model{
  protected $table = 'cat_tallas';
  protected $returnType     = 'array';
  protected $allowedFields = ['id','talla','id_user','estatus','id_categoria','id_tipo'];
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
    $builder = $db->table('cat_tallas');
    $builder->where("id",$data["id"]);
    $builder->set("imagen",$data["imagen"]);
    if($builder->update())
      return array("success" =>true,"mensaje" => "Imagen actualizada con éxito","imagen" => $data["imagen"]);
    else
      return array("success" =>false,"mensaje" => "Ha ocurrido un error");
  }

  public function lista(){
    $db      = \Config\Database::connect();
    $builder = $db
            ->table('cat_tallas ct')
            ->join("cat_categorias cc","cc.id = ct.id_categoria")
            ->join("cat_tipos cti","cti.id = ct.id_tipo")
            ->select("ct.*, cc.categoria, cti.tipo");
    $query = $builder->get()->getResult();

    return $query;
    
  }

}