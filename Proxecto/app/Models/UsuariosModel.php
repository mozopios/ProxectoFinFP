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
    
    public function loadUser(string $id){
            return $this->select("*")->where("id_usuario",$id)->get()->getResultArray();
    }
    
    public function getProfileWithEmail(string $email){
        return $this->select("*")->where("correo_electronico",$email)->get()->getResultArray();
    }
    
    public function login(array $array) {
        $pass = array();
        $this->select("*")->where("correo_electronico",$array["correo_electronico"]);
        $this->where("baja_usuario",0);
        if($this->countAllResults() == 1) {
            $user = $this->select("*")->where("correo_electronico",$array["correo_electronico"])->get()->getResultArray()[0];
            if(password_verify($array["contraseña"],$user["contraseña"])){
                unset($user["contraseña"]);
                return $user;
            }
        } 
        return NULL;
        
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
    
    public function edit(array $_array,string $id){
        $user = $this->select("*")->where("id_usuario",$id)->get()->getResultArray();
        if(count($user) > 0){
            if(!empty($_array["contraseña"])){
                $_array["contraseña"] = password_hash($_array["contraseña"],PASSWORD_DEFAULT);
                $this->set($_array);
                $this->where("id_usuario",$id);
                $this->update();
                return true;
            }else{
                unset($_array["contraseña"]);
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
         $contraseña = password_hash($_array["contraseña"],PASSWORD_DEFAULT);
         unset($_array["contraseña"]);
         $_array["contraseña"] = $contraseña;
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
    
    public function getIdWithEmail(string $email){
        return $this->select("id_usuario")->where("correo_electronico", $email)->get()->getResultArray()[0];
    }
    
    public function getNombre(string $id){
        return $this->select("nombre_usuario,apellidos")->where("id_usuario", $id)->get()->getResultArray()[0];
    }
}

