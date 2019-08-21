<?php

class Banners_descubre{

    private $id;
    private $orientacion;
    private $path;
    private $categoria;
    private $con;


    public function __construct(){
        $this->con = Database::connect();

    }

   
    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getOrientacion(){
        return $this->orientacion;
    }

    public function setOrientacion($orientacion){
        $this->orientacion = $orientacion;
    }

    public function getPath(){
        return $this->path;
    }

    public function setPath($path){
        $this->path = $path;
    }



    public function getBanner(){
        try {
        
            $stmt = $this->con->prepare('SELECT * FROM banners_descubre WHERE categoria = :categoria AND orientacion = :orientacion');

            $stmt->execute(['categoria' => $this->getCategoria(), 'orientacion' => $this->getOrientacion()]);

            $resultado = $stmt->fetchAll();

            if($resultado){//si existe un resultado lo recorremos y asignamos a las variables por su getter y setter

                foreach ($resultado as $row) {

                    $this->setCategoria($row['categoria']);
                    $this->setOrientacion($row['orientacion']);
                    $this->setPath($row['path']);

                }
                
                return $resultado;
                
            }

        } catch (PDOException $e) {
            echo "Error-002 model-usuario action-login".$e->getMessage();
        }
       
    }



    public function getAll_for_categoria(){
        try {
        
            $stmt = $this->con->prepare('SELECT * FROM banners_descubre WHERE categoria = :categoria');

            $stmt->execute(['categoria' => $this->getCategoria()]);

            $resultado = $stmt->fetchAll();

            
         

            if($resultado){//si existe un resultado lo recorremos y asignamos a las variables por su getter y setter

                
                return $resultado;
                
            }

        } catch (PDOException $e) {

            echo "Error-002 model-usuario action-login".$e->getMessage();

            

        }
       
    }

    public function updateBanner(){
        try {
        
            $stmt = $this->con->prepare('UPDATE banners_descubre SET path = ? WHERE categoria = ? AND orientacion = ?');

            $resultado = $stmt->execute([$this->getPath(),$this->getCategoria(), $this->getOrientacion()]);

            if($resultado){//si existe un resultado lo recorremos y asignamos a las variables por su getter y setter

                return $resultado;
                
            }

        } catch (PDOException $e) {

            echo "Error-002 updateBanner action-updateBanner".$e->getMessage();

            

        }
    }
}