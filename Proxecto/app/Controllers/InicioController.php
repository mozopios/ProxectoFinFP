<?php
declare(strict_types = 1);
namespace App\Controllers;

class InicioController extends BaseController{

    public function index() {
        $data = array();
        $data["seccion"] = "/";
        $data["session"]["permisos"] = "Administrador";
        return view("templates/head.template.php",$data).view("home.view.php").view("templates/footer.template.php");
    }

}

