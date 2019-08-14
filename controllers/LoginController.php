 <?php

require_once 'models/Usuario.php';

class loginController{

    private $modelUsuario;


    public function __construct(){

        $this->modelUsuario = new Usuario();
    }

    public function index(){
        if(!isset($_SESSION['usuario'])){
            require_once 'views/usuarios/login.php';
        }else{
            //header('Location:'.base_url);

            echo "<script>location.href='".base_url."';</script>";

            die();
        }
        
    }

    // funcion de logeo
    public function log(){
        //comprobar los datos que llegan de POST
        if (isset($_POST)) {
            // realizar consulta a db con los datos recibidos
            echo "<br><br><br><h1>entro al post</h1>";
            //envio de email y password recibidos por post enviados al modelo para ser usados en la consulta a db
            $this->modelUsuario->setCorreo($_POST['correo']);
            $this->modelUsuario->setPassword(md5($_POST['password']));


            $usuario = $this->modelUsuario->login();
            
            

            if($usuario && count($usuario) == 1){ //evaluamos si la variable usuario da true y ademas el numero de filas es = 1 
              
                $_SESSION['usuario'] = $usuario;//creamos la sesion del usuario
              
                 
                if($this->modelUsuario->getRol() == 'admin'){
                    
                    $_SESSION['rol'] = 'admin'; 
                    
                    //require_once 'views/usuarios/panel_admin.php';

                    echo "<script>location.href='".base_url."admin/index';</script>";

                    die();
                    //header('Location:'.base_url.'admin/index');

                }elseif ($this->modelUsuario->getRol() == 'user') {
                    
                    $_SESSION['rol'] = 'user'; 
                    
                    //require_once 'views/usuarios/panel_user.php';


                    //header('Location:'.base_url.'user/index');
                    echo "<script>location.href='".base_url."user/index';</script>";

                    die();
                }   


                
            }else{
                //invalidar session y mostrar mensaje
                
                $_SESSION['login'] = 'fallido';
                //header('Location:'.base_url.'login/index');

                echo "<script>location.href='".base_url."login/index';</script>";

                die();
                
            }
            
               
            
            
        }
        

        //crear session

    }
    //end funcion log

}