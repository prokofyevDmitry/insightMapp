<?php


// la fonction permet de récuperer un objet PDO qui contient le résultat d'une requette.
// simplement retourne les elements d'une cologne

function champ_query($champ, $bd, $chart_name)
{
	// 
	
	$var=$bd->query('SELECT '.$champ.' FROM '.$chart_name.'');
		return $var;
		
}