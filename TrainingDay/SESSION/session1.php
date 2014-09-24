<?php
session_start();


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
</head>

<body>

<p>Bonjours, veuillez rensegnier la fiche</p>
<form action="analyse.php" method="post">
<input type="text" name="nom" placeholder="Nom">
<input type="text" name="prenom" placeholder="Prénom">
<input type ="text" name="age" placeholder="age">
<input type="submit" value="ok">
</form>

</body>
</html>