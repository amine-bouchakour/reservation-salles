<html>
    <head>
<title>Index</title>
    </head>

<?php
session_start();


if(isset($_SESSION['login']))
{
    ?>
    <a href="profil.php">Profil</a><br>
    <a href="planning.php">Planning</a> <br>
    <a href="reservation-form.php">Formulaire de réservations</a> <br>
    <a href="deconnexion.php">Se déconnecter</a> <br>
    <?php
    $_SESSION['login']=ucfirst($_SESSION['login']);
    echo '<br/>'.'Bienvenue à toi '.$_SESSION['login'].'<br/>'.'<br/>';
}
else 
{
   ?>
    <a href="planning.php">Planning</a> <br>
    <a href="connexion.php">Se connecter</a><br>
    <a href="inscription.php">S'inscrire</a><br>
    <?php
    echo '<br/>'.'Bienvenue à toi '.'<br/>'.'<br/>';
}




?>


</html>