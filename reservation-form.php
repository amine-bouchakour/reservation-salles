Ce formulaire contient les informations suivantes : titre, description, date de
début, date de fin.

<html>
<br><br>

<form action="" method="get">
    <label for="">Titre : </label><input type="text" name="titre" placeholder="Titre"> <br>
    <label for="">Description : </label><input type="text" name="description" placeholder="Description"><br>
    <label for="">Date : </label>
    <input type="datetime-local" 
       name="datetime" value="2020-01-01 9:00"
       min="2020-01-01T09:00" max="2020-05-01T18:00">
    <input type="submit" name="valider"><br>
</form>

</html>

<?php 


if(isset($_GET['valider']))

{
    echo 'étape 1 Bon'.'<br/>';

    if(!empty($_GET['titre']) and !empty($_GET['description']) and !empty($_GET['datetime']))
    {
        $connexion=mysqli_connect("Localhost","root","","reservationsalles");
        $requete = "INSERT INTO reservations (titre,description,date,heure) VALUES ('".$_GET['titre']."','".$_GET['description']."','".$_GET['datetime']."')";
        $query= mysqli_query($connexion, $requete);
        echo 'étape 2 Bon'.'<br/>';
    }
}

?>

,'".$_GET['date']."','".$_GET['heure']."'

INSERT INTO `reservations` (`id`, `titre`, `description`, `date`, `heure`, `id_utilisateur`) VALUES (NULL, 'musique', 'rahaha', '2020-01-16 00:00:00', '17:00:00', '1');