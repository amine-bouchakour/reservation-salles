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



$connexion= mysqli_connect("localhost","root","","reservationsalles");
$requete = "SELECT id FROM utilisateurs WHERE login='".$_SESSION['login']."' ";
$query = mysqli_query($connexion,$requete);
$resultat = mysqli_fetch_row($query);
$_SESSION['ID']=$resultat[0];

    
if(isset($_POST['valider']))
    
    {
        echo 'étape 1 Bon'.'<br/>';

        $date = date("d/m/Y : H:i:s");
        $datexdeb = date("d/m/Y : 08:00:00");
        $datexfin = date("d/m/Y : 19:00:00");

        // VERIFICATION SI JOUR DE SEMAINE POUR RESERVE LUNDI A VENDREDI
        if (date('l')=='Saturday' or date('l')=='Sunday')
            {
                echo 'Impossible de faire une reservations le Week-end'.'<br/>';
            }
        
        else
            {
                // VERIFICATION SI HEURE DE RESERVATION VALIDE DE 8H A 19H
                if($date>$datexdeb and $date<$datexfin)
                {
                    $date = date("Y/m/d H:i");
                    $h1 = strtotime($_POST['debut']);
                    $h2 = strtotime($_POST['fin']);
                    $Start = gmdate("H", $h2-$h1);

                    if(!empty($_POST['titre']) and !empty($_POST['description']) and !empty($_POST['debut']) and !empty($_POST['fin']))
                    {

                        $datey=$_POST['debut'][0].$_POST['debut'][1].$_POST['debut'][2].$_POST['debut'][3];
                        $datem=$_POST['debut'][5].$_POST['debut'][6];
                        $dated=$_POST['debut'][8].$_POST['debut'][9];
                        $dateh=$_POST['debut'][11].$_POST['debut'][12];
                        $datedh=$_POST['debut'][8].$_POST['debut'][9].$_POST['debut'][11].$_POST['debut'][12];


                        // VERIFICATION SI ANNEE EN COURS
                        if(($date = date("Y"))==$datey)
                            {
                                echo 'good'.'<br/>';
                                
                                // VERIFICATION SI MOIS EN COURS
                                if(($date = date("m"))==$datem)
                                {
                                    echo 'good 11'.'<br/>';

                                    if(($date = date("d"))<=$dated)
                                    {
                                        if(($date = date("dH"))<$datedh )
                                        {
                                          
                                            if($dateh>=8 and $dateh<=18)
                                            {
                                                
                                                

                                                if($Start==1)
                                                {
                                                    echo 'GOOD DAY AND HOUR AGAIN §§§§§'.'<br/>';  
                                                    $requete = "INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES (NULL, '".$_POST['titre']."', '".$_POST['description']."', '".$_POST['debut']."', '".$_POST['fin']."', '".$_SESSION['ID']."');";
                                                    $query= mysqli_query($connexion, $requete);
                                                    echo 'étape 2 Bon'.'<br/>';
                                                }
                                                else if($Start==0)
                                                {
                                                    echo 'Vous n\'avez fait aucune réservation'.'<br/>';
                                                }

                                            }

                                            else
                                            {
                                                echo "Les salles sont accessible que de 8h à 19h".'<br/>';
                                            }

                                        }

                                        else
                                        {
                                        echo "Vous ne pouvez pas réservé pour l'heure en cours.".'<br/>';
                                        }

                                    }
                                    else 
                                    {
                                        echo "Vous ne pouvez pas réservé à une date antérieure à celle d'aujourd'hui.".'<br/>';
                                    }

                                }
                                else 
                                {
                                    echo "Vous ne pouvez pas réservé à une date antérieure à celle d'aujourd'hui.".'<br/>';
                                }
                        
                            }

                            else 
                            {
                                echo "Vous ne pouvez pas réservé à une date antérieure à celle d'aujourd'hui.".'<br/>';
                            }
                    }

                    else 
                    {
                        echo 'Veuillez saisir toutes les informations demandées, merci.'.'<br/>';
                    }
                }

                else
                {
                    echo 'Les réservations ne se font que du lundi au vendredi de 8h à 19h.'.'<br/>'.'<br/>';
    
                }
            }

        
    }

}

reservations();

}
$date = date("Y/m/d H:i");
$datedh=$_POST['debut'][8].$_POST['debut'][9].$_POST['debut'][11].$_POST['debut'][12];
                        

$date = date("dH");
echo $date.'<br/>';
echo $datedh;

    

    // if(($date = date("Y"))==$datey)
    // {
    //     echo 'good'.'<br/>';
    //     if(($date = date("m"))==$datem)
    //     {
    //         echo 'good 11'.'<br/>';

    //         if(($date = date("d"))<=$dated)
    //         {
    //             echo 'good 22222'.'<br/>';

    //         }

    //     }

    // }



?>
