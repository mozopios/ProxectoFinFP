<?php
declare(strict_types = 1);
namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{
    
    protected $table ="usuarios";
    protected $primaryKey = "id_usuario";
    protected $allowedFields = ["id_rol","nombre_usuario","apellido","correo_electronico","telefono","contraseña","baja_usuario"];
    
    public function getAll(){
        return $this->select("id_usuario, id_rol, nombre_usuario, apellidos, correo_electronico, telefono, baja_usuario")->get()->getResultArray();    
    }
    
    public function getProfile(string $id){
            return $this->select("*")->where("id_usuario",$id)->get()->getResultArray();
    }
    
    public function bajaAltaUser(string $id){
        $user = $this->select("*")->where("id_usuario",$id)->get()->getResultArray();
        if(count($user) !== 0){
            $data = array();
            if($user[0]["baja_usuario"] != 0){
                $this->set("baja_usuario","0");
                $this->where("id_usuario",$id);
                $this->update();
                return true;
            }elseif($user[0]["baja_usuario"] != 1){
                $this->set("baja_usuario","1");
                $this->where("id_usuario",$id);
                $this->update();
                return true;
            }
        }else{
            return false;
        }
    }
}

