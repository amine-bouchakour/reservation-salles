Ce formulaire contient les informations suivantes : titre, description, date de
début, date de fin.

<html>
<title>Réservation-formulaire</title>


<br><br>

<?php
session_start();

if(empty($_SESSION['login']) and !isset($_SESSION['login']))
{
    header('Location:connexion.php');
}

else {

?>

<form action="" method="post">
    <label for="">Titre : </label><input type="text" name="titre" placeholder="Titre"> <br>
    <label for="">Description : </label><input type="text" name="description" placeholder="Description"><br>
    <label for="">Heure début : </label><input type="datetime-local" name="debut"><br>
    <label for="">Heure fin : </label><input type="datetime-local" name="fin"><br>

    <input type="submit" name="valider"><br>
</form>

</html>

<?php 

date_default_timezone_set('Europe/Paris');  
$date = date("Y/m/d : H:i:s");
if(isset($_POST['debut']) and isset($_POST['fin']))
{
    echo 'Heure début de réservations '.$_POST['debut'].'<br/>';
    echo 'Heure fin de réservations '.$_POST['fin'].'<br/>';
}


if(isset($_SESSION['login']) and isset($_SESSION['ID']))
{
    echo 'Le login est '.$_SESSION['login'].'<br/>';
    echo 'L\'ID du login est '.$_SESSION['ID'].'<br/>';
}




function reservations ()

{
// SOUSTRACTION DES HEURES POUR CONNAITRE LE NOMBRE D'HEURE DE RESERVATION
$date = date("Y/m/d H:i");
if(isset($_POST['debut']) and isset($_POST['fin']))
{
$h1 = strtotime($_POST['debut']);
$h2 = strtotime($_POST['fin']);
$Start = gmdate("H", $h2-$h1);

}


$connexion= mysqli_connect("localhost","root","","reservationsalles");
$requete = "SELECT id FROM utilisateurs WHERE login='".$_SESSION['login']."' ";
$query = mysqli_query($connexion,$requete);
$resultat = mysqli_fetch_row($query);
$_SESSION['ID']=$resultat[0];

    
    if(isset($_POST['valider']))
    
    {
        echo 'étape 1 Bon'.'<br/>';

        if(!empty($_POST['titre']) and !empty($_POST['description']) and !empty($_POST['debut']) and !empty($_POST['fin']))
        {
            $requete = "INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES (NULL, '".$_POST['titre']."', '".$_POST['description']."', '".$_POST['debut']."', '".$_POST['fin']."', '".$_SESSION['ID']."');";
            $query= mysqli_query($connexion, $requete);
            echo 'étape 2 Bon'.'<br/>';
        }
        else 
        {
            echo 'Veuillez saisir toutes les informations demandées, merci.'.'<br/>';
        }

        if($Start<=1 and $Start>0)
        {
            echo 'Vous réservez la salle pendant '.$Start.' heure. '.'<br/>';
        }
        if($Start>1) 
        {
            echo 'Vous réservez la salle pendant '.$Start.' heures. '.'<br/>';

        }
    }

}

reservations();

}

?>
