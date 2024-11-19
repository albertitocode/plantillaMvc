
<?php
class Connection {
    private $host;
    private $user;
    private $pass;
    private $database;
    private $port;
    private $link;

    function __construct(){
        $this->setConnect(); 
        $this->connect();
    }

    private function setConnect(){
        require_once 'conf.php';

      
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->port = $port; 
        $this->database = $database;
    }

    private function connect(){
        
        $connectionString = "host=$this->host port=$this->port dbname=$this->database user=$this->user password=$this->pass";
        
        $this->link = pg_connect($connectionString);
        
        if($this->link){
            //echo "Conexion exitosa <br>";
        } else {
            die("Error in connection: " . pg_last_error());
        }
    //     $this->link=pg_connect($this->host,$this->user,$this->pass,$this->database);
    // if($this->link){
    //     echo"Conexion exitosa <br>";
    // }else{
    //     die(pg_last_error());
    // }
    }

    public function getConnect(){
        return $this->link;
    }

    public function close(){
        pg_close($this->link);
    }
}
?>