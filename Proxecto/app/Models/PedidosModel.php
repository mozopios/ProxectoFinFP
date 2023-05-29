<?php

declare(strict_types = 1);

namespace App\Models;
use CodeIgniter\Model;

class PedidosModel extends Model{
    
    protected $table ="pedidos";
    protected $primaryKey = "id_pedido";
    protected $allowedFields = ["id_pedido","id_usuario","id_menu","hora_recogida","fecha_recogida","estado_pedido","total_pagar","cantidad","comentario"];
    
    public function add(array $_add){
        $this->insert($_add);
        if($this->countAllResults()>0){
            return true;
        }else{
            return false;
        }
    }
}

