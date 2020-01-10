Sur cette page on voit le planning de la semaine avec l’ensemble des
réservations effectuées. Le planning se présente sous la forme d’un
tableau avec les jours de la semaine en cours. Dans ce tableau, il y a en
colonne les jours et les horaires en ligne. Sur chaque réservation, il est
écrit le nom de la personne ayant réservé la salle ainsi que le titre. Si un
utilisateur clique sur une réservation, il est amené sur une page dédiée.
Les réservations se font du lundi au vendredi et de 8h et 19h. Les créneaux
ont une durée fixe d’une heure.

<html>

<head>
    <link rel="stylesheet" href="planning.css">
</head>

<body>

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
            <td> <a href="reservation-form.php"> <?php echo 'Libre' ?> </a> </td>
            <td> <a href="reservation-form.php"> <?php echo 'Libre' ?> </a> </td>
            <td> <a href="reservation-form.php"> <?php echo 'Libre' ?> </a> </td>
            <td> <a href="reservation-form.php"> <?php echo 'Libre' ?> </a> </td>
            <td> <a href="reservation-form.php"> <?php echo 'Libre' ?> </a> </td>
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
            <td>MIDI</td>
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
    </table>

</body>



</html>