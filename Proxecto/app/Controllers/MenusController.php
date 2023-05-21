<?php
declare(strict_types = 1);
namespace App\Controllers;

class UsuarioController extends BaseController
{
    public function index()
    {
        return view("templates/head.template.php").view("menus.view.php").view("templates/footer.template.php");
    }
}

