<?php

declare(strict_types = 1);

namespace App\Models;
use CodeIgniter\Model;

class MenusModel extends Model{
    
    protected $table ="menus";
    protected $primaryKey = "id_menu";
    protected $allowedFields = ["id_menu","nombre_menu","primero","segundo","postre","informacion","precio_menu","estado_menu"];
    
    
    public function getNombreRol($id){
     
        return $this->select("*")->get()->getResultArray()[0];
    }
}
