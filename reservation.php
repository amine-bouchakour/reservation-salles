<html>
    <head>
<title>réservations</title>
<link rel="stylesheet" href="planning.css">
</head>

<body>
    


<?php
session_start();
include('fonctions.php');

$_GET["id"];


if(empty($_SESSION['login']) and !isset($_SESSION['login']))
{
    header('Location:connexion.php');
}

else {
    headmenu();

  
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

            $resultat[$j][1]=ucfirst($resultat[$j][1]);
            $créa =$resultat[$j][1];
            $resultat[$j][4]=ucfirst($resultat[$j][4]);
            $titre=$resultat[$j][4];
            $resultat[$j][5]=ucfirst($resultat[$j][5]);
            $descr=$resultat[$j][5];
            $debut=$resultat[$j][6];
            $fin=$resultat[$j][7];
            ++$x;
        }

    ++$j;
    }
    echo '<br/>';

}

 


?>

<table id="tr">

<tr>
    <td id="planningtab2bis"><?php echo 'Créateur de l\'évènement : '; ?></td>
    <td id="planningtab2bis2"><?php echo $créa; ?></td>

</tr>
<tr>
    <td id="planningtab2bis"><?php echo 'Titre : '; ?></td>
    <td id="planningtab2bis2"><?php echo $titre; ?></td>
</tr>
<tr>
    <td id="planningtab2bis"><?php echo 'Description : '; ?></td>
    <td id="planningtab2bis3"><?php echo $descr; ?></td>

</tr>
<tr>
    <td id="planningtab2bis"><?php echo 'Début de  la réservation : '; ?></td>
    <td id="planningtab2bis2"><?php echo $debut; ?></td>

</tr>
<tr>
    <td id="planningtab2bis"><?php echo 'Fin de  la réservation : '; ?></td>
    <td id="planningtab2bis2"><?php echo $fin; ?></td>
</tr>


</table>

<?php

if($_SESSION['login']==$créa)
{

    echo '<br/><div class="alidiv">'.'Supprimer réservation ?'.'<div/><br/>';
   
    ?> 
    
    <form action="" method="post" id="alidiv">
    <button name="supp" class="alidiv2">Oui</button>
    <button name="nosupp" class="alidiv2">Non</button>
    </form>

    <?php

    if(isset($_POST['supp']))
    {
        $requete2="DELETE FROM `reservations` WHERE `reservations`.`id` ='".$_GET["id"]."'";
        $query2=mysqli_query($connexion,$requete2);
        header("Location:planning.php");
    }

    if(isset($_POST['nosupp']))
    {
        header('Location:planning.php');
    }

}

else
{
    echo '<br/><div class="alidiv">'.'Revenir au planning ?'.'<div/><br/>';

   
    ?> 
    
    <form action="" method="post" id="alidiv">
    <button name="retour" class="alidiv2">Oui</button>
    </form>

    <?php

    if(isset($_POST['retour']))
    {
        header('Location:planning.php');
    }
}

?>

<footer>
    <div class="copy">
    © 2019-2029 Bouchakour Amine All right reserved.
    </div>
</footer>

</body>

</html>