<?php


class userController{


    public function index(){
        Utils::isUser();
        require_once 'views/usuarios/panel_user.php';
        

    }

    public function config(){
        Utils::isUser();
        require_once 'views/usuarios/configuracion.php';
        

    }

    public function update(){
        Utils::isUser();
        
        if (isset($_POST)) {
            # code...
        }
        

    }




    public function logout(){
        if(isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
            unset($_SESSION['usuario']);
            unset($_SESSION['rol']);
            header('Location:'.base_url);
        }
    }
    
}