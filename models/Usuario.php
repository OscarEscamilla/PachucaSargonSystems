<?php

class Usuario{

    private $id;
    private $nombre;
    private $correo;
    private $calle;
    private $colonia;
    private $numero;
    private $logo;
    private $maps_url;
    private $descripcion;
    private $telefono1;
    private $telefono2;
    private $sitio_web;
    private $password;
    private $banner;
    private $rol;
    private $categoria;
    private $municipio;

    private $con;

    public function __construct(){
        //almaceamos la conexion accedinedo al metodo estatico connect
        $this->con = Database::connect();
        $this->rol = 'user';
        $this->logo = null;
    }

    //GETTERS AND SETTERS
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }
    
    public function getCorreo(){
        return $this->correo;
    }

    public function setCalle($calle){
        $this->calle = $calle;
    }
    
    public function getCalle(){
        return $this->calle;
    }

    public function setColonia($colonia){
        $this->colonia = $colonia;
    }
    
    public function getColonia(){
        return $this->colonia;
    }


    public function setNumero($numero){
        $this->numero = $numero;
    }
    
    public function getNumero(){
        return $this->numero;
    }

    public function setLogo($logo){
        $this->logo = $logo;
    }
    
    public function getLogo(){
        return $this->logo;
    }

    public function setMaps_url($maps_url){
        $this->maps_url = $maps_url;
    }
    
    public function getMaps_url(){
        return $this->maps_url;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setTelefono1($telefono1){
        $this->telefono1 = $telefono1;
    }
    
    public function getTelefono1(){
        return $this->telefono1;
    }


    public function setTelefono2($telefono2){
        $this->telefono2 = $telefono2;
    }
    
    public function getTelefono2(){
        return $this->telefono2;
    }

    
    public function setSitio_web($sitio_web){
        $this->sitio_web = $sitio_web;
    }
    
    public function getSitio_web(){
        return $this->sitio_web;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    
    public function getPassword(){
        return $this->password;
    }

    public function setBanner($banner){
        $this->banner = $banner;
    }
    
    public function getBanner(){
        return $this->banner;
    }

    public function setRol($rol){
        $this->rol = $rol;
    }
    
    public function getRol(){
        return $this->rol;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    
    public function getCategoria(){
        return $this->categoria;
    }

    public function setMunicipio($municipio){
        $this->municipio = $municipio;
    }
    
    public function getMunicipio(){
        return $this->municipio;
    }

    //END GETTERS AND SETTERS


    



    public function save(){
        try {
            //$con = $this->db->connect();
            $stmt = $this->con->prepare("INSERT INTO usuarios (nombre, correo, calle, colonia, numero, descripcion, telefono1, password, rol, categoria, municipio) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $query = $stmt->execute([
                $this->getNombre(),
                $this->getCorreo(), 
                $this->getCalle(),
                $this->getColonia(),
                $this->getNumero(),
                $this->getDescripcion(),
                $this->getTelefono1(),
                $this->getPassword(),
                $this->getRol(),
                $this->getCategoria(),
                $this->getMunicipio(), 
                ]); # Pasar en el mismo orden de los ?
            #execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
            #Con eso podemos evaluar
        
            if ($query) {
                return true;
            }

            return false;

        } catch (PDOException $e) {
            
            $error = "email-duplicate";

            return false;
        }

    }

    
    //LOGIN
    public function login(){
        try {
        
            $stmt = $this->con->prepare('SELECT * FROM usuarios WHERE correo = :correo AND password = :password ');

            $stmt->execute(array('correo' => $this->getCorreo(), 'password' => $this->getPassword()));

            

            $resultado = $stmt->fetchAll();

            
         

            if($resultado){//si existe un resultado lo recorremos y asignamos a las variables por su getter y setter

                foreach ($resultado as $row) {
                    $this->setRol($row['rol']);
                    $this->setPassword($row['password']);
                }
                return $resultado;
                
            }

        } catch (PDOException $e) {

            echo "Error-002 model-usuario action-login".$e->getMessage();

            

        }
       
    }



}

