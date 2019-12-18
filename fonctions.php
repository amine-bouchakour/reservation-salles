<?php

function inscription ()

{
    if(isset($_POST['valider'])==true)
    {
        if(isset($_POST['login']) and !empty($_POST['login']) and isset($_POST['password']) and !empty($_POST['password']) and isset($_POST['confirmpassword']) and !empty($_POST['confirmpassword']))
        {
            if(!empty($_POST['password'])==!empty($_POST['confirmpassword']))
            {
                    $connexion=mysqli_connect("Localhost","root","","reservationsalles");
                    $requete2= "SELECT * FROM `utilisateurs` WHERE `login` = '".$_POST['login']."' ";
                    $query2= mysqli_query($connexion,$requete2);
                    $resultat2= mysqli_fetch_row($query2);

                    if($resultat2==0)
                    {
                        $connexion = mysqli_connect("localhost","root","","reservationsalles");
                        $requete = "INSERT INTO utilisateurs (login,password) VALUES ('".$_POST['login']."','".$_POST['password']."')";
                        $query= mysqli_query($connexion, $requete);
                    }
            }
    
            else {
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
    if(isset($_POST['valider']))

    {
        if(isset($_POST['login']) and isset($_POST['password']))

        {
            $connexion = mysqli_connect("localhost","root","","reservationsalles");
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
    echo $_SESSION['login'].'<br/>';
    

    $connexion = mysqli_connect("localhost","root","","reservationsalles");
    $requete = "SELECT login,password FROM utilisateurs WHERE login='".$_SESSION['login']."' ";
    $query= mysqli_query($connexion,$requete);
    $resultat= mysqli_fetch_row($query);

    var_dump($resultat);

    echo $resultat[0].'<br/>';
    echo $resultat[1].'<br/>';
    
return $resultat;



}






?>