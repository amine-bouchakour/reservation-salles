Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
informations, alors l’utilisateur devient connecté et une (ou plusieurs)
variables de session sont créées.

<html>


<form action="" method="post">
<input type="text" name="login" placeholder="login"><br>
<input type="password" name="password" placeholder="password"><br>
<input type="submit" name="valider" value="Se connecter">
</form>


</html>

<?php

include('fonctions.php');
connexion ();

?>