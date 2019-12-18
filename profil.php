Cette page possède un formulaire permettant à l’utilisateur de modifier son
login et son mot de passe


<html>


<form action="" method="post">
<input type="text" name="login" value="<?php echo $resultat[0]; ?>"><br>
<input type="password" name="password" value="<?php echo $resultat[1] ;?>"><br>
<input type="confirmpassword" name="confirmpassword" value="<?php $resultat[1]; ?>"><br>
<input type="submit" name="valider" value="Valider"><br>
</form>

</html>

<?php
session_start();

include('fonctions.php');
update ();



?>

