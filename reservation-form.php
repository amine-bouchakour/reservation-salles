<html>
    <head>
<title>Réservation-formulaire</title>
<link rel="stylesheet" href="planning.css">
</head>

<body>
    

 
<?php
session_start();
include('fonctions.php');



?>

<div id="page">
	<div id="header">
        <?php if(empty($_SESSION['login']) and !isset($_SESSION['login']))
        {
            header('Location:connexion.php');
        }

        else {
            headmenu(); 
        ?>
    </div>
	<div id="content">
        <div class="divco2">

        <form action="" method="post">
            <label for="">Titre </label><input class="divin3" type="text" name="titre" maxlength="20"><br>
            <label for="">Description </label>
            <textarea class="divin3" type="text" name="description"  cols="25" rows="5" maxlength="80"></textarea><br>
            <label for="">Jour et Heure de début </label><input class="divin3" type="datetime-local"  name="debut"><br>
            <label for="">Jour et Heure de fin </label><input class="divin3"  type="datetime-local" name="fin"><br>
            <input class="divin3" type="submit" name="valider" value="Réserver"><br>
        </form>
        </div>
        <?php reservationsform() ;?>
    </div>

	<div id="footer">
        <div>
            <div class="copy">
                © 2019-2029 Bouchakour Amine All right reserved.
            </div>
        </div>
    </div>
</div>






<?php 




if(isset($_SESSION['a'])=="a"){



function reservationsform ()

{
    $connexion= mysqli_connect("localhost","root","","reservationsalles");
    $requete = "SELECT id FROM utilisateurs WHERE login='".$_SESSION['login']."' ";
    $query = mysqli_query($connexion,$requete);
    $resultat = mysqli_fetch_row($query);
    $_SESSION['ID']=$resultat[0];

    if(isset($_POST['valider']))
        
        {
        $date = date("d/m/Y : H:i:s");
        // $datexdeb = date("d/m/Y : 08:00:00");
        // $datexfin = date("d/m/Y : 19:00:00");

        // VERIFICATION SI JOUR DE SEMAINE POUR RESERVE LUNDI A VENDREDI    date('l')=='Saturday' or 
        if (date('l')=='Sunday')
            {
                echo 'Impossible de faire une reservations le Week-end.'.'<br/>';
            }
        
        else
            {
                // VERIFICATION SI HEURE DE RESERVATION VALIDE DE 8H A 19H
                // if($date>=$datexdeb and $date<=$datexfin)
                // {
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
                        $datehp=$_POST['debut'][14].$_POST['debut'][15];
                        $datedebut=$_POST['debut'][8].$_POST['debut'][9];
                        $datefin=$_POST['fin'][8].$_POST['fin'][9];

                        // VERIFICATION SI ANNEE EN COURS
                        if(($date = date("Y"))==$datey)
                            {
                                
                                // VERIFICATION SI MOIS EN COURS
                                if(($date = date("m"))==$datem)
                                {

                                    if(($date = date("d"))<=$dated)
                                    {
                                        if(($date = date("dH"))<$datedh )
                                        {
                                          
                                            if($dateh>=8 and $dateh<=19)
                                            {
                                                
                                                if($datehp==0)
                                                {
                                                
                                                    if($datedebut==$datefin)
                                                    {
                                                    
                                                        if($Start==1)
                                                        {
                                                            $connexion= mysqli_connect("localhost","root","","reservationsalles");
                                                            $requete1 = "SELECT debut FROM reservations WHERE debut='".$_POST['debut']."'";
                                                            $query1 = mysqli_query($connexion,$requete1);
                                                            $resultat1 = mysqli_fetch_row($query1);

                                                            if($resultat1==0)
                                                            {
                                                            $requete2 = "INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES (NULL, '".$_POST['titre']."', '".$_POST['description']."', '".$_POST['debut']."', '".$_POST['fin']."', '".$_SESSION['ID']."');";
                                                            $query2= mysqli_query($connexion, $requete2);
                                                            header('Location:planning.php');
                                                            }

                                                            else 
                                                            {
                                                                echo 'La salle est déjà réservé pour cette heure-ci.'.'<br/>';
                                                            }
                                                        }

                                                        else if($Start==0)
                                                        {
                                                            echo 'Vous n\'avez fait aucune réservation.'.'<br/>';
                                                        }
                                                    }

                                                    else
                                                    {
                                                        echo 'Vos dates de début d\'évenement et de fin doivent être le même jour.'.'<br/>';
                                                    }
                                                }

                                                else
                                                {
                                                    echo "Les réservations se font sur des heures pleines, ex: 9:00, 14:00.".'<br/>';
                                                }
                                            }

                                            else
                                            {
                                                echo "Les salles sont accessible que de 8h à 19h.".'<br/>';
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

                // else
                // {
                //     echo 'Les réservations ne se font que du lundi au vendredi de 8h à 19h.'.'<br/>'.'<br/>';
    
                // }
            // }
        }
    }

}

}

?>






</body>

</html>