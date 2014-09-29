<?php

// la fonction permet de trouver toutes les occurance du $cle dans un champ particulier de la bdd

function champ_search($key, $champ, $bd, $chart_name)
{

	$var=$bd->query('SELECT * FROM '.$chart_name.' WHERE '.$champ.' LIKE '.'\''.$key.'\'');
	return $var;
}

