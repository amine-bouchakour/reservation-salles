<html>

<head>
    <title>Profil</title>
    <link rel="stylesheet" href="planning.css">
</head>

<body>



    <?php

{


session_start();
 
if(empty($_SESSION['login']) and !isset($_SESSION['login']))
{
    header('Location:connexion.php');
}

else{




include('fonctions.php');
$connexion = mysqli_connect("localhost","root","","reservationsalles");
$requete = "SELECT id,login,password FROM utilisateurs WHERE login='".$_SESSION['login']."' ";
$query= mysqli_query($connexion,$requete);
$resultat= mysqli_fetch_row($query);

$_SESSION['id']=$resultat[0];
$_SESSION['login']=$resultat[1];
$_SESSION['password']=$resultat[2];


}

?>

    <div id="page">
        <div id="header"><?php headmenu() ?></div>
        <div id="content">
            <div class="divco3">

                <form action="" method="post">
                    <label for="">Login </label>
                    <input class="divin4" type="text" name="login" value="<?php echo $_SESSION['login'];?>"><br>
                    <label for="">Password </label>
                    <input class="divin4" type="password" name="password"
                        value="<?php echo $_SESSION['password'];?>"><br>
                    <label for="">Confirmation Password </label>
                    <input class="divin4" type="password" name="confirmpassword"
                        value="<?php echo $_SESSION['password'];?>"><br>
                    <input class="divin4" type="submit" name="valider" value="Modifier profil">
                    <input class="divin4" type="submit" name="suppcompte" value="Supprimer compte"><br>

                    <div class="divret"><?php update ();?></div>
                </form>


                <?php 
                }

                if(isset($_POST['suppcompte']))
                {
                    $connexion = mysqli_connect("Localhost","root","","reservationsalles");
                    $requete = "DELETE FROM utilisateurs WHERE utilisateurs.id='".$_SESSION['id']."'";
                    $requete2= "DELETE FROM reservations WHERE reservations.id_utilisateur='".$_SESSION['id']."'";
                    $query2=mysqli_query($connexion,$requete2);
                    $query = mysqli_query($connexion,$requete);
                    session_start();
                    session_destroy();
                    header('Location:index.php');
                }


                ?>
            </div>
        </div>
        <div id="footer">
            <div>
                <div class="copy">
                    © 2019-2029 Bouchakour Amine All right reserved.
                </div>
            </div>
        </div>
    </div>







</body>


</html>