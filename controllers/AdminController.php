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

        $all_users = $this->modelUsuarios->getAll();

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
                    header('Location:'.base_url);
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
                    header('Location:'.base_url);
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
            
            $this->modelUsuarios->setId($_GET['user']);
            $user_delete = $this->modelUsuarios->deleteUser();

            if($user_delete == true){
                
                $_SESSION['delete'] = true;
                
            }
        
    }

    

    
}
}