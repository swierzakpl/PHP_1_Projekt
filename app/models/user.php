<?php

require_once __DIR__ ."/connect.php";

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
}

public function login ($username, $password) { 
    $stmt = $this->db->prepare("SELECT * FROM uzytkownicy WHERE user = ?") ;
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0 ) {
        $row = $result->fetch_assoc();
        if($password === $row["password"]) {
            return $row;
    }
}
return false ;
}   
}

?>