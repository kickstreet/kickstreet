<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model{
  protected $table = 'cat_categorias';
  protected $allowedFields = ['id','categoria','id_user','estatus'];
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
}