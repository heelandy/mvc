<?php
  // criacion da classe base para consulta en el banco de datos e ejecutar consulta co pdo
  class Base{
      private $host = BD_HOST;
      private $user = BD_USER;
      private $password = BD_PASSWORD;
      private $name_base = BD_NAME;
       
      private $dbh;
      private $stmt;
      private $error;

      public function __construct(){        
          //configurar la conexion
         // $dsn = 'mysql:host='.$this->host .';bdname='.
           //$this->name_base;

           $dsn ="mysql:host=host;dbname=name_base";

          $opciones=array(
              PDO::ATTR_PERSISTENT=>true,
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          );
    
            //Crear una instancia de PDO
            try {
                $this->dbh=new PDO($dsn, $this->user, $this->password,$opciones);
                $this->dbh->exec('set names utf8');
    
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
    
        }
    
        /* Preparamos la consulta */
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }
    
        /* Vinculamos la consulta con bind */    
        public function bind($parametro, $valor, $tipo = null){
    
            if (is_null($tipo)) {
                switch (true) {
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                        break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                        break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                        break;
                    default:
                        $tipo = PDO::PARAM_STR;
                        break;
                }
            }
    
            $this->stmt->bindValue($parametro, $valor, $tipo);
    
        }
    
        /* Ejecuta la consulta */  
        public function execute(){
            return $this->stmt->execute();
        }
    
        /* Obtener los registros */
        public function registros(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
    
        /* Obtener un solo registro */
        public function registro(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
    
        /* Obtener cantidad de filas con el método rowCount */
        public function rowCount(){
            return $this->stmt->rowCount();
        }
        
    }