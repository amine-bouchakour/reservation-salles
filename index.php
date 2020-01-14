Une page d’accueil qui présente votre site (index.php)
<br>
<html>
<title>Index</title>



<br>

<?php
session_start();


if(isset($_SESSION['login']))
{
    echo 'Bienvenue à toi '.$_SESSION['login'].'<br/>';
    ?>
    <a href="profil.php">Profil</a><br>
    <a href="planning.php">Planning</a> <br>
    <a href="reservation.php">Réservations</a><br>
    <a href="reservation-form.php">Formulaire de réservations</a> <br>
    <a href="deconnexion.php">Se déconnecter</a> <br>

    <?php
}
else 
{
    echo 'Bienvenue à toi '.'<br/>';
   ?>
    <a href="connexion.php">Connexion</a><br>
    <a href="inscription.php">Inscription</a><br>
    <a href="profil.php">Profil</a><br>
    <a href="planning.php">Planning</a> <br>
    <?php
}




?>

<a href=""></a>
<a href=""></a>
<a href=""></a>
<a href=""></a>
<a href=""></a>
<a href=""></a>



</html>