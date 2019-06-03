<?php


class adminController{


    public function index(){
        Utils::isAdmin();
        require_once 'views/usuarios/panel_admin.php';
    }
    
}