<?php 

require_once __DIR__ ."/../app/controllers/authController.php";

if($_SERVER["REQUEST_METHOD"] === "POST" ) {
    $authController = new AuthController();
    $authController ->login();
} else {
    include __DIR__ ."/../app/views/login.php";
}

?>