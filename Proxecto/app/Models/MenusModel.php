<?php

declare(strict_types = 1);

namespace App\Models;
use CodeIgniter\Model;

class MenusModel extends Model{
    
    protected $table ="menus";
    protected $primaryKey = "id_menu";
    protected $allowedFields = ["id_menu","nombre_menu","primero","segundo","postre","informacion","precio_menu","estado_menu"];
    
     public function getAll(){
        return $this->select("*")->get()->getResultArray();
    }
    
    public function getMenu(string $id){
        return $this->select("*")->where("id_menu",$id)->get()->getResultArray()[0];
    }
    
     public function bajaAltaMenu(string $id){
        $menu = $this->select("*")->where("id_menu",$id)->get()->getResultArray();
        if(count($menu) !== 0){
            $data = array();
            if($menu[0]["estado_menu"] != 0){
                $this->set("estado_menu","0");
                $this->where("id_menu",$id);
                $this->update();
                return true;
            }elseif($menu[0]["estado_menu"] != 1){
                $this->set("estado_menu","1");
                $this->where("id_menu",$id);
                $this->update();
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function edit(array $_array,$id){
        $menu = $this->select("*")->where("id_menu",$id)->get()->getResultArray();
        if(count($menu) > 0){
            $this->set($_array);
            $this->where("id_menu",$id);
            $this->update();
            return true;
        }else{
            return false;
        }
    }
    public function getNombres(){
        return $this->select("id_menu, nombre_menu")->get()->getResultArray();
    }
}
