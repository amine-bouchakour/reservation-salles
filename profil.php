



<?php
session_start();

include('fonctions.php');
update ();

$connexion = mysqli_connect("localhost","root","","reservationsalles");
$requete = "SELECT login,password FROM utilisateurs WHERE login='".$_SESSION['login']."' ";
$query= mysqli_query($connexion,$requete);
$resultat= mysqli_fetch_row($query);

$_SESSION['login']=$resultat[0];
$_SESSION['password']=$resultat[1];


?>


<html>
<title>Profil</title>


<form action="" method="post">
<input type="text" name="login" value="<?php echo $_SESSION['login']; ?>"><br>
<input type="password" name="password" value="<?php echo $_SESSION['password']; ;?>"><br>
<input type="password" name="confirmpassword" value="<?php echo $_SESSION['password']; ?>"><br>
<input type="submit" name="valider" value="Modifier profil"><br>
</form>

</html>