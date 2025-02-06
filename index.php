<?php
session_start();

if ((isset($_SESSION["eingelogt"]) && $_SESSION["eingelogt"] == true)) {
    header('Location: spiel.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osadnicy - das browser game</title>
</head>
<body>
    
Nur Tote haben das Ende des Krieges Erblickt - platon <br>
<br>

<form action="einlogen.php method="post">
    Login : <br/> <input type="text" name ="login"> <br/>
    Password: <br/> <input type="password" name ="password"> <br/> <br/>

    <input type="submit" value="Zaloguj Sie">

<?php

if(isset($_SESSION["Fehler"])) {
    echo "<p style='color: red;'>" . $_SESSION["Fehler"] . "</p>";
    unset($_SESSION["Fehler"]);


}

?>


</form>

</body>
</html>