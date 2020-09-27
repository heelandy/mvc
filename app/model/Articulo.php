<?php
   class Articulo{
       private $db;

       public function __construct(){
           $this->db = new Base;
       }
      
       public function obtnerArticulo(){
         $this->db->query("SELECT * FROM articulo");
         return $this->db->registro();
       }
       
   }