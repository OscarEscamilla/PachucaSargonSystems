<?php


class contactoController{


    public function index(){
        require_once 'views/contacto.php';
    }


    public function enviar(){
        if(isset($_POST)){
            //echo '<br><br><br><br>';
            //var_dump($_POST['name']);

            //almacenamos datos post en variables 
            $nombre = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            //datos fijos 
            $destino = 'escamillaluquenoo@gmail.com';
            $asunto = 'Contacto de pachuca.com.mx';

            $carta = "De: $nombre \n";
            $carta .= "Correo: $email \n";
            $carta .= "Telefono: $phone \n";
            $carta .= "Mensaje: $message \n";

            //envio de correo
            mail($destino, $asunto, $carta);

            echo "<script>location.href='".base_url."contacto/index';</script>";
            $_SESSION['contacto'] = true;
            die();

            

        }
        
    }
    
}