<?php
   /*traer la url ingresado en el navegador
   1- controlador
   2- metodo
   3- parametro  
   Ejemplo: /articulos/actualizar/4
  */
  class Core{

    protected $controladorActual = 'pagina';
    protected $metodoActual = 'index';
    protected $parametro = [];

    public function __Construct(){
      // print_r ($this->getUrl());
      $url = $this->getUrl(); 
      //buscar en controller si existe controlador
        if (isset($url[0])) {
          if (file_exists('../app/controller/' .ucwords($url[0]).'.php')) {
           // si existe troca el controlador actual para el controlador requirido por el usuario
           $this->controladorActual = ucwords($url[0]);
            //unset 
            unset($url[0]);
          }
       }
      //requerir el nuevo controlador
         require_once '../app/controller/'. $this->controladorActual .'.php';  
         $this->controladorActual = new $this->controladorActual;
 
         //si recebemos un metodo en la url 
         if (isset($url[1])) {
           //chequear con el controlador si  la segunda parte del url existe el metodo
           if (method_exists($this->controladorActual, $url[1])) {
            //si existe el metodo desmontar el que tenia por default
            $this->metodoActual = $url[1];
            //unset o indice 
            unset($url[1]);
           }

         }
         
         /*echo $this-> metodoActual;
         para verificar el metodo en la web*/

          // recebemos un parametro en la url
         $this->parametro = $url ? array_values($url) : [];//en caso que no se pasa por url el parametro ficara com um array vazio
        // llamar callback los parametro en el array
        //el controlador e el metodo deben estar en n array
        // verificar con el controlador el metodo si hay un parametro que vine junto con ellos
        call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametro);

 }

 
    public function getUrl(){
        //echo $_GET['url'];
        if (isset($_GET['url'])) {
          $url = rtrim($_GET['url'], '/');
          $url = filter_var($url, FILTER_SANITIZE_URL);
          $url = explode('/', $url);
          return $url;

        }
    }
  }