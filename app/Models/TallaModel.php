<?php

namespace App\Models;

use CodeIgniter\Model;

class TallaModel extends Model{
    
    protected $table = 'cat_tallas';
    protected $primaryKey = 'id';
    
    protected $returnType = 'array';
    
    protected $allowedFields = ['id', 'id_categoria', 'talla', 'id_tipo', 'estatus'];
    
}