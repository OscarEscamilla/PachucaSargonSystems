<?php

require_once 'models/Usuario.php';

class registroController{

    protected $modelUsuario;

    public function __construct(){
        
        $this->modelUsuario = new Usuario();
    }

    public function index(){
        
        if(!isset($_SESSION['usuario'])){
            require_once 'views/usuarios/registro.php';
        }else{
            header('Location:'.base_url);
        }
    }

    public function save(){
        if(isset($_POST)){
            
            
            
            
            $this->modelUsuario->setNombre($_POST['nombre']);
            $this->modelUsuario->setCorreo($_POST['correo']);
            $this->modelUsuario->setCalle($_POST['calle']);
            $this->modelUsuario->setColonia($_POST['colonia']);
            $this->modelUsuario->setNumero($_POST['numero']);
            $this->modelUsuario->setMunicipio($_POST['municipio']);
            $this->modelUsuario->setDescripcion($_POST['descripcion']);
            $this->modelUsuario->setTelefono($_POST['telefono']);
            $this->modelUsuario->setPassword(md5($_POST['password']));
            $this->modelUsuario->setCategoria($_POST['categoria']);

            $save = $this->modelUsuario->save();
            if($save){
               
                $_SESSION['registro'] = 'completado';
                //echo "Registro completado!";
            }else{

                $_SESSION['registro'] = 'fallido';
                //echo "Registro fallido";
            }

        }else{
            $_SESSION['registro'] = 'fallido';
           
        }
      
        header('Location:'.base_url.'registro/index');
        
        
    
    }
}