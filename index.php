<html>

<head>
    <title>Index</title>
    <link rel="stylesheet" href="planning.css">

</head>

<body>



    <?php
session_start();

include('fonctions.php');



?>
    <div id="page">
        <div id="header"><?php headmenu(); ?></div>
        <div id="content">
            <div class="copy2">
                <p>Bienvenue sur notre site <div class="login">
                        <?php if(isset($_SESSION['login'])) {echo ' '.$_SESSION['login'].' :)';}?></div>
                </p>
                <p>Ici nous vous proposons la réservation de salle pour divers activités</p>
                <p>La location est gratuite !</p>
                <p>Vous pouvez réservé une salle de 8h à 19h du lundi au vendredi et ceci pour une durée d'une heure
                    maximum</p>
                <p>Le planning affiche toutes les réservations déjà faites et les différentes disponibilités</p>
                <p>N'hésitez à aller jeter un coup d'oeil <a href="planning.php"> en cliquant ici</a></p>
                <p></p>

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