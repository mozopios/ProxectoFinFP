<?php

declare(strict_types = 1);

namespace App\Controllers;

class PedidoController extends \App\Controllers\BaseController{
    
    public function mostrarFormPedido(){
        $data = array();
        $data["seccion"] = "/reserva";
        $data["session"]["permisos"] = "Administrador";
        $menuModel = new \App\Models\MenusModel();
        $menus = $menuModel->getNombres();
        $data["menus"] = $menus;
        return view("/templates/head.template.php",$data).view("pedido.view.php",$data).view("/templates/footer.template.php");
    }
    
    public function addPedido(){
        $data[] = array();
        $error = $this->checkForm($_POST);
        if (count($error) === 0) {
            $usuarioModel = new \App\Models\UsuariosModel();
            $menuModel = new \App\Models\MenusModel();
            $user = $usuarioModel->getIdWithEmail($_POST["correo_electronico"]);
            $menu = $menuModel->getPrecioMenu($_POST["id_menu"]);
            $precioTotal = $menu["precio_menu"]*$_POST["cantidad"];
            $_add = array();
            $_add = [
                "id_usuario" => "1",
                "id_menu" => $_POST["id_menu"],
                "fecha_recogida" => $_POST["fecha_recogida"],
                "hora_recogida" => $_POST["hora_recogida"],
                "estado_pedido" => "0",
                "cantidad" => $_POST["cantidad"],
                "total_pagar" => $precioTotal,
                "comentario" => $_POST["comentario"]
            ];
            $modelo = new \App\Models\PedidosModel();
            if($modelo->add($_add)){
                return redirect()->to("/"); //return redirect()->to("/pedidos/$_SESSION["id_usuario]");
            } else {
                $data["pedido"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data["seccion"] = "/reserva";
                $data["session"]["permisos"] = "Administrador";
                $data["error"]["general"] = "Error indeterminado al guardar";
                return view("templates/head.template.php",$data).view("pedido.view.php",$data).view("templates/footer.template.php");
            }
        } else {
            $data["pedido"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data["seccion"] = "/reserva";
            $data["session"]["permisos"] = "Administrador";
            $menuModel = new \App\Models\MenusModel();
            $data["menus"] = $menuModel->getNombres();
            $data["error"] = $error;
            return view("templates/head.template.php",$data).view("pedido.view.php",$data).view("templates/footer.template.php");
        }
    }
    
    function checkForm(array $post): array {
        date_default_timezone_set("Europe/Madrid");
        $error = [];
        if (empty($post["correo_electronico"])) {
            $error['correo_electronico'] = "Campo obligatorio";
        }else{
            $modelo = new \App\Models\UsuariosModel();
            if($modelo->isExistEmail($post["correo_electronico"])==0){
                $error["correo_electronico"] = "El correo electronico no pertenece a ningun usuario";
            }
        }
        if (empty($post["id_menu"])) {
            $error["id_menu"] = "Campo obligatorio";
        }else{
            $modelo = new \App\Models\MenusModel();
            if($modelo->isExistMenu($post["id_menu"])==0){
                $error["id_menu"] = "Por favor elige un menú valido";
            }
        }
        if (empty($post['fecha_recogida'])) {
            $error['fecha_recogida'] = "Campo obligatorio";
        }elseif($post["fecha_recogida"]<date("Y-m-d")){
            $error["fecha_recogida"] = "La fecha no puede ser inferior a la actual";
        }   
        if (empty($post["hora_recogida"])) {
            $error["hora_recogida"] = "Campo obligatorio";
        }elseif($post["fecha_recogida"]==date("Y-m-d")){
            if($post["hora_recogida"]<date("h:i")){
                $error["hora_recogida"] = "La hora no puede ser inferior a la actual";
            }
        }elseif(date("h:i")<date("17:00")){
            if($post["hora_recogida"]<date("13:00") || $post["hora_recogida"]>date("17:00")){
                $error["hora_recogida"] = "Nuestro horario de mañana es de 13:00 a 17:00";
            }
        }else{
            if($post["hora_recogida"]<date("21:00") || $post["hora_recogida"]>date("1:00")){
                $error["hora_recogida"] = "Nuestro horario nocturno es de 21:00 a 1:00";
            }
        }
        if (empty($post["cantidad"])) {
            $error["cantidad"] = "Campo obligatorio";
        }elseif($post["cantidad"]<=0){
            $error["cantidad"] = "La cantidad no puede ser menor a 0";
        }
        return $error;
    }
}

