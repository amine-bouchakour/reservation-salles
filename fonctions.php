<?php


function inscription ()

{
    $connexion=mysqli_connect("Localhost","root","","reservationsalles");

    if(isset($_POST['valider'])==true)
    {
        if(isset($_POST['login']) and isset($_POST['password']) and isset($_POST['confirmpassword']))

        {
            if($_POST['password']==$_POST['confirmpassword'])
            {
                    $requete2= "SELECT * FROM `utilisateurs` WHERE `login` = '".$_POST['login']."' ";
                    $query2= mysqli_query($connexion,$requete2);
                    $resultat2= mysqli_fetch_row($query2);

                    if($resultat2==0)
                    {
                        if(!empty($_POST['login']) and !empty($_POST['password']))

                        {
                            $password=$_POST['password'];
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            $requete = "INSERT INTO utilisateurs (login,password) VALUES ('".$_POST['login']."','".$hashed_password."')";
                            $query= mysqli_query($connexion, $requete);
                            echo 'Inscription réussie'.'<br/>';
                            header("Location:connexion.php");
                        }
                    }

                    else 
                    {
                        echo 'Login déjà existant'.'<br/>';
                    }
            }
    
            else 
            {
                echo 'Mot de passe et confirmation de mot de passe différents'.'<br/>';
            }
        }
    
        else 
        {
            echo "Veuillez remplir tout les champs".'<br/>';
        }
    }
}



function connexion ()

{
    $connexion=mysqli_connect("Localhost","root","","reservationsalles");

    if(isset($_POST['valider']))

    {
        if(isset($_POST['login']) and isset($_POST['password']))

        {
            $requete = "SELECT login,password FROM utilisateurs WHERE login='".$_POST['login']."' ";
            $query = mysqli_query($connexion,$requete);
            $resultat = mysqli_fetch_row($query);

            $password=$_POST['password'];



            
            if($resultat==0)
            {
                echo "Le login est inconnu".'<br/>';
            }
            
            elseif ($resultat[0]==$_POST['login'] and password_verify($password, $resultat[1]))
             {
                session_start();
                $_SESSION['login']=$_POST['login'];
                echo 'Bienvenue à toi '.$_POST['login'].'<br/>';
                header('Location:index.php');
            }
            else {

                echo 'Mot de passe incorrect.'.'<br/>';
            }
        }

        else {
            echo 'Veuillez saisir votre login et mot de passe.'.'<br/>';
        }
    }
}

function update ()

{
    $connexion = mysqli_connect("localhost","root","","reservationsalles");
    $requete = "SELECT login,password FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $query= mysqli_query($connexion,$requete);
    $resultat= mysqli_fetch_row($query);

    $_SESSION['login']=$resultat[0];
    $_SESSION['password']=$resultat[1];


    if(isset($_POST['valider']))

    {
        if($_POST['password']==$_POST['confirmpassword'] and !empty($_POST['password']))

        {
            $requete2= "SELECT * FROM `utilisateurs` WHERE `login` = '".$_POST['login']."' ";
                    $query2= mysqli_query($connexion,$requete2);
                    $resultat2= mysqli_fetch_row($query2);

                    if($resultat2==0)
                    {
                        if(!empty($_POST['login']) and !empty($_POST['password']))

                        {
                            $password=$_POST['password'];
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            $requete = "INSERT INTO utilisateurs (login,password) VALUES ('".$_POST['login']."','".$hashed_password."')";
                            $query= mysqli_query($connexion, $requete);
                            echo 'Inscription réussie'.'<br/>';
                            header("Location:connexion.php");
                        }
                    

            if ($_POST['password']!=$resultat[1] and $_POST['login']!=$resultat[0])
            {
                $password=$_POST['password'];
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $requete = "UPDATE utilisateurs SET login='".$_POST['login']."', password='".$hashed_password."' WHERE login='".$_SESSION['login']."'";
                $query= mysqli_query($connexion,$requete);
                header('Location:index.php');

            }

            if($_POST['login']!=$resultat[0] and $_POST['password']==$resultat[1] )
            {
                echo 'Update validé'.'<br/>';
                
                $requete = "UPDATE utilisateurs SET login='".$_POST['login']."' WHERE login='".$_SESSION['login']."'";
                $query= mysqli_query($connexion,$requete);
                header('Location:index.php');

                
            }

            if ($_POST['password']!=$resultat[1] and $_POST['login']=$resultat[0])
                {
                    $password=$_POST['password'];
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $requete = "UPDATE utilisateurs SET  password='".$hashed_password."' WHERE login='".$_SESSION['login']."'";
                    $query= mysqli_query($connexion,$requete);
                    header('Location:index.php');

                }

              
            }

            else 
            {
                echo 'Login déjà existant'.'<br/>';
            }

        
        }

        else 
        {
            echo 'Password et confirmation de mot de passe différents'.'<br/>';
        }

    }
   

}

function verificationjourheure()

{
    $date = date("d/m/Y : H:i:s");
    $datexdeb = date("d/m/Y : 08:00:00");
    $datexfin = date("d/m/Y : 19:00:00");
    if (date('l')=='Saturday' or date('l')=='Sunday')
        {
            echo 'Impossible de faire une reservations le Week-end'.'<br/>';
        }
    
    else
        {
            if($date>$datexdeb and $date<$datexfin)
            {
                echo 'GOOD DAY AND HOUR !!!!!!!'.'<br/>'; // TOUT EST VALIDE ICI, HEURE COMME JOUR
                
            }
            else {
                echo 'Les réservations ne se font que du lundi au vendredi de 8h à 19h.'.'<br/>'.'<br/>';

            }
        }
}



// AFFICHAGE HEADER EN FONCTION DE CONNECTE OU PAS

function headmenu()
{
    if(isset($_SESSION['login']))
    {

            ?>
            <div class="flex">
            <a class="flexhead" href="index.php?">Page Principale</a> <br>
            <a class="flexhead" href="reservation-form.php">Formulaire de réservation</a> <br>
            <a class="flexhead" href="planning.php">Planning</a><br>
            <a class="flexhead" href="profil.php">Mon profil</a><br>
            <a class="flexhead" href="deconnexion.php">Se déconnecter</a> <br>
            </div>
            <?php

        $_SESSION['login']=ucfirst($_SESSION['login']);
    }

    else 
    {
        
            ?>
            <div class="flex">
            <a class="flexhead" href="connexion.php">Se connecter</a><br>
            <a class="flexhead" href="index.php?">Page Principale</a> <br>
            <a class="flexhead" href="planning.php">Planning</a><br>
            <a class="flexhead" href="inscription.php">S'inscrire</a><br>
            </div>
            <?php

    }

}



// RESERVATION FORMULAIRE

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


?>