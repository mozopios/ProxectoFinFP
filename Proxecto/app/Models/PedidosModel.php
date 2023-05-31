<?php

declare(strict_types = 1);

namespace App\Models;
use CodeIgniter\Model;

class PedidosModel extends Model{
    
    protected $table ="pedidos";
    protected $primaryKey = "id_pedido";
    protected $allowedFields = ["id_pedido","id_usuario","id_menu","correo_electronico","nombre_menu","hora_recogida","fecha_recogida","estado_pedido","total_pagar","cantidad","comentario"];
    
    public function getAll(){
        return $this->select("*")->get()->getResultArray();
    }
    
    public function getForCama(){
        $this->select("*")->where("estado_pedido",0);
        $this->where("fecha_recogida",date("Y-m-d"));
        $this->orWhere("estado_pedido",0);
        $this->where("fecha_recogida", date("Y-m-d", strtotime(date("Y-m-d")."+ 1 days")));
        return $this->where("hora_recogida","01:00:00")->get()->getResultArray();
    }
    
    public function isExistPedido(string $id){
        $this->select("*")->where("id_pedido", $id);
        return $this->countAllResults();
    }
    
    public function getPedido(string $id){
        return $this->select("*")->where("id_pedido",$id)->get()->getResultArray()[0];
    }
    
    public function add(array $_add){
        $this->insert($_add);
        if($this->countAllResults()>0){
            return true;
        }else{
            return false;
        }
    }
    
    public function isRealizado(string $id){
        $menu = $this->select("*")->where("id_pedido",$id)->get()->getResultArray();
        if(count($menu) !== 0){
            $data = array();
            if($menu[0]["estado_pedido"] != 0){
                $this->set("estado_pedido","0");
                $this->where("id_pedido",$id);
                $this->update();
                return true;
            }elseif($menu[0]["estado_pedido"] != 1){
                $this->set("estado_pedido","1");
                $this->where("id_pedido",$id);
                $this->update();
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function getPedidoCliente(string $idCliente){
       return $this->select("*")->where("id_usuario",$idCliente)->get()->getResultArray();
    }
}

