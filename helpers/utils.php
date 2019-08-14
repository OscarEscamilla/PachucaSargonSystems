<?php 

class Utils{

    public static function deleteSession($nombre){
        if(isset($_SESSION[$nombre])){

            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);

            
        }
        
    }


    public static function isAdmin(){
        if ($_SESSION['rol'] != 'admin') {
            //header('Location:'.base_url);
            echo "<script>location.href='".base_url."';</script>";

            die();
        }
    }

    public static function isUser(){
        if ($_SESSION['rol'] != 'user') {
            //header('Location:'.base_url);

            echo "<script>location.href='".base_url."';</script>";

            die();
        }
    }


}