Sur cette page on voit le planning de la semaine avec l’ensemble des
réservations effectuées. Le planning se présente sous la forme d’un
tableau avec les jours de la semaine en cours. Dans ce tableau, il y a en
colonne les jours et les horaires en ligne. Sur chaque réservation, il est
écrit le nom de la personne ayant réservé la salle ainsi que le titre. Si un
utilisateur clique sur une réservation, il est amené sur une page dédiée.
Les réservations se font du lundi au vendredi et de 8h et 19h. Les créneaux
ont une durée fixe d’une heure.
<br><br>
<html>

<head>  
    <link rel="stylesheet" href="planning.css">
    <title>Planning</title>

</head>

<?php
date_default_timezone_set('Europe/Paris');  


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
                echo 'GOOD DAY AND HOUR'.'<br/>'; // TOUT EST VALIDE ICI, HEURE COMME JOUR
            }
            else {
                echo 'Les réservations ne se font que du lundi au vendredi de 8h à 19h.'.'<br/>'.'<br/>';

            }
        }
}

verificationjourheure();



function planning()

{
    $tabdate=array(1,2,3,4,5);
    $tabheure=array(8,9,10,11,12,13,14,15,16,17,18);
    $h=0;
    $j=0;
    while($j<count($tabheure))
    {
        foreach($tabdate as $jour)
        {
            echo '<a href="">'.'<td id="planningtab">'.$jour.$tabheure[$h].' '.'<td/>'.'</a>';
        }
        ++$h;
        ++$j;
        echo '<br/>';
    }
}





?>



<body>

<table>
    <thead class="aligntab">
        <td id="planningtab">Lundi</td>
        <td id="planningtab">Mardi</td>
        <td id="planningtab">Mercredi</td>
        <td id="planningtab">Jeudi</td>
        <td id="planningtab">Vendredi</td>

    </thead>
    
    <tbody>
        <?php planning(); ?>
    </tbody>

</table>

<!-- 
    <table>
        <tr>
            <td>Horaire/Jour</td>
            <td>LUNDI</td>
            <td>MARDI</td>
            <td>MERCREDI</td>
            <td>JEUDI</td>
            <td>VENDREDI</td>
        </tr>

        <tr>
            <td>8h</td>
            <td> <a href="reservation-form.php" target="_blank"> <?php
            
            $connexion = mysqli_connect("localhost","root","","reservationsalles");
            $requete="SELECT titre,description,debut,fin FROM reservations";
            $query=mysqli_query($connexion,$requete);
            $resultat=mysqli_fetch_all($query);
            
            if($resultat[0][2]==("2020-01-24 08:00:00"))
            {
                echo 'rhalalal'.'<br/>';
            }

            



            echo $resultat[0][0].'<br/>';
            echo $resultat[0][1].'<br/>';
            echo $resultat[0][2].'<br/>';
            echo $resultat[0][3].'<br/>';
          


            
            echo 'Libre' ?> </a> </td>
            <td> <a href="reservation-form.php" target="_blank"> <?php echo 'Libre' ?> </a> </td>
            <td> <a href="reservation-form.php" target="_blank"> <?php echo 'Libre' ?> </a> </td>
            <td> <a href="reservation-form.php" target="_blank"> <?php echo 'Libre' ?> </a> </td>
            <td> <a href="reservation-form.php" target="_blank"> <?php echo 'Libre' ?> </a> </td>
        </tr>
        <tr>
            <td>9h</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>10h</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>11h</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>12h-13h</td>
            <td>Pause repas</td>
            <td>Pause repas</td>
            <td>Pause repas</td>
            <td>Pause repas</td>
            <td>Pause repas</td>
        </tr>
        <tr>
            <td>13h</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>14h</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>15h</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>16h</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>17h</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>18h</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table> -->

</body>



</html>