<?php

declare(strict_types = 1);

namespace App\Controllers;

class PedidoController extends \App\Controllers\BaseController{
    
    public function mostrarFormPedido(){
        $data = array();
        $data["seccion"] = "/reserva";
        return view("/templates/head.template.php",$data).view("pedido.view.php",$data).view("/templates/footer.template.php");
    }
    
    public function checkForm($post){
        
    }
}

