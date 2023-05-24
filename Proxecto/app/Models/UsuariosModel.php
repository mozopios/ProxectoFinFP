<?php
declare(strict_types = 1);
namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{
    
    protected $table ="usuarios";
    protected $primaryKey = "id_usuario";
    protected $allowedFields = ["id_rol","nombre_usuario","correo_electronico","contraseña","baja_usuario"];
    
    public function getAll(){
        return $this->select("*")->get()->getResultArray();    
    }
    
    public function getProfile(string $id){
        return $this->select("*")->where("id_usuario",$id)->get()->getResultArray()[0];
    }
    
    public function bajaAltaUser(string $id){
        $user = $this->getProfile($id);
        if($user["baja_usuario"] === 0){
            return $this->set("baja_usuario",1)->where("id_usuario",$id)->get();
        }else if($user["baja_usuario"] === 1){
            return $this->set("baja_usuario",0)->where("id_usuario",$id);
        }else{
            return false;
        }
    }
}

