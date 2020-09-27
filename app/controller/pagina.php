<?php

 class Pagina extends Controlador
 {
     
     public function __construct(){
        $this->articuloModel = $this->modelo('Articulo');
     }

     public function index(){
         
        $articulo = $this->articuloModel->obtnerArticulo();

         $dato = [
             'titulo' => 'Aprendiendo MVC',
             'articulos'=> $articulo
         ];
         //pasar el paramentro junto con el metodo o vista
        $this->vista('pagina/inicio', $dato);
     }  
        public function articulo(){
         //$this->vista ('pagina/articulo');
        }
        public function actualizar($id){
            echo $id;
        }

    }
    