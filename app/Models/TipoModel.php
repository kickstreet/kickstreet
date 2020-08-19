<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoModel extends Model{
    
    protected $table = 'cat_tipo';
    protected $primaryKey = 'id';
    
    protected $returnType = 'array';
    
    protected $allowedFields = ['id', 'tipo', 'estatus'];
}    