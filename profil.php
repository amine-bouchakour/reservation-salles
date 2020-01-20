<?php
session_start();

if(empty($_SESSION['login']) and !isset($_SESSION['login']))
{
    header('Location:connexion.php');
}

else{




include('fonctions.php');
headmenu();
$connexion = mysqli_connect("localhost","root","","reservationsalles");
$requete = "SELECT login,password FROM utilisateurs WHERE login='".$_SESSION['login']."' ";
$query= mysqli_query($connexion,$requete);
$resultat= mysqli_fetch_row($query);

$_SESSION['login']=$resultat[0];
$_SESSION['password']=$resultat[1];

}

?>


<html>
    <head>
<title>Profil</title>
<link rel="stylesheet" href="planning.css">
</head>

<div class="divco">

<form action="" method="post">
<input class="divin2" type="text" name="login" value="<?php echo $_SESSION['login'];?>"><br>
<input class="divin2" type="password" name="password" value="<?php echo $_SESSION['password'];?>"><br>
<input class="divin2" type="password" name="confirmpassword" value="<?php echo $_SESSION['password'];?>"><br>
<input class="divin2" type="submit" name="valider" value="Modifier profil"><br>
<div class="divret"><?php    update ();?></div>

</form>
</div>

</html>
