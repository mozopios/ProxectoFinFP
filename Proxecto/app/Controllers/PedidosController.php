<?php

declare(strict_types = 1);

namespace App\Controllers;

class PedidosController extends \App\Controllers\BaseController{
    
    public function mostrarTodos()
    {
        $modelo = new \App\Models\PedidosModel();
        $data = array();
        $data["seccion"] = "/pedidos";
        if($_SESSION["permisos"]["pedidos"] == "r"){
            $pedidos = $modelo->getForCama();
            if(empty($pedidos)){
                $data["aviso"] = "No hay pedidos para la jornada de hoy";
                return view("templates/head.template.php",$data).view("pedidos.view.php",$data).view("templates/footer.template.php");
            }else{
               $data["pedidos"] = $pedidos;
               return view("templates/head.template.php",$data).view("pedidos.view.php",$data).view("templates/footer.template.php");
            }
        }
        $pedidos = $modelo->getAll();
        $data["pedidos"] = $pedidos;
       return view("templates/head.template.php",$data).view("pedidos.view.php",$data).view("templates/footer.template.php");
    }
    
    public function viewPedido($id){
        $modeloPedido = new \App\Models\PedidosModel();
        $data = array();
        if($modeloPedido->isExistPedido($id)>0){
            $data["seccion"] = "/pedidos/view/$id";
            $pedido = $modeloPedido->getPedido($id);
            $data["pedido"] = $pedido;
            $userModel = new \App\Models\UsuariosModel();
            $data["user"] = $userModel->loadUser($pedido["id_usuario"])[0];
            $menuModel = new \App\Models\MenusModel();
            $data["menu"] = $menuModel->getMenu($pedido["id_menu"]);
            return view("templates/head.template.php",$data).view("detail.pedido.view.php",$data).view("templates/footer.template.php");
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    
    public function mostrarFormPedido(){
        $data = array();
        $data["seccion"] = "/reserva";
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
            $nombre_menu = $menuModel->getNombre($_POST["id_menu"]);
            $_add = array();
            $_add = [
                "id_usuario" => $user["id_usuario"],
                "id_menu" => $_POST["id_menu"],
                "correo_electronico" => $_POST["correo_electronico"],
                "nombre_menu" =>$nombre_menu,
                "fecha_recogida" => $_POST["fecha_recogida"],
                "hora_recogida" => $_POST["hora_recogida"],
                "estado_pedido" => "0",
                "cantidad" => $_POST["cantidad"],
                "total_pagar" => $precioTotal,
                "comentario" => $_POST["comentario"]
            ];
            $modelo = new \App\Models\PedidosModel();
            if($modelo->add($_add)){
                return redirect()->to("/pedidos/cliente/".$_SESSION["usuario"]["id_usuario"]);
            } else {
                $data["pedido"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data["seccion"] = "/pedidos/cliente/".$_SESSION["usuario"]["id_usuario"];
                $data["errorGeneral"] = "Error indeterminado al guardar";
                return view("templates/head.template.php",$data).view("pedidos.view.php",$data).view("templates/footer.template.php");
            }
        } else {
            $data["pedido"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data["seccion"] = "/reserva";
            $menuModel = new \App\Models\MenusModel();
            $data["menus"] = $menuModel->getNombres();
            $data["error"] = $error;
            return view("templates/head.template.php",$data).view("pedidos.view.php",$data).view("templates/footer.template.php");
        }
    }
    
    public function realizadoPedido(string $id){
        $modelo = new \App\Models\PedidosModel();
        if($modelo->isRealizado($id)){
            return redirect()->to("/pedidos");
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
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
        }elseif($post["hora_recogida"]>date("17:00") && $post["hora_recogida"]<date("13:00") || $post["hora_recogida"]<date("21:00") && $post["hora_recogida"]>date("1:00")){
                $error["hora_recogida"] = "Porfavor echele un vistazo al horario del footer";
        }
        if (empty($post["cantidad"])) {
            $error["cantidad"] = "Campo obligatorio";
        }elseif($post["cantidad"]<=0){
            $error["cantidad"] = "La cantidad no puede ser menor a 0";
        }
        return $error;
    }
    
    public function mostrarPedidosCliente(string $idCliente){
        $data = array();
        if($idCliente == $_SESSION["usuario"]["id_usuario"]){
            $data["seccion"] = "/pedidos/cliente/$idCliente";
            $modelo = new \App\Models\PedidosModel();
            $data["pedidos"] = $modelo->getPedidoCliente($idCliente);
            return view("templates/head.template.php",$data).view("pedidos.view.php",$data).view("templates/footer.template.php"); 
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

