<?php

declare(strict_types = 1);

namespace App\Controllers;

class PedidoController extends \App\Controllers\BaseController{
    
    public function mostrarFormPedido(){
        return view("/templates/head.template.php").view("pedido.view.php").view("/templates/footer.template.php");
    }
    
    public function checkForm($post){
        
    }
}

