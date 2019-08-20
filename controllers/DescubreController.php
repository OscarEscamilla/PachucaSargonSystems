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
        
        

        $this->modelUsuario->setCategoria($_GET['cat']);
        $this->modelUsuario->setEstado(true);
        $resultados = $this->modelUsuario->getForcategoria();

        $titulo = $this->modelUsuario->getCategoria($_GET['cat']);

        require_once 'views/show_categoria.php';
        
    
    }

    public function show_profile(){
        
        if(isset($_GET)){

            $this->modelUsuario->setId($_GET['id']);
            $result = $this->modelUsuario->getUser();
           
            require_once('views/show_profile.php');
            
        }
        
    }
   
}