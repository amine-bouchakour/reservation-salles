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
define('pagencours', $_SERVER['PHP_SELF'], true);

function headmenu()
{
    if(isset($_SESSION['login']))
    {

        

        if(pagencours=='/poolproject/reservation-salles/index.php')
        {

            ?>
            <div class="flex">
            <a class="flexhead" href="planning.php">Planning</a><br>
            <a class="flexhead" href="reservation-form.php">Formulaire de réservations</a> <br>
            <a class="flexhead" href="profil.php">Mon profil</a><br>
            <a class="flexhead" href="deconnexion.php">Se déconnecter</a> <br>
            </div>
            <?php
        }

        if(pagencours=='/poolproject/reservation-salles/planning.php')
        {
            ?>
            <div class="flex">
            <a class="flexhead" href="index.php?">Page Principale</a> <br>
            <a class="flexhead" href="reservation-form.php">Formulaire de réservations</a> <br>
            <a class="flexhead" href="profil.php">Mon profil</a><br>
            <a class="flexhead" href="deconnexion.php">Se déconnecter</a> <br>
            </div>
            <?php
        }

        if(pagencours=='/poolproject/reservation-salles/profil.php')
        {
            ?>
            <div class="flex">
            <a class="flexhead" href="index.php?">Page Principale</a> <br>
            <a class="flexhead" href="planning.php">Planning</a><br>
            <a class="flexhead" href="reservation-form.php">Formulaire de réservations</a> <br>
            <a class="flexhead" href="deconnexion.php">Se déconnecter</a> <br>
            </div>
            <?php
        }

        if(pagencours=='/poolproject/reservation-salles/reservation.php')
        {
            ?>
            <div class="flex">
            <a class="flexhead" href="index.php?">Page Principale</a> <br>
            <a class="flexhead" href="reservation-form.php">Formulaire de réservations</a> <br>
            <a class="flexhead" href="planning.php">Planning</a><br>
            <a class="flexhead" href="profil.php">Mon profil</a><br>
            <a class="flexhead" href="deconnexion.php">Se déconnecter</a> <br>
            </div>
            <?php
        }

        if(pagencours=='/poolproject/reservation-salles/reservation-form.php')
        {
            ?>
            <div class="flex">
            <a class="flexhead" href="index.php?">Page Principale</a> <br>
            <a class="flexhead" href="planning.php">Planning</a><br>
            <a class="flexhead" href="profil.php">Mon profil</a><br>
            <a class="flexhead" href="deconnexion.php">Se déconnecter</a> <br>
            </div>
            <?php
        }

        $_SESSION['login']=ucfirst($_SESSION['login']);
    }
    else 
    {
        if(pagencours=='/poolproject/reservation-salles/index.php')
        {
 
            ?>
            <div class="flex">
            <a class="flexhead" href="connexion.php">Se connecter</a><br>
            <a class="flexhead" href="planning.php">Planning</a><br>
            <a class="flexhead" href="inscription.php">S'inscrire</a><br>
            </div>
            <?php
        }


        if(pagencours=='/poolproject/reservation-salles/inscription.php')
        {
            ?>
            <div class="flex">
            <a class="flexhead" href="index.php?">Page Principale</a> <br>
            <a class="flexhead" href="planning.php">Planning</a><br>
            </div>
            <?php
        }

        if(pagencours=='/poolproject/reservation-salles/connexion.php')
        {
            ?>
            <div class="flex">
            <a class="flexhead" href="index.php?">Page Principale</a> <br>
            <a class="flexhead" href="planning.php">Planning</a><br>
            </div>
            <?php
        }

        if(pagencours=='/poolproject/reservation-salles/planning.php')
        {
            ?>
            <div class="flex">
            <a class="flexhead" href="connexion.php">Se connecter</a><br>
            <a class="flexhead" href="index.php?">Page Principale</a> <br>
            <a class="flexhead" href="inscription.php">S'inscrire</a><br>
            </div>
            <?php
        }

    }

}


?>