<?php
declare(strict_types = 1);
namespace App\Controllers;

class UsuariosController extends BaseController
{
    public function mostrarRegistrarse(){
        return view("registrarse");
    }
    
    public function mostrarLogin(){
        return view("login");
    }
    
    public function procesarLogin() {
        $usuarioModel = new \App\Models\UsuariosModel();
        $usuario = $usuarioModel->login($_POST);
        $data = [];
        if(is_null($usuario)) {
            $data["error"] = "Datos erroneos";
            $data["usuario"] = $usuario;
            return view('login.php',$data);
        } else {            
            $_SESSION['usuario'] = $usuario;   
            $rolesModel = new \App\Models\RolesModel();
            $_SESSION['permisos'] = $rolesModel->getPermisos($usuario["id_rol"]);
            $data['seccion'] = '/';
            header("Location: /");
            die();
            return view("templates/head.template.php",$data).view("index.view.php",$data).view("templates/footer.template.php");
        }
        
    }
    
    public function mostrarProfile($id)
    {
        if($_SESSION["usuario"]["id_usuario"] == $id){
            $modelo = new \App\Models\UsuariosModel();
            $data = array();
            $usuarios = $modelo->getAll();
            $data["usuarios"] = $usuarios;
            $data["seccion"] = "/profile/".$_SESSION["usuario"]["id_usuario"];
           return view("templates/head.template.php",$data).view("profile.view.php",$data).view("templates/footer.template.php");
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    
    public function mostrarTodos()
    {
        $modelo = new \App\Models\UsuariosModel();
        $data = array();
        $usuarios = $modelo->getAll();
        $data["usuarios"] = $usuarios;
        $data["seccion"] = "/users";
       return view("templates/head.template.php",$data).view("users.view.php",$data).view("templates/footer.template.php");
    }
    
    public function viewUser($id){
        $modelo = new \App\Models\UsuariosModel();
        $data = array();
        $profile = $modelo->loadUser($id);
        if(count($profile) !== 0){
            $data["seccion"] = "/users/view/$id";
            $modeloRoles = new \App\Models\RolesModel();
            $nombreRol = $modeloRoles->getNombreRol($profile[0]["id_rol"]);
            $data["user"] = $profile[0];
            $data["user"]["nombre_rol"]= $nombreRol["nombre_rol"];
            return view("templates/head.template.php",$data).view("detail.user.view.php",$data).view("templates/footer.template.php");
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    
    public function mostrarEdit($id){
        $modelo = new \App\Models\UsuariosModel();
        $modeloRoles = new \App\Models\RolesModel();
        $data = array();
        $data["seccion"] = "/users/edit/$id";
        $profile = $modelo->loadUser($id);
        if(count($profile) !== 0){
            unset($profile[0]["contraseña"]);
            $roles = $modeloRoles->getNombresAndId();
            $data["user"] = $profile[0];
            $data["roles"]= $roles;
            return view("templates/head.template.php",$data).view("user.view.php",$data).view("templates/footer.template.php");
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    
    public function edit(string $id) {
        $data[] = array();
        $_POST["id_usuario"] = $id;
        $error = $this->checkForm($_POST,"/edit");
        if (count($error) === 0) {
            $modelo = new \App\Models\UsuariosModel();
            if($modelo->edit($_POST,$id)){
                return redirect()->to("/users");
            } else {
                $data["user"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data["user"]["id_usuario"] = $id;
                $data["seccion"] = "/users/edit/$id";
                $modeloRoles = new \App\Models\RolesModel();
                $roles = $modeloRoles->getNombresAndId();
                $data["roles"]= $roles;
                $data["errorGeneral"] = "Error indeterminado al guardar";
                return view("templates/head.template.php",$data).view("user.view.php",$data).view("templates/footer.template.php");
            }
        } else {
            $data["user"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data["user"]["id_usuario"] = $id;
            $data["seccion"] = "/users/edit/$id";
            $modeloRoles = new \App\Models\RolesModel();
            $roles = $modeloRoles->getNombresAndId();
            $data["roles"]= $roles;
            $data["error"] = $error;
            return view("templates/head.template.php",$data).view("user.view.php",$data).view("templates/footer.template.php");
        }
    }
    
    public function mostrarAdd(){
        $modeloRoles = new \App\Models\RolesModel();
        $data = array();
        $data["seccion"] = "/users/add";
        $data["roles"]= $modeloRoles->getNombresAndId();;
        return view("templates/head.template.php",$data).view("user.view.php",$data).view("templates/footer.template.php");
    }
    
    public function add() {
        $data[] = array();
        $error = $this->checkForm($_POST,"/add");
        if (count($error) === 0) {
            $modelo = new \App\Models\UsuariosModel();
            if($modelo->add($_POST)){
                return redirect()->to("/users");
            } else {
                $data["user"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data["seccion"] = "/users/add";
                $modeloRoles = new \App\Models\RolesModel();
                $roles = $modeloRoles->getNombresAndId();
                $data["roles"]= $roles;
                $data["errorGeneral"] = "Error indeterminado al guardar";
                return view("templates/head.template.php",$data).view("user.view.php",$data).view("templates/footer.template.php");
            }
        } else {
            $data["user"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data["seccion"] = "/users/add";
            $modeloRoles = new \App\Models\RolesModel();
            $roles = $modeloRoles->getNombresAndId();
            $data["roles"]= $roles;
            $data["error"] = $error;
            return view("templates/head.template.php",$data).view("user.view.php",$data).view("templates/footer.template.php");
        }
    }
    
    public function procesarRegistrarse() {
        $data[] = array();
        $_POST["id_rol"] = "3";
        $error = $this->checkForm($_POST,"/add");
        if (count($error) === 0) {
            $modelo = new \App\Models\UsuariosModel();
            if($modelo->add($_POST)){
                $usuario = $modelo->getProfileWithEmail($_POST["correo_electronico"])[0];
                unset($usuario["contraseña"]);
                $_SESSION["usuario"] = $usuario;
                $permisos = new \App\Models\RolesModel();
                $_SESSION["permisos"] = $permisos->getPermisos($_POST["id_rol"]);
                return redirect()->to("/");
            } else {
                $data["user"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data["seccion"] = "/registro";
                $data["errorGeneral"] = "Error indeterminado al registrarte";
                return view("registrarse.php",$data);
            }
        } else {
            $data["user"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data["seccion"] = "/registro";
            $data["error"] = $error;
            return view("registrarse.php",$data);
        }
    }
    
    
    function checkForm(array $post, string $seccion): array {
        $error = [];
        if (empty($post['nombre_usuario'])) {
            $error['nombre_usuario'] = "Campo obligatorio";
        }
        if (empty($post['apellidos'])) {
            $error['apellidos'] = "Campo obligatorio";
        }
        if($seccion == "/add" || $post['contraseña'] != ''){
            if (empty($post['contraseña'])) {
                $error['contraseña'] = "Campo obligatorio";
            }
            else if(!preg_match('/.*[a-z].*/', $post['contraseña']) || 
                    !preg_match('/.*[A-Z].*/', $post['contraseña']) ||
                    !preg_match('/.*[0-9].*/', $post['contraseña']) ||
                    strlen($post["contraseña"]) < 8){
                    $error["contraseña"] = "El password debe contener una mayúscula, una minúscula y un número y tener una longitud mínima de 8 caracteres.";
            }
        }   
        if (empty($post["correo_electronico"])) {
            $error["correo_electronico"] = "Campo obligatorio";
        }
        else if(!filter_var($post["correo_electronico"], FILTER_VALIDATE_EMAIL)){
            $error["correo_electronico"] = 'Inserte un email válido';
        }else{
            $userModel = new \App\Models\UsuariosModel();
            if($userModel->isExistEmail($post["correo_electronico"])>1){
                $error["correo_electronico"] = 'El correo seleccionado ya está en uso';
            }       
        }
        if($seccion == "/edit" && $_SESSION["usuario"]["id_usuario"] == $post["id_usuario"]){
            if($_SESSION["usuario"]["id_rol"] != $post["id_rol"]){
                $_POST["id_rol"] = $_SESSION["usuario"]["id_rol"];
                $error["id_rol"] = "No puedes cambiarte el rol a ti mismo";
            }
        }
        if (empty($post['id_rol'])) {
            $error['id_rol'] = "Campo obligatorio";
        }
        else if(!filter_var($post['id_rol'], FILTER_VALIDATE_INT)){
            $error['id_rol'] = 'Inserte un rol válido';
        }
        else{
            $rolModel = new \App\Models\RolesModel();
            $rol = $rolModel->isExistRol((int)$post['id_rol']);
            if(is_null($rol)){
                $error['id_rol'] = 'Seleccione un rol válido';
            }
        }
        if (empty($post['telefono'])) {
            $error['telefono'] = "Campo obligatorio";
        }elseif(!preg_match("/[0-9+]+/", $post["telefono"])){
            $error["telefono"] = "Formato invalido 666666666";
        }
        return $error;
    }
    
    public function bajaAltaUser(string $id){
        $modelo = new \App\Models\UsuariosModel();
        if($_SESSION["usuario"]["id_usuario"] == $id){
            $data = array();
            $usuarios = $modelo->getAll();
            $data["errorGeneral"] = "No puedes darte de baja";
            $data["usuarios"] = $modelo->getAll();
            $data["seccion"] = "/users";
            return view("templates/head.template.php",$data).view("users.view.php",$data).view("templates/footer.template.php");
        }
        if($modelo->bajaAltaUser($id)){
            return redirect()->to("/users");
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    
    public function editProfile(string $idProfile) {
        $data[] = array();
        $_POST["id_rol"] = $_SESSION["usuario"]["id_rol"];
        $error = $this->checkForm($_POST,"/edit");
        if (count($error) === 0) {
            $modelo = new \App\Models\UsuariosModel();
            if($modelo->edit($_POST,$idProfile)){
                $user = $modelo->loadUser($idProfile)[0];
                $_SESSION["usuario"] = $user;
                return redirect()->to("/profile/$idProfile");
            } else {
                $data["user"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data["seccion"] = "/profile/$idProfile";
                $data["errorGeneral"] = "Error indeterminado al guardar";
                return view("templates/head.template.php",$data).view("profile.view.php",$data).view("templates/footer.template.php");
            }
        } else {
            $data["user"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $data["seccion"] = "/profile/$idProfile";
            $data["error"] = $error;
            return view("templates/head.template.php",$data).view("profile.view.php",$data).view("templates/footer.template.php");
        }
    }
}
