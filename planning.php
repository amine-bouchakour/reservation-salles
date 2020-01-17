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
            $tabheure=array('08','09',10,11,12,13,14,15,16,17,18);
            $h=0;
            $j=0;

            while($j<count($tabheure))
            {

                    foreach($tabdate as $jour)
                    {

                        $aaa=$jour.$tabheure[$h];
                        

                                // REQUETE NOM ET TITRE DES RESERVATIONS
                            $connexion = mysqli_connect("localhost","root","","reservationsalles");
                            $requete="SELECT titre,description,debut FROM reservations";
                            $query=mysqli_query($connexion,$requete);
                            $resultat=mysqli_fetch_all($query);
                            
                            $k=0;
                            
                            while($k<count($resultat))
                            {
                               

                                $jour = $resultat[$k][2][8].$resultat[$k][2][9];
                                $annee = $resultat[$k][2][0].$resultat[$k][2][1].$resultat[$k][2][2].$resultat[$k][2][3];
                                $mois =$resultat[$k][2][5].$resultat[$k][2][6];
                                $heure=$resultat[$k][2][11].$resultat[$k][2][12];
                                $ttt=$resultat[$k][0];
                                $timestamp = mktime($heure, 0, 0, $mois, $jour, $annee);
                                $bbb=date('DH', $timestamp);
                                
                                ++$k;

                                if($aaa==$bbb)
                                {
                                    echo '<td id="planningtab3">'.'<a href="reservation.php">'.$ttt.' Réservé'.'</a>'.'<td/>';
                                    break;
                                    
                                }
                                        
                            }

                            if($aaa!=$bbb)
                            {
                                $aaa=$tabheure[$h];


                                echo '<td id="planningtab">'.'<a href="reservation-form.php">'.$aaa.'h'.' Libre'.'</a>'.'<td/>';
                                
                            }

                            

                    }
                ++$h;
                ++$j;
                echo '<br/>';
            }
          


}




//     // REQUETE NOM ET TITRE DES RESERVATIONS
//     $connexion = mysqli_connect("localhost","root","","reservationsalles");
//     $requete="SELECT titre,description,debut FROM reservations";
//     $query=mysqli_query($connexion,$requete);
//     $resultat=mysqli_fetch_all($query);
    
//     $k=0;
    
//     while($k<count($resultat))
//     {
       

//         $jour = $resultat[$k][2][8].$resultat[$k][2][9];
//         $annee = $resultat[$k][2][0].$resultat[$k][2][1].$resultat[$k][2][2].$resultat[$k][2][3];
//         $mois =$resultat[$k][2][5].$resultat[$k][2][6];
//         $heure=$resultat[$k][2][11].$resultat[$k][2][12];
//         $ttt=$resultat[$k][0];
//         $timestamp = mktime($heure, 0, 0, $mois, $jour, $annee);
//         $bbb=date('DH', $timestamp);

//         echo $bbb.'<br/>';
        
//         ++$k;
//     }


// echo $resultat[0][0].'<br/>';
// $ttt=$resultat[0][0];
// echo $resultat[0][1].'<br/>';


// $jjj=$resultat[$k][2][8].$resultat[$k][2][9];

// if($resultat[$k][2][8]=0)
// {
//     $jjj=$resultat[$k][2][9];
// }











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