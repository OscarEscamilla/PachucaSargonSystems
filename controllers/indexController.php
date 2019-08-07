<?php

require_once 'models/Banners_index.php';

class indexController{

    protected $modelBanners;

    public function __construct(){
 
        $this->modelBanners = new Banners_index();

       
    }



    public function index(){

        $result = $this->modelBanners->getAll();

        $banners = array();

        $c = 0;
        foreach ($result as $row){
            
            $banners[$c] = $row;
            $c += 1;
        }
    

        require_once 'views/index.php';
        
    }

  

    
}