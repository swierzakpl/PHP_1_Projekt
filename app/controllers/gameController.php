<?php
session_start();

if(!isset($_SESSION["eingelogt"])) {
    header("Location: /views/login.php");
    exit();
}

class GameController {
    public function showGame() {
        include __DIR__ . "/../views/spiel.php";
    }
}

$gameController = new GameController();
$gameController->showGame();


?>
