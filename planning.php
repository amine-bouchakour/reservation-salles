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
            $aaa=$jour.$tabheure[$h];


            if($aaa==18)
            {
                echo '<td id="planningtab">'.'<a href="reservation-form.php">'.'Libre'.' '.'</a>'.'<td/>';

            }
            else 
            {
                echo '<td id="planningtab">'.'<a href="reservation.php">'.$aaa.' '.'</a>'.'<td/>';
                // $_SESSION['id_evenement']=$jour.$tabheure[$h];
            }
            
        }
        ++$h;
        ++$j;
        echo '<br/>';
    }

}

// REQUETE NOM ET TITRE DES RESERVATIONS
$connexion = mysqli_connect("localhost","root","","reservationsalles");
            $requete="SELECT debut,fin FROM reservations";
            $query=mysqli_query($connexion,$requete);
            $resultat=mysqli_fetch_all($query);
            var_dump($resultat);
            // if($resultat[0][2]==("2020-01-24 08:00:00"))
            // {
            //     echo 'rhalalal'.'<br/>';
            // }
            echo $resultat[0][0].'<br/>'; // DATE DE DEBUT EVENEMENTS
            echo $resultat[0][1].'<br/>'.'<br/>'; // DATE DE FIN EVENEMENTS
            echo $resultat[1][0].'<br/>'; // DATE DE DEBUT EVENEMENTS
            echo $resultat[1][1].'<br/>'.'<br/>'; // DATE DE FIN EVENEMENTS


            

$datedeb=$resultat;
$datedeb=date("H:i:s");

echo $datedeb[0].$datedeb[1].'<br/>'.'<br/>';
$id_table=$datedeb[0].$datedeb[1];

echo $id_table;








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
        <?php planning(); 
        ?>
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
            <td> <a href="reservation-form.php" target="_blank"> 
            
             </a> </td>
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