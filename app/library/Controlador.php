<?php
// controlador es el controlador principal
//se va encargara de cargar los modelos del banco de dados y la vista
   class Controlador{
       //cargar el modelo
       public function modelo($model){
          // cargar el modelo 
          require_once '../app/model/' . $model . '.php';
          //instanciar el modelo
          return new $model(); 
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