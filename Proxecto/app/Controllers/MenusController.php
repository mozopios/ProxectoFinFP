<?php
declare(strict_types = 1);
namespace App\Controllers;

class MenusController extends BaseController
{
    public function mostrarMenus(){
        $data= array();
        $data["seccion"] = "/menus";
        $data["session"]["permisos"] = "Administrador";
        $menuModel = new \App\Models\MenusModel();
        $data["menus"] = $menuModel->getAll();
        return view("templates/head.template.php",$data).view("menus.view.php",$data).view("templates/footer.template.php");
    }
    
     public function viewMenu($id){
        $modelo = new \App\Models\MenusModel();
        $data = array();
        if($modelo->isExistMenu($id)>0){
            $menu = $modelo->getMenu($id);
            if($_SESSION["permisos"]["menus"] == "rw" && $menu["estado_menu"] != 0){
                $data["errorGeneral"] = "El menú no está disponible";
                $data["menus"] = $modelo->getAll();
                $data["seccion"] = "/menus";
                return view("templates/head.template.php",$data).view("menus.view.php",$data).view("templates/footer.template.php");
            }else{
                $data["menu"] = $menu;
                $data["seccion"] = "/menu/view/$id";
                return view("templates/head.template.php",$data).view("detail.menu.view.php",$data).view("templates/footer.template.php");
            }
        }
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    
    public function mostrarEdit($id){
        $modelo = new \App\Models\MenusModel();
        $data = array();
        if($modelo->isExistMenu($id)>0){
            $data["seccion"] = "/menus/edit/$id";
            $data["session"]["permisos"] = "Administrador";
            $menu = $modelo->getMenu($id);
            $data["menu"] = $menu;
            return view("templates/head.template.php",$data).view("menu.view.php",$data).view("templates/footer.template.php");
        }
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    
    public function edit($id) {
        $data[] = array();
        $error = $this->checkForm($_POST);
        if (count($error) === 0) {
            $modelo = new \App\Models\MenusModel();
            if($modelo->edit($_POST,$id)){
                return redirect()->to("/menus");
            } else {
                $data["menu"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data["seccion"] = "/menus/edit/$id";
                $data["session"]["permisos"] = "Administrador";
                $data["error"]["general"] = "Error indeterminado al guardar";
                return view("templates/head.template.php",$data).view("menu.view.php",$data).view("templates/footer.template.php");
            }
        } else {
            $data["menu"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data["seccion"] = "/menus/edit/$id";
            $data["session"]["permisos"] = "Administrador";
            $data["error"] = $error;
            return view("templates/head.template.php",$data).view("menu.view.php",$data).view("templates/footer.template.php");
        }
    }
    
    public function mostrarAdd(){
        $data = array();
        $data["seccion"] = "/menus/add";
        $data["session"]["permisos"] = "Administrador";
        return view("templates/head.template.php",$data).view("menu.view.php",$data).view("templates/footer.template.php");
    }
    
    public function add() {
        $data[] = array();
        $error = $this->checkForm($_POST);
        if (count($error) === 0) {
            $modelo = new \App\Models\MenusModel();
            if($modelo->add($_POST)){
                return redirect()->to("/menus");
            } else {
                $data["menu"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data["seccion"] = "/menus/add";
                $data["session"]["permisos"] = "Administrador";
                $data["error"]["general"] = "Error indeterminado al guardar";
                return view("templates/head.template.php",$data).view("menu.view.php",$data).view("templates/footer.template.php");
            }
        } else {
            $data["menu"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data["seccion"] = "/menus/add";
            $data["session"]["permisos"] = "Administrador";
            $data["error"] = $error;
            return view("templates/head.template.php",$data).view("menu.view.php",$data).view("templates/footer.template.php");
        }
    }
    
    public function bajaAltaMenu(string $id){
        $modelo = new \App\Models\MenusModel();
        if($modelo->bajaAltaMenu($id)){
            return redirect()->to("/menus");
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    
    function checkForm(array $post): array {
        $error = [];
        if (empty($post['nombre_menu'])) {
            $error['nombre_menu'] = "Campo obligatorio";
        }else{
            $modelo = new \App\Models\MenusModel();
            if($modelo->isExistNombre($post["nombre_menu"])>0){
                $error["nombre_menu"] = "El nombre del menú ya existe";
            }
        }
        if (empty($post['primero'])) {
            $error['primero'] = "Campo obligatorio";
        }
        if (empty($post['segundo'])) {
            $error['segundo'] = "Campo obligatorio";
        }   
        if (empty($post["postre"])) {
            $error["postre"] = "Campo obligatorio";
        }
        if (empty($post['informacion'])) {
            $error['informacion'] = "Campo obligatorio";
        }
        if (empty($post['precio_menu'])) {
            $error['precio_menu'] = "Campo obligatorio";
        }elseif(!is_numeric($post["precio_menu"])){
            $error["precio_menu"] = "El precio no es numerico";
        }
        return $error;
    }
}

