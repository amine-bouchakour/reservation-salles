Cette page affiche le nom du créateur, le titre de l’événement, la
description, l’heure de début et de fin. Pour savoir quel évènement afficher,
vous devez récupérer l’id de l’événement en utilisant la méthode get. (ex :
http://localhost/reservationsalles/evenement/?id=1) Seuls les personnes
connectées peuvent accéder aux événements.

<br>
<html>
<title>réservations</title>




<?php
session_start();



if(empty($_SESSION['login']) and !isset($_SESSION['login']))
{
    header('Location:connexion.php');
}

else {
    




$connexion= mysqli_connect("localhost","root","","reservationsalles");
$requete= "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur";
$query=mysqli_query($connexion,$requete);
$resultat=mysqli_fetch_all($query);
echo '<br/>'.'Nombre de réservation dans la BDD :'.count($resultat).'<br/>';

echo 'Nom du créateur : '.$_SESSION['login'].'<br/>';
echo 'id util = '.$resultat[0][0].'<br/>';
echo 'Login = '.$resultat[0][1].'<br/>';
echo 'id reserv = '.$resultat[0][3].'<br/>';
echo 'Titre = '.$resultat[0][4].'<br/>';
echo 'Description = '.$resultat[0][5].'<br/>';
echo 'Jour et heure de DEBUT de réservations = '.$resultat[0][6].'<br/>';
echo 'Jour et heure de FIN de réservations = '.$resultat[0][7].'<br/>';
echo 'id-utilisateur = '.$resultat[0][8].'<br/>';



echo $resultat[0][6][0].'<br/>';



echo $_SESSION['login'].'<br/>';

}



?>







</html>