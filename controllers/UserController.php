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

                if(md5($_POST['password']) === $_SESSION['usuario'][0]['password']){

                
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
                    $this->modelUsuario->setMaps_url($_POST['maps_url']);
                    $this->modelUsuario->setRol($_SESSION['usuario'][0]['rol']);
                    $this->modelUsuario->setCategoria($_SESSION['usuario'][0]['categoria']);
                    $this->modelUsuario->setId($_SESSION['usuario'][0]['id']);
                    
                    /*datos de logo img*/
                    if(isset($_FILES)){
                      
                        /*
                        echo "<br><br><br><br>";
                        var_dump($_FILES);
                        */
                        if(!is_dir('uploads/logos') || !is_dir('uploads/portadas')){
                            mkdir('uploads/logos', 0777, true);//pasamos parametro true para crear uno dentro de otro
                            mkdir('uploads/portadas', 0777, true);//pasamos parametro true para crear uno dentro de otro
                        }

                      

                        if(isset($_FILES['logo'])){
                            $logo_file = $_FILES['logo'];
                            $logo_name = $logo_file['name'];
                            $logo_type = $logo_file['type'];
                            /*validacion de logo*/
                            if ($logo_type == 'image/jpg' || $logo_type == 'image/jpeg' || $logo_type == 'image/png' || $logo_type == 'image/gif'){
                            
                                move_uploaded_file($logo_file['tmp_name'], 'uploads/logos/'.$logo_name);

                                $this->modelUsuario->setLogo('uploads/logos/'.$logo_name);
                            }elseif($logo_type == ''){
                                if ($_SESSION['usuario'][0]['logo'] == null || $_SESSION['usuario'][0]['logo'] == '') {
                                    $this->modelUsuario->setLogo('');
                                }else{
                                    $this->modelUsuario->setLogo($_SESSION['usuario'][0]['logo']);
                                }
                            }else{
                                if ($_SESSION['usuario'][0]['logo'] == null || $_SESSION['usuario'][0]['logo'] == '') {
                                    $this->modelUsuario->setLogo('');
                                }else{
                                    $this->modelUsuario->setLogo($_SESSION['usuario'][0]['logo']);
                                }
                                $_SESSION['update'] = '¡Formatos de imagen no validos !';
                               



                            }
                        }else{
                            if ($_SESSION['usuario'][0]['logo'] == null || $_SESSION['usuario'][0]['logo'] == '') {
                                $this->modelUsuario->setLogo('');
                            }else{
                                $this->modelUsuario->setLogo($_SESSION['usuario'][0]['logo']);
                            }
                        }

                        if(isset($_FILES['portada'])){
                        
                            /*datos de portada img*/
                            $portada_file = $_FILES['portada'];
                            $portada_name = $portada_file['name'];
                            $portada_type = $portada_file['type'];
                            /*validacion de portada*/
                            if($portada_type == 'image/jpg' || $portada_type == 'image/jpeg' || $portada_type == 'image/png' || $portada_type == 'image/gif'){

                                move_uploaded_file($portada_file['tmp_name'], 'uploads/portadas/'.$portada_name);
                                $this->modelUsuario->setPortada('uploads/portadas/'.$portada_name);

                            }elseif($portada_type == ''){
                                if ($_SESSION['usuario'][0]['portada'] == null || $_SESSION['usuario'][0]['portada'] == '') {
                                    $this->modelUsuario->setPortada('');
                                }else{
                                    $this->modelUsuario->setPortada($_SESSION['usuario'][0]['portada']);
                                }
                            }else{
                                if ($_SESSION['usuario'][0]['portada'] == null || $_SESSION['usuario'][0]['portada'] == '') {
                                    $this->modelUsuario->setPortada('');
                                }else{
                                    $this->modelUsuario->setPortada($_SESSION['usuario'][0]['portada']);
                                }
                                $_SESSION['update'] = '¡Formatos de imagen no validos !';
                              
                            }
                        }else{

                            if ($_SESSION['usuario'][0]['portada'] == null || $_SESSION['usuario'][0]['portada'] == '') {
                                $this->modelUsuario->setPortada('');
                            }else{
                                $this->modelUsuario->setPortada($_SESSION['usuario'][0]['portada']);
                            }
                            
                        }

                        
                        
                        
                        
                        

                    }else{
                        if ($_SESSION['usuario'][0]['logo'] == null || $_SESSION['usuario'][0]['logo'] == '') {
                            $this->modelUsuario->setLogo($_SESSION['usuario'][0]['logo']);
                        }else{
                            $this->modelUsuario->setLogo('');
                        }


                        if ($_SESSION['usuario'][0]['portada'] == null || $_SESSION['usuario'][0]['portada'] == '') {
                            $this->modelUsuario->setPortada($_SESSION['usuario'][0]['portada']);
                        }else{
                            $this->modelUsuario->setPortada('');
                        }

                       

                    }  
                    
                    
                     
                    $save = $this->modelUsuario->update();

                    if($save == true){
                        $usuario = $this->modelUsuario->getUser();
                        unset($_SESSION['usuario']);
                        $_SESSION['usuario'] = $usuario;
                        
                        
                        $_SESSION['update'] = true;

                        //header('Location:'.base_url.'user/index');

                        echo "<script>location.href='".base_url."user/index';</script>";

                        die();
                    }
                    
                }else{
                    $_SESSION['update'] = '¡Contraseña Incorrecta !';
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

        //header('Location:'.base_url);

        echo "<script>location.href='".base_url."';</script>";

        die();
    }


   
    
}


