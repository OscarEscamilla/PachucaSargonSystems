<?php
require_once 'models/Usuario.php';
class userController{
    protected $modelUsuario;
    public function __construct(){
        
        $this->modelUsuario = new Usuario();
    }
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
        if(isset($_POST)){
            try {
                $this->modelUsuario->setNombre($_POST['nombre']);
                $this->modelUsuario->setCorreo($_POST['correo']);
                $this->modelUsuario->setCalle($_POST['calle']);
                $this->modelUsuario->setColonia($_POST['colonia']);
                $this->modelUsuario->setNumero($_POST['numero']);
                $this->modelUsuario->setMunicipio($_POST['municipio']);
                $this->modelUsuario->setDescripcion($_POST['descripcion']);
                $this->modelUsuario->setTelefono($_POST['telefono']);
                $this->modelUsuario->setPassword(md5($_POST['password']));
                $this->modelUsuario->setSitio_web($_POST['sitio_web']);
                $this->modelUsuario->setRol($_SESSION['usuario'][0]['rol']);
                $this->modelUsuario->setCategoria($_SESSION['usuario'][0]['categoria']);
                $this->modelUsuario->setId($_SESSION['usuario'][0]['id']);
                /*datos de logo img*/
                $logo_file = $_FILES['logo'];
                $logo_name = $logo_file['name'];
                $logo_type = $logo_file['type'];
                /*datos de portada img*/
                $portada_file = $_FILES['portada'];
                $portada_name = $portada_file['name'];
                $portada_type = $portada_file['type'];
               
                if (($logo_type == 'image/jpg' || $logo_type == 'image/jpeg' || $logo_type == 'image/png' || $logo_type == 'image/gif') &&
                ($portada_type == 'image/jpg' || $portada_type == 'image/jpeg' || $portada_type == 'image/png' || $portada_type == 'image/gif')) {
                    if(!is_dir('uploads/logos')){
                        mkdir('uploads/logos', 0777, true);//pasamos parametro true para crear uno dentro de otro
                    }
                    if(!is_dir('uploads/portadas')){
                        mkdir('uploads/portadas', 0777, true);//pasamos parametro true para crear uno dentro de otro
                    }
                  
                    move_uploaded_file($logo_file['tmp_name'], 'uploads/logos/'.$logo_name);
                    move_uploaded_file($portada_file['tmp_name'], 'uploads/portadas/'.$portada_name);
                    $this->modelUsuario->setLogo(base_url.'uploads/logos/'.$logo_name);
                    $this->modelUsuario->setPortada(base_url.'uploads/portadas/'.$portada_name);
                    $save = $this->modelUsuario->update();
                    echo '<br><br><br><br><br><br>';
                    var_dump($save);
                    if($save === 1){
                       
                        $_SESSION['update'] = true;
                        //echo "Registro completado!";
                    }else{
        
                        $_SESSION['update'] = '¡Error, Intentelo nuevamente!';
                    }
         
                }else{
                    $_SESSION['update'] = '¡Formatos de imagen no validos !';
                }
               
            } catch (\Throwable $th) {
                $_SESSION['update'] = '¡Error, Intentelo nuevamente!';
            }
            
            
            
        }else{
            $_SESSION['update'] = '¡Error, Intentelo nuevamente!';
           
        }
        //header('Location:'.base_url.'user/config');
    }
    public function logout(){
        if(isset($_SESSION['usuario']) && isset($_SESSION['rol'])){
            unset($_SESSION['usuario']);
            unset($_SESSION['rol']);
            header('Location:'.base_url);
        }
    }
    
}