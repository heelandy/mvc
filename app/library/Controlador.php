<?php
// controlador es el controlador principal
//se va encargara de cargar los modelos del banco de dados y la vista
   class Controlador{
       //cargar el modelo
       public function modelo($modelo){
          // cargar el modelo 
          require_once '../app/modelo/' . $modelo . '.php';
          //instanciar el modelo
          return new $modelo(); 
       }

       public function vista($vista, $dato = []){
        //chequar si existe la vista
        if (file_exists('../app/view/' . $vista . '.php')) {
            require_once '../app/view/' . $vista . '.php';
        }else {
            die('file not found');
        }

     }

   } 