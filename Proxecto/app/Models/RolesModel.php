<?php

declare(strict_types = 1);

namespace App\Models;
use CodeIgniter\Model;

class RolesModel extends Model{
    
    protected $table ="roles_usuario";
    protected $primaryKey = "id_rol";
    protected $allowedFields = ["id_rol","nombre_rol","permisos"];
    
    
    public function getNombreRol($id){
     
        return $this->select("nombre_rol")->where("id_rol",$id)->get()->getResultArray()[0];
    }
}

