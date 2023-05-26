<?php
declare(strict_types = 1);
namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{
    
    protected $table ="usuarios";
    protected $primaryKey = "id_usuario";
    protected $allowedFields = ["id_rol","nombre_usuario","apellidos","correo_electronico","telefono","contraseña","baja_usuario"];
    
    public function getAll(){
        return $this->select("id_usuario, id_rol, nombre_usuario, apellidos, correo_electronico, telefono, baja_usuario")->get()->getResultArray();    
    }
    
    public function getProfile(string $id){
            return $this->select("*")->where("id_usuario",$id)->get()->getResultArray();
    }
    
    public function bajaAltaUser(string $id){
        $user = $this->select("*")->where("id_usuario",$id)->get()->getResultArray();
        if(count($user) > 0){
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
    
    public function edit(array $_array,$id){
        $user = $this->select("*")->where("id_usuario",$id)->get()->getResultArray();
        if(count($user) > 0){
            if($_array["contraseña"]!= ""){
                $_array["contraseña"] = password_hash($_array["contraseña"],PASSWORD_DEFAULT);
                $this->set($_array);
                $this->where("id_usuario",$id);
                $this->update();
                return true;
            }else{
                $this->set($_array);
                $this->where("id_usuario",$id);
                $this->update();
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function add(array $_array){
         $_array["contraseña"] = password_hash($_array["contraseña"], PASSWORD_DEFAULT);
         $this->insert($_array);
         if($this->countAllResults()>0){
             return true;
         }else{
             return false;
         }
    }
    
    public function isExistEmail(string $email){
        $this->select("*")->where("correo_electronico", $email);
        return $this->countAllResults();
    }
}

