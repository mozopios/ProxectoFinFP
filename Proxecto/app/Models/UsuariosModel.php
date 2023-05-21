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
    
    public function viewProfile(string $id){
        return $this->select("*")->where("id_usuario",$id)->get()->getResultArray()[0];
    }
}

