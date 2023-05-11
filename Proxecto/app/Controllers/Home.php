<?php
declare(strict_types = 1);
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $modelo = new \App\Models\UsuariosModel;
        $data = array();
        $usuarios = $modelo->getAll();
        $data["usuarios"] = $usuarios;
        $data["seccion"] = "/clientes";
       return view("templates/head.template.php",$data).view("index.view.php",$data).view("templates/footer.template.php");
    }
}
