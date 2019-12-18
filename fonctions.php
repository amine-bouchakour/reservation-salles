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
                            $requete = "INSERT INTO utilisateurs (login,password) VALUES ('".$_POST['login']."','".$_POST['password']."')";
                            $query= mysqli_query($connexion, $requete);
                            echo 'Inscription réussie'.'<br/>';
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
            
            if($resultat==0)
            {
                echo "Identifiants inconnue ou incorrect".'<br/>';
            }
            elseif ($resultat[0]==$_POST['login'] and $resultat[1]==$_POST['password'])
             {
                session_start();
                $_SESSION['login']=$_POST['login'];
                echo 'Bienvenue à toi '.$_POST['login'].'<br/>';
                header('Location:profil.php');
            }
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
                
                $requete = "UPDATE utilisateurs SET login='".$_POST['login']."', password='".$_POST['password']."' WHERE login='".$_SESSION['login']."' ";
                $query= mysqli_query($connexion,$requete);

            }
        
        }

        else 
        {
            echo 'Password et confirmation de mot de passe différents'.'<br/>';
        }

    }
   


}






?>