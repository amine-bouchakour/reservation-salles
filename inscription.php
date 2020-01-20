<html>
    <head>
<title>inscription</title>
<link rel="stylesheet" href="planning.css">
</head>




<?php

include("fonctions.php");

headmenu();





?>


<form action="" method="post">
<input type="text" name="login" placeholder="login"><br>
<input type="password" name="password" placeholder="password"><br>
<input type="password" name="confirmpassword" placeholder="confirmpassword"><br>
<input type="submit" name="valider" value="S'inscrire"><br>
</form>



<?php

inscription();


?>





</html>