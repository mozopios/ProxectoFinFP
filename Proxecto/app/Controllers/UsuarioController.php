<?php
declare(strict_types = 1);
namespace App\Controllers;

class UsuarioController extends BaseController
{
    public function index()
    {
        return view("templates/head.template.php").view("home.view.php").view("templates/footer.template.php");
    }
    
    public function mostrarTodos()
    {
        $modelo = new \App\Models\UsuariosModel;
        $data = array();
        $usuarios = $modelo->getAll();
        $data["usuarios"] = $usuarios;
        $data["seccion"] = "/users";
       return view("templates/head.template.php",$data).view("users.view.php",$data).view("templates/footer.template.php");
    }
    
    public function viewUser($id){
        $modelo = new \App\Models\UsuariosModel();
        $modeloRoles = new \App\Models\RolesModel();
        $data = array();
        $data["seccion"] = "/users/view";
        $profile = $modelo->getProfile($id);
        if(count($profile) !== 0){
            $nombreRol = $modeloRoles->getNombreRol($profile[0]["id_rol"]);
            $data["user"] = $profile[0];
            $data["user"]["nombre_rol"]= $nombreRol["nombre_rol"];
            return view("templates/head.template.php",$data).view("user.view.php",$data).view("templates/footer.template.php");
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    
    public function bajaAltaUser(string $id){
        $modelo = new \App\Models\UsuariosModel();
        if($modelo->bajaAltaUser($id)){
            return redirect()->to("/users");
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
