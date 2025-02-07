<?php
session_start();


class LogoutController {
    public function logout(){
            session_unset();
            session_destroy();
            header("Location: /");
            exit();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $logout = new LogoutController();
        $logout->logout();
    }
?>