<?php


/*La fonction permet d'extraire un champ en particulier en fonction d'un champs clé et de sa valeur
 * 																			
 * 
 */

function champ_search_precise($key, $champ, $champ_recherche,$bd, $chart_name)
{

	$var=$bd->query('SELECT * FROM '.$chart_name.' WHERE '.$champ.' LIKE '.'\''.$key.'\'');
	$donnes = $var->fetch();
	return $donnes[$champ_recherche];
}

