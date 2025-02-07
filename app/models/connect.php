<?php



class Database {
private $host = "localhost" ;
private $db_user = "root";
private $db_password ="";
private $db_name  = "osadnicy";
private $connection;

public function connect() {
    $this-> connection = new mysqli($this->host,$this->db_user,$this->db_password,$this ->db_name);
    if($this-> connection -> connect_errno != 0) {
        throw new Exception("Error Code number". $this->connection->connect_errno);
    }
    return $this->connection;
}
}
?>