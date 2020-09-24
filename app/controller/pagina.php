<?php

 class Pagina extends Controlador
 {
     public function index(){
         $dato = [
             'titulo' => 'Aprendiendo MVC'
         ];
        $this->vista('pagina/inicio', $dato);
     }  
        public function articulo(){
         //$this->vista ('pagina/articulo');
        }
        public function actualizar($id){
            echo $id;
        }

    }
    