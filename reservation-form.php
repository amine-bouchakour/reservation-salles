Ce formulaire contient les informations suivantes : titre, description, date de
début, date de fin.

<html>
<br><br>

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
echo 'Date et heure d\'aujourdhui '.$date.'<br/>';
echo 'Heure début de réservations '.$_POST['debut'].'<br/>';
echo 'Heure fin de réservations '.$_POST['fin'].'<br/>';




function reservations ()

{
// SOUSTRACTION DES HEURES POUR CONNAITRE LE NOMBRE D'HEURE DE RESERVATION
$h1 = strtotime($_POST['debut']);
$h2 = strtotime($_POST['fin']);
$Start = gmdate("H", $h2-$h1);
$date = date("Y/m/d H:i");

$connexion=mysqli_connect("Localhost","root","","reservationsalles");

    
    if(isset($_POST['valider']))
    
    {
        echo 'étape 1 Bon'.'<br/>';

        if(!empty($_POST['titre']) and !empty($_POST['description']) and !empty($_POST['debut']) and !empty($_POST['fin']))
        {
            $requete = "INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES (NULL, '".$_POST['titre']."', '".$_POST['description']."', '".$_POST['debut']."', '".$_POST['fin']."', '6');";
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



?>
