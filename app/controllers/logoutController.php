<?php
session_start();


class LogoutController {
    public function logout(){
            session_unset();
            session_destroy();
            header("Location: /public/index.php");
            exit();
        }
    }

    if(isset($_POST["logout"]) && isset($_POST["logout"]) == true) {
        $logout = new LogoutController();
        $logout->logout();
    }

?>