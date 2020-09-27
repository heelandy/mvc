<?php

// caregamos libreria para despues para le en el index de la pasta public 
//que va a reprensentar la pagina principal del aplicativo
require_once 'config/configuration.php';


/*require_once 'library/Base.php';
require_once 'library/Controlador.php';
require_once 'library/Core.php';*/

//criar um autoload para los arquivo
 spl_autoload_register(function($nombreclasse){
     require_once 'library/'. $nombreclasse. '.php';
 });