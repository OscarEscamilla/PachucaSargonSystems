<?php

require_once 'models/Usuario.php';
require_once 'models/Banners_descubre.php';

class descubreController{

    protected $modelUsuario;
    protected $modelBanners;
    private $categoria;
     

    public function __construct(){

        $this->modelUsuario = new Usuario();
        $this->modelBanners = new Banners_descubre();
       
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }


    public function index(){
        
        require_once 'views/descubre.php';
    }

    public function show_cat(){
        
        
        //Datos obtenidos de los usuarios registrados cona la categoria llegada por GET
        $this->modelUsuario->setCategoria($_GET['cat']);
        $this->modelUsuario->setEstado(true);
        $resultados = $this->modelUsuario->getForcategoria();

        $titulo = $this->modelUsuario->getCategoria();


        //obtencion de banners de acuerdo a la categoria llegada por GET

        $this->categoria = $_GET['cat'];
        $this->modelBanners->setCategoria($_GET['cat']);
        $result = $this->modelBanners->getAll_for_categoria();

        $banners = array();

        $c = 0;
        
        foreach ($result as $row){
            
            $banners[$c] = $row;
            $c += 1;
            
        } 

        require_once 'views/show_categoria.php';
        
    
    }

    public function show_profile(){
        if(isset($_GET)){

            $this->modelUsuario->setId($_GET['id']);
            $result = $this->modelUsuario->getUser();
           
            require_once('views/show_profile.php');
            
        }
        
    }

    public function banner_update_left(){
        Utils::isAdmin();
        echo '<br><br><br><br>';
        $this->modelBanners->setOrientacion('izquierda');
        $this->modelBanners->setCategoria('hoteles');

        if (isset($_FILES['banner_left'])) {

            $banner_file = $_FILES['banner_left'];
            $banner_name = $banner_file['name'];
            $banner_type = $banner_file['type'];
 
            if ($banner_type == 'image/jpg' || $banner_type == 'image/jpeg' || $banner_type == 'image/png' || $banner_type == 'image/gif'){

                if( move_uploaded_file($banner_file['tmp_name'], 'uploads/banners/'.$banner_name)){

                    $banner_get = $this->modelBanners->getBanner();

                    $ruta_delete = $this->categoria ;

                    //unlink($ruta_delete);
                    var_dump($banner_get);

                    var_dump($ruta_delete);

                    
                    die();
                }    

                $this->modelBanners->setPath('uploads/banners/'.$banner_name);

                $banner  = $this->modelBanners->updateBanner();

                if($banner){
                    //header('Location:'.base_url);
                    echo "<script>location.href='".base_url."descubre/index';</script>";

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
        $this->modelBanners->setOrientacion('derecha');

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

                    echo "<script>location.href='".base_url."descubre/index';</script>";

                    die();
                }else{
                    $_SESSION['error_banner'] = 'Ah ocurrido un error';
                }
            }else{
                $_SESSION['error_banner'] = 'tipo de archivo invalido';
            }
            
        }

    }

    public function get_post(){
        echo '<br><br><br><br><br>';
        echo 'get_post';
        if (isset($_GET)) {
            echo $_GET['id'];
        }
       
    }
   
}