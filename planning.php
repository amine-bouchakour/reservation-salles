<html>

<head>  
    <link rel="stylesheet" href="planning.css">
    <title>Planning</title>

</head>

<?php
session_start();
date_default_timezone_set('Europe/Paris');  

include("fonctions.php");

headmenu();





function planning()

{

            $tabdate=array('V','Mon','Tue','Wed','Thu','Fri');
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
                            $requete="SELECT id,titre,description,debut FROM reservations";
                            $query=mysqli_query($connexion,$requete);
                            $resultat=mysqli_fetch_all($query);
                            $k=0;
                            
                            while($k<count($resultat))
                            {
                               

                                $jour = $resultat[$k][3][8].$resultat[$k][3][9];
                                $annee = $resultat[$k][3][0].$resultat[$k][3][1].$resultat[$k][3][2].$resultat[$k][3][3];
                                $mois =$resultat[$k][3][5].$resultat[$k][3][6];
                                $heure=$resultat[$k][3][11].$resultat[$k][3][12];
                                $ttt=$resultat[$k][1];
                                $ttt=ucfirst($ttt);
                                $iii=$resultat[$k][0]; //Id evenement
                                $timestamp = mktime($heure, 0, 0, $mois, $jour, $annee);
                                $bbb=date('DH', $timestamp);
                                if ($aaa=='V08' && $k<1 or $aaa=='V09' && $k<1 or $aaa=='V10' && $k<1 or $aaa=='V11' && $k<1 or $aaa=='V12' && $k<1 or $aaa=='V13' && $k<1 or $aaa=='V14' && $k<1 or $aaa=='V15' && $k<1 or $aaa=='V16' && $k<1 or $aaa=='V17' && $k<1 or $aaa=='V18' && $k<1) {
                                    echo "<td id=\"planningtab\">$tabheure[$j]"."h"."</td>";
                                }
                                ++$k;

                               
                                if($aaa==$bbb)
                                {
                                    $requete1="SELECT login FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur WHERE reservations.id='".$iii."' ";
                                    $query1=mysqli_query($connexion,$requete1);
                                    $resultat1=mysqli_fetch_row($query1);
                                    $nnn=$resultat1[0];//nom de la personne faisant la réservation
                                    $nnn=ucfirst($nnn);

                                    $id = $iii;
                                    if($nnn!=NULL)
                                    {
                                        echo "<td id='planningtab3'>"."<a class='col' href='reservation.php?id=".$id."'>"."Titre : ".$ttt.'<br/>'."Réservation : ".$nnn."</a>"."<td/>";
                                        break;
                                    }

                                }
                                        
                            }

                            if($aaa=='Mon12' or $aaa=='Tue12' or $aaa=='Wed12' or $aaa=='Thu12' or $aaa=='Fri12')
                            {
                                echo '<td id="planningtab4">'.'PAUSE REPAS'.'<td/>';
                            }

                            elseif($aaa!=$bbb)
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









?>



<body>

<table>
    <thead class="aligntab">
        <td id="planningtab2"></td>
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

<div>
    <div class="copy">
    © 2019-2029 Bouchakour Amine All right reserved.
    </div>
</div>

</body>



</html>