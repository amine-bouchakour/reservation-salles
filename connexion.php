<html>
    <head>
<title>Connexion</title>
<link rel="stylesheet" href="planning.css">
</head>


<?php

include('fonctions.php');
headmenu();
connexion ();



?>

<form action="" method="post">
<input type="text" name="login" placeholder="login"><br>
<input type="password" name="password" placeholder="password"><br>
<input type="submit" name="valider" value="Se connecter">
</form>


</html>
