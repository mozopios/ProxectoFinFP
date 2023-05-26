<?php

declare(strict_types = 1);

namespace App\Models;
use CodeIgniter\Model;

class RolesModel extends Model{
    
    protected $table ="roles_usuario";
    protected $primaryKey = "id_rol";
    protected $allowedFields = ["id_rol","nombre_rol","permisos"];
    
    
    public function getNombresAndId(){
        return $this->select("id_rol, nombre_rol")->get()->getResultArray();
    }
    public function getNombreRol($id){
        return $this->select("nombre_rol")->where("id_rol",$id)->get()->getResultArray()[0];
    }
    public function isExistRol($id){
        $rol = $this->select("*")->where("id_rol", $id);
        if($result = $rol->get()->getResultArray()){
            return $result;
        }else{
            return null;
        }
    }
}

