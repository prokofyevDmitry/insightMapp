<?php
$bdd = new PDO('mysql:host=localhost; dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));;  
// la array genere une erreur et peut nous donner plus de précision

$reponse = $bdd->query('SELECT console, nom,prix  FROM jeux_video WHERE console="NES" OR console="PC" ORDER BY prix LIMIT 5');

while($donnes = $reponse->fetch())
{
	echo '<p> -'.$donnes['console'] .'       -'.$donnes['nom'].$donnes['prix'].'  euros </p>';

}

?>



