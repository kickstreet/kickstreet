<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model{
    
    protected $table = 'cat_productos';
    protected $primaryKey = 'id';
    
    protected $returnType     = 'array';
    
    protected $allowedFields = ['id_talla', 'id_marca', 'codigo', 'producto', 'descripcion', 'precio', 'status', 'fecha_alta', 'fecha_actualizacion'];
    
}