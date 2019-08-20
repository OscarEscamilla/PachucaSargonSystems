<?php

require_once 'models/Banners_index.php';
require_once 'models/Usuario.php';

class adminController{

    protected $modelBanners;
    protected $modelUsuarios;


    public function __construct(){
 
        $this->modelBanners = new Banners_index();
        $this->modelUsuarios = new Usuario();
    }


    public function index(){
        Utils::isAdmin();

        //seteamos a la variable rol con su funcion setRol dandole como valor 'user' para asi evitar seleccionar user de tipo admin
        $this->modelUsuarios->setRol('user');

        $all_users = $this->modelUsuarios->getAll();

        $this->modelUsuarios->setEstado('1');

        $on_users = $this->modelUsuarios->getOn_off();

        $this->modelUsuarios->setEstado('0');

        $off_users = $this->modelUsuarios->getOn_off();

        require_once 'views/usuarios/panel_admin.php';
    }
    
    
    //metodo para actualizar los banners de index
    public function banner_update_left(){
        Utils::isAdmin();
        echo '<br><br><br><br>';
        $this->modelBanners->setId(2);

        if (isset($_FILES['banner_left'])) {
            $banner_file = $_FILES['banner_left'];
            $banner_name = $banner_file['name'];
            $banner_type = $banner_file['type'];

            if ($banner_type == 'image/jpg' || $banner_type == 'image/jpeg' || $banner_type == 'image/png' || $banner_type == 'image/gif'){

                if( move_uploaded_file($banner_file['tmp_name'], 'uploads/banners/'.$banner_name)){
                    $this->modelBanners->getBanner();

                    $ruta_delete = $this->modelBanners->getPath();

                    unlink($ruta_delete);
                    
                }    
                $this->modelBanners->setPath('uploads/banners/'.$banner_name);

                $banner  = $this->modelBanners->updateBanner();

                if($banner){
                    //header('Location:'.base_url);
                    echo "<script>location.href='".base_url."';</script>";

                    die();
                }else{
                    $_SESSION['error_banner'] = 'ah ocurrido un error';
                }
            }else{
                $_SESSION['error_banner'] = 'tipo de archivo invalido';
            }
            
        }

        
    }

    public function banner_update_rigth(){
        Utils::isAdmin();
        echo '<br><br><br><br>';
        $this->modelBanners->setId(1);

        if (isset($_FILES['banner_rigth'])) {
            $banner_file = $_FILES['banner_rigth'];
            $banner_name = $banner_file['name'];
            $banner_type = $banner_file['type'];

            if ($banner_type == 'image/jpg' || $banner_type == 'image/jpeg' || $banner_type == 'image/png' || $banner_type == 'image/gif'){
                            
                move_uploaded_file($banner_file['tmp_name'], 'uploads/banners/'.$banner_name);

    
                $this->modelBanners->setPath('uploads/banners/'.$banner_name);

                $banner  = $this->modelBanners->updateBanner();

                if($banner){
                    //header('Location:'.base_url);

                    echo "<script>location.href='".base_url."';</script>";

                    die();
                }else{
                    $_SESSION['error_banner'] = 'Ah ocurrido un error';
                }
            }else{
                $_SESSION['error_banner'] = 'tipo de archivo invalido';
            }
            
        }

    }


    public function deleteuser(){
        if (isset($_GET)) {
            
            $this->modelUsuarios->setId($_GET['id']);
        
            $user_delete = $this->modelUsuarios->deleteUser();


            if($user_delete == true){
                
                $_SESSION['on_off'] = 'alert-success';
                $_SESSION['flash'] = 'La empresa fue eliminada correctamente';

                echo "<script>location.href='".base_url."admin/index';</script>";

                die();
                
            }
        

        }
    }

    public function on_estado(){
        if (isset($_GET)) {
            $this->modelUsuarios->setEstado('1');
            $this->modelUsuarios->setId($_GET['id']);
            $on = $this->modelUsuarios->update_estado();

            if($on == true){

                $_SESSION['on_off'] = 'alert-success';
                $_SESSION['flash'] = 'La empresa se activo correctamente';

                echo "<script>location.href='".base_url."admin/index';</script>";

                die();
                
            }else{
                $_SESSION['on_off'] = 'alert-danger';
                $_SESSION['flash'] = '¡Ah ocurrido un error!';
            }
        }
    }

    public function off_estado(){
        if (isset($_GET)) {
            $this->modelUsuarios->setEstado('0');
            $this->modelUsuarios->setId($_GET['id']);
            $off = $this->modelUsuarios->update_estado();

            if($off == true){
                
                $_SESSION['on_off'] = 'alert-success';
                $_SESSION['flash'] = 'La empresa fue desactivada del sitio correctamente';
            
                echo "<script>location.href='".base_url."admin/index';</script>";

                die();
                
            }else{

                $_SESSION['on_off'] = 'alert-danger';
                $_SESSION['flash'] = '¡Ah ocurrido un error!';
            }
        }
    }

    public function showserver(){
        echo '<br><br><br><br><br>';
        
        echo $_SERVER['SERVER_SOFTWARE'];
        
    }

    

    

}