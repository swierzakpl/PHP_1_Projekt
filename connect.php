<?php



class Database {
private $host ;
private $db_user;
private $db_password;
private $db_name ;

private $connection;

public function __construct($host,$db_user, $db_password, $db_name) {
    $this->host = $host;
    $this->db_user = $db_user;
    $this->db_password = $db_password;
    $this->db_name = $db_name;

}

public function connect() {
    $this-> connection = new mysqli($this->host,$this->db_user,$this->db_password,$this ->db_name);


    if($this-> connection -> connect_errno != 0) {
        throw new Exception("Error Code number". $this->connection->connect_errno);
    }
    return $this->connection;
}

public function close() {
    if($this ->connection instanceof mysqli) {
    $this->connection->close();
}
}

}
?>