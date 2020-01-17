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

echo $_SESSION['login'].'<br/>';
echo '<br/>'.'Nombre de réservation dans la BDD :'.count($resultat).'<br/>'.'<br/>';

$x=0;
$j=0;
while($j<count($resultat))
{

    if($resultat[$j][1]==$_SESSION['login'])
    {
        
        echo 'Nom du créateur : '.$_SESSION['login'].'<br/>';
        echo 'id util = '.$resultat[$j][0].'<br/>';
        echo 'Login = '.$resultat[$j][1].'<br/>';
        echo 'id reserv = '.$resultat[$j][3].'<br/>';
        echo 'Titre = '.$resultat[$j][4].'<br/>';
        echo 'Description = '.$resultat[$j][5].'<br/>';
        echo 'Jour et heure de DEBUT de réservations = '.$resultat[$j][6].'<br/>';
        echo 'Jour et heure de FIN de réservations = '.$resultat[$j][7].'<br/>';
        echo 'id-utilisateur = '.$resultat[$j][8].'<br/>';
        echo $resultat[0][6][0].'<br/>'.'<br/>';
        ++$x;
    }
++$j;
}

if($x==0)
{

    echo 'Vous n\'avait effectué aucune réservation '.$_SESSION['login'].'.'.'<br/>';
}
if($x==1)
{

    echo 'Vous avait effectué '.$x.' réservation '.$_SESSION['login'].'.'.'<br/>';
}
else
{
    echo 'Vous avait effectué '.$x.' réservations '.$_SESSION['login'].'.'.'<br/>';

}






}



?>







</html>