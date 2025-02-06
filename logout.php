<?php
session_start();
class Logout {
        public function __construct() {
            $this -> logoutUser();
        }
        private function logoutUser() {
            session_unset();
            session_destroy(); 
            header('Location: index.php');
            exit();
        }
}
if(isset($_POST["logout"]) && $_POST["logout"]=== "true") {
    $logout = new Logout();
    exit();
}

?>