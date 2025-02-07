<?php

session_start();
if(!isset($_SESSION["eingelogt"])){
    header('Location: /public/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spiel</title>
</head>
<body>

<h2>Willkommen, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Holz: <?php echo $_SESSION['drewno']; ?></p>
    <p>Stein: <?php echo $_SESSION['kamien']; ?></p>
    <p>Weizen: <?php echo $_SESSION['zboze']; ?></p>
    <p>Premium-Tage: <?php echo $_SESSION['dnipremium']; ?></p>


    <form method="post" action="/../controllers/LogoutController.php">
        <input type="hidden" name="logout" value="true">
        <button type="submit">Ausloggen</button>
    </form>
    
</body>
</html>