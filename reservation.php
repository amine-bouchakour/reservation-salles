<html>
<title>réservations</title>




<?php
session_start();

$_GET["id"];


if(empty($_SESSION['login']) and !isset($_SESSION['login']))
{
    header('Location:connexion.php');
}

else {
    




    $connexion= mysqli_connect("localhost","root","","reservationsalles");
    $requete= "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur WHERE reservations.id='".$_GET["id"]."'";
    $query=mysqli_query($connexion,$requete);

    $requete1= "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur";
    $query1=mysqli_query($connexion,$requete1);
    $resultat1=mysqli_fetch_all($query1);

    $resultat=mysqli_fetch_all($query);


    $x=0;
    $j=0;
    while($j<count($resultat))
    {

        if($resultat[$j][3]==$_GET["id"])
        {
            
            echo 'Créateur de l\'évènement : '.$resultat[$j][1].'<br/>';
            echo 'Titre = '.$resultat[$j][4].'<br/>';
            echo 'Description = '.$resultat[$j][5].'<br/>';
            echo 'Début de  la réservation = '.$resultat[$j][6].'<br/>';
            echo 'Fin de la réservation = '.$resultat[$j][7].'<br/>';
            ++$x;
        }

        if($_SESSION['login']==$resultat[$j][1])
        {
            echo '<br/>'.'Suppression evenements'.'<br/>';
        }


    ++$j;
    }
    echo '<br/>';


}



?>







</html>