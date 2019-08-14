<?php

require_once 'models/Banners_turismo.php';

class turismoController{

    protected $modelBanners;

    public function __construct(){

        $this->modelBanners =  new Banners_turismo();
    }

    public function index(){

        $result = $this->modelBanners->getAll();

        $banners = array();

        $c = 0;

        foreach ($result as $row){
            
            $banners[$c] = $row;
            $c += 1;
        }
    

     
        require_once 'views/turismo.php';
    }

    //metodos para actualizar los banners de turismo
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
                    //header('Location:'.base_url.'turismo/index');

                    echo "<script>location.href='".base_url."turismo/index';</script>";

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
                    //header('Location:'.base_url.'turismo/index');
                    echo "<script>location.href='".base_url."turismo/index';</script>";

                    die();

                    
                }else{
                    $_SESSION['error_banner'] = 'Ah ocurrido un error';
                }
            }else{
                $_SESSION['error_banner'] = 'tipo de archivo invalido';
            }
            
        }

    }


}