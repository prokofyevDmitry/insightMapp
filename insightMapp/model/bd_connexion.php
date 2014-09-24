<?php
function db_connexion($dbname, $user, $password)
{
	try {	
 $bdd = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur'.$e->getMessage());
		return;
	}
	return $bdd;
	
}