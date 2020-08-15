<?php

namespace App\Models;

use CodeIgniter\Model;

class MarcaModel extends Model{
    
    protected $table = 'cat_marcas';
    protected $primaryKey = 'id';
    
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    
    protected $allowedFields = ['id', 'marca', 'es'];
    
}