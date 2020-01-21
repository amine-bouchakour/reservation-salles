<html>
    <head>
<title>Connexion</title>
<link rel="stylesheet" href="planning.css">
</head>

<body>
    

<?php

include('fonctions.php');
headmenu();



?>
<div class="divco">
<form action="" method="post">
    <input class="divin" type="text" name="login" placeholder="login"><br>
    <input class="divin" type="password" name="password" placeholder="password"><br>
    <input class="divin" type="submit" name="valider" value="Se connecter"><br>
    <div class="divret"><?php    connexion ();?></div>

</form>
</div>


<footer>
    <div class="copy">
    © 2019-2029 Bouchakour Amine All right reserved.
    </div>
</footer>
</body>

</html>
