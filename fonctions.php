<?php


function inscription ()

{
    $connexion=mysqli_connect("Localhost","root","","reservationsalles");

    if(isset($_POST['valider'])==true)
    {
        if(isset($_POST['login']) and isset($_POST['password']) and isset($_POST['confirmpassword']))

        {
            if(isset($_POST['password'])==isset($_POST['confirmpassword']))
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
    $requete = "SELECT login,password FROM utilisateurs WHERE login='".$_SESSION['login']."' ";
    $query= mysqli_query($connexion,$requete);
    $resultat= mysqli_fetch_row($query);

    $_SESSION['login']=$resultat[0];
    $_SESSION['password']=$resultat[1];


    if(isset($_POST['valider']))

    {
        if($_POST['password']==$_POST['confirmpassword'])

        {
            if($_POST['login']!=$resultat[0] or $_POST['password']!=$resultat[1])
            {
                echo 'Update validé'.'<br/>';
                $password=$_POST['password'];
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $requete = "UPDATE utilisateurs SET login='".$_POST['login']."', password='".$hashed_password."' WHERE login='".$_SESSION['login']."' ";
                $query= mysqli_query($connexion,$requete);
                header('Location:index.php');
            }
        
        }

        else 
        {
            echo 'Password et confirmation de mot de passe différents'.'<br/>';
        }

    }
   


}







?>