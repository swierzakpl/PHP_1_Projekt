<?php
session_start();
require_once "connect.php";

class Login {

    public $username;
    public $password;
    private $db; 
    public function __construct() {
        try{
        $this->db= new Database("localhost","root","","osadnicy");
    }catch(Exception $e){
        die("Datenbankverbindungsfehler : ". $e->getMessage());
    }
}
    public function Einlogen() {
        try {
            $connection = $this->db->connect();
            $stmt = $connection->prepare("Select * FROM uzytkownicy WHERE user = ?") ;

            $stmt-> bind_param("s", $this->username) ;
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                

                $row = $result->fetch_assoc();
                if($this->password === $row["pass"]){
                    session_start();
                    $_SESSION['eingelogt'] = true ;
                    $_SESSION["username"] = $row["user"];
                    header("Location: spiel.php");
                    exit();
            } else {
                $_SESSION["Fehler"] = "Falscher Benutzername oder Password";
            }
            } else {
                $_SESSION["Fehler"] = "Benutzer existiert nicht!";
            }
        }   catch(Exception $e) {
            $_SESSION["Fehler"] = "Fehler: " . $e->getMessage();            
        }   finally {
            $this->db->close();
            header("Location: index.php");
            exit();
        }
    }
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST["login"]) || isset($_POST["password"])) {
        $username = $_POST["login"];
        $password = $_POST["password"];

        $auth= new Login();
        $auth->username = $username;
        $auth->password = $password;
        $auth ->Einlogen();

    }else {
        $_SESSION["Fehler"] = "Bitte alle Felder ausfüllen!";
        header("Location: index.php");
        exit();   
     }
}

?>