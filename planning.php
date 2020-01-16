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


function planning()

{
    $tabdate=array('Mon','Tue','Wed','Thu','Fri');
    $tabheure=array(8,9,10,11,12,13,14,15,16,17,18);
    $h=0;
    $j=0;
    while($j<count($tabheure))
    {
        foreach($tabdate as $jour)
        {
            $aaa=$jour.$tabheure[$h];

            
            if($aaa<112)
            {
                echo '<td id="planningtab">'.'<a href="reservation-form.php">'.$aaa.' Libre'.'</a>'.'<td/>';
            }
            else 
            {
                if($aaa==112 or $aaa==212 or $aaa==312 or $aaa==412 or $aaa==512)
                {
                    echo '<td id="planningtab1">'.'<h4>'.' PAUSE'.'</h4>'.'<td/>';

                }
                else {
                    echo '<td id="planningtab">'.'<a href="reservation.php">'.$aaa.' Réservé'.'</a>'.'<td/>';
                    // $_SESSION['id_evenement']=$jour.$tabheure[$h];
                }
            }
            
        }
        ++$h;
        ++$j;
        echo '<br/>';
    }

}

// REQUETE NOM ET TITRE DES RESERVATIONS
$connexion = mysqli_connect("localhost","root","","reservationsalles");
            $requete="SELECT debut FROM reservations";
            $query=mysqli_query($connexion,$requete);
            $resultat=mysqli_fetch_all($query);
            var_dump($resultat);

$j=0;

while($j<count($resultat))
{
    $jour = $resultat[$j][0][8].$resultat[$j][0][9];
    $annee = $resultat[$j][0][0].$resultat[$j][0][1].$resultat[$j][0][2].$resultat[$j][0][3];
    $mois =$resultat[$j][0][5].$resultat[$j][0][6];
    $heure=$resultat[$j][0][11].$resultat[$j][0][12];
    
    $timestamp = mktime($heure, 0, 0, $mois, $jour, $annee);
    $bbb=date('DH', $timestamp);
    
    echo $bbb.'<br/>';

    ++$j;
}









?>



<body>

<table>
    <thead class="aligntab">
        <td id="planningtab2">LUNDI</td>
        <td id="planningtab2">MARDI</td>
        <td id="planningtab2">MERCREDI</td>
        <td id="planningtab2">JEUDI</td>
        <td id="planningtab2">VENDREDI</td>

    </thead>
    
    <tbody>
        <?php planning(); 
        ?>
    </tbody>

</table>



</body>



</html>