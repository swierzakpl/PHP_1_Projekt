<?php 
session_start();

require_once __DIR__ . "/../app/core/router.php";
require_once __DIR__ . "/../app/controllers/authController.php";
require_once __DIR__ . "/../app/controllers/gameController.php";
require_once __DIR__ . "/../app/controllers/logoutController.php";

$router = new Router();

// Routen definieren
$router->add('', 'AuthController', 'showLogin');
$router->add('index', 'AuthController', 'showLogin');
$router->add('spiel', 'GameController', 'showGame');
$router->add('auth/login', 'AuthController', 'login');
$router->add('logout', 'LogoutController', 'logout');

// Anfragen bearbeiten
$router->handleRequest(); // Jetzt wird der Request direkt in der Methode selbst behandelt

?>
