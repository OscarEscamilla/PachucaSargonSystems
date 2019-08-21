<?php

class Banners_index{


    private $id;
    private $orientacion;
    private $path;
    private $con;


    public function __construct(){
        $this->con = Database::connect();

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

    //metodo para obtener los datos del banner izquierdo
    public function updateBanner(){
        try {
        
            $stmt = $this->con->prepare('UPDATE banners_index SET path = ? WHERE id = ?');

            $resultado = $stmt->execute([$this->getPath(),$this->getId()]);

            if($resultado){//si existe un resultado lo recorremos y asignamos a las variables por su getter y setter

                return $resultado;
                
            }

        } catch (PDOException $e) {

            echo "Error-002 model-usuario action-login".$e->getMessage();

            

        }
    }


    public function getAll(){
        try {

            $sql = 'SELECT * FROM banners_index';

            $result = $this->con->query($sql);
            return $result;


        } catch (PDOException $e) {

            echo "Error-002 model-banners_index getAll".$e->getMessage();

            

        }
       
    }


    public function getBanner(){
        try {
        
            $stmt = $this->con->prepare('SELECT * FROM banners_index WHERE id = :id');

            $stmt->execute(['id' => $this->getId()]);

            $resultado = $stmt->fetchAll();

            
         

            if($resultado){//si existe un resultado lo recorremos y asignamos a las variables por su getter y setter

                foreach ($resultado as $row) {
                    $this->setOrientacion($row['orientacion']);
                    $this->setPath($row['path']);
                }
                
                return $resultado;
                
            }

        } catch (PDOException $e) {

            echo "Error-002 model-usuario action-login".$e->getMessage();

            

        }
       
    }


}