Le formulaire doit contenir l’ensemble des champs présents dans la table
“utilisateurs” (sauf “id”) ainsi qu’une confirmation de mot de passe. Dès
qu’un utilisateur remplit ce formulaire, les données sont insérées dans la
base de données et l’utilisateur est redirigé vers la page de connexion.

<html>


<form action="" method="post">
<input type="text" name="login" placeholder="login"><br>
<input type="password" name="password" placeholder="password"><br>
<input type="password" name="confirmpassword" placeholder="confirmpassword"><br>
<input type="submit" name="valider" value="Valider"><br>
</form>



</html>


<?php

include("fonctions.php");
inscription();






?>