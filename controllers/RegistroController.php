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
            if($_POST['password'] == $_POST['confirmacion']){
                 
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
                
                echo "<br><br><br><br><br><br><br><br><br>";
                $save = $this->modelUsuario->save();
                
                //var_dump($save);
            // die();
                if($save){
                
                    $_SESSION['registro'] = 'alert-success';
                    $_SESSION['flash'] = 'Registro Exitoso';
                    //echo "Registro completado!";
                }else{

                    $_SESSION['registro'] = 'alert-danger';
                    $_SESSION['flash'] = 'Registro fallido';
                    //echo "Registro fallido";
                }
            }else{
                $_SESSION['registro'] = 'alert-danger';
                $_SESSION['flash'] = 'Verifique que sus contraseñas coincidan';
            }
        }else{
            $_SESSION['registro'] = 'alert-danger';
            $_SESSION['flash'] = 'Error intentelo nuevamente';
           
        }
      
        header('Location:'.base_url.'registro/index');
        
        
    
    }
}