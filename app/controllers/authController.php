<?php
session_start();
require_once __DIR__ . "/../models/user.php";   

class AuthController {

    public function showLogin() {
        require_once __DIR__ . "/../views/login.php";
    }

    public function login() {
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"], $_POST["password"])) {
            $userModel = new User();
            $user = $userModel->login ($_POST["login"], $_POST["password"]);


            if($user) {
                $_SESSION["eingelogt"]= true;
                $_SESSION["username"] = $user["user"];
                header("Location: /spiel");
                exit();
            } else {
             $_SESSION["Fehler"] = "Ein Fehler ist aufgetretten versuchen sie es später einmal erneurt!"; 
             header("Location: /");  
             exit();
            }
        } 
    }
}



?> 