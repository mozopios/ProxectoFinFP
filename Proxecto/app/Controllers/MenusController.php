<?php
declare(strict_types = 1);
namespace App\Controllers;

class MenusController extends BaseController
{
    public function mostrarMenus(){
        $data= array();
        $data["seccion"] = "/menus";
        $menuModel = new \App\Models\MenusModel();
        $data["menus"] = $menuModel->getAll();
        return view("templates/head.template.php",$data).view("menus.view.php",$data).view("templates/footer.template.php");
    }
    
     public function viewMenu($id){
        $modelo = new \App\Models\MenusModel();
        $data = array();
        $data["seccion"] = "/menus/view";
        $menu = $modelo->getMenu($id);
        $data["menu"] = $menu;
        return view("templates/head.template.php",$data).view("menu.view.php",$data).view("templates/footer.template.php");
    }
    
    public function bajaAltaMenu(string $id){
        $modelo = new \App\Models\MenusModel();
        if($modelo->bajaAltaMenu($id)){
            return redirect()->to("/menus");
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

