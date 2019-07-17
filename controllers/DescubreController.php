<?php

require_once 'models/Usuario.php';

class descubreController{

    protected $modelUsuario;

    public function __construct(){

        $this->modelUsuario = new Usuario();
    }

    public function index(){
        
        require_once 'views/descubre.php';
    }

    public function show_cat(){

    }
    
}