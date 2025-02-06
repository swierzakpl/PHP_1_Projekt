<?php

session_start();

if(isset($_SESSION['username'])){ 
    header("Location: index.php");
    exit();
}
if(!isset($_SESSION["eingelogt"])){
    header('Location: index.php');
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

<?php


echo "<p>Witaj ".$_SESSION['username']."!";

echo "<P> <b>Holz</b>: " . $_SESSION['drewno'];
echo " | <b> Stein</b>: " . $_SESSION['kamien'];
echo " | <b>Weizen</b>: " . $_SESSION['zboze'];
echo " | <b>Premium Tage</b>: " . $_SESSION['dnipremium'];

echo " | <p><b> E-Mail </b> : ".$_SESSION['email'];


?>

<form method="post" action="logout.php">
    <input type="hidden" name="logout" value="true">
    <button type="submit"> Ausloggen</button>

</form>
    
</body>
</html>