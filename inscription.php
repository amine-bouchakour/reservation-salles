<html>
    <head>
<title>inscription</title>
<link rel="stylesheet" href="planning.css">
</head>

<body>
    



<?php

include("fonctions.php");

headmenu();





?>

<div class="divco">

<form action="" method="post">
<input class="divinbis" type="text" name="login" placeholder="login"><br>
<input class="divinbis" type="password" name="password" placeholder="password"><br>
<input class="divinbis" type="password" name="confirmpassword" placeholder="confirmpassword"><br>
<input class="divinbis" type="submit" name="valider" value="S'inscrire"><br>
<div class="divret"><?php    inscription ();?></div>

</form>

</div>


<footer>
    <div class="copy">
    © 2019-2029 Bouchakour Amine All right reserved.
    </div>
</footer>

</body>



</html>