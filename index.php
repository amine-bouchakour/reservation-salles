<html>
    <head>
<title>Index</title>
<link rel="stylesheet" href="planning.css">

    </head>

    <body>
        
    

<?php
session_start();

include('fonctions.php');
headmenu();

if(isset($_SESSION['login']))
{
    echo 'Bienvenue à toi '.$_SESSION['login'].'<br/>';
}




?>

<footer>
    <div class="copy">
    © 2019-2029 Bouchakour Amine All right reserved.
    </div>
</footer>

</body>
</html>