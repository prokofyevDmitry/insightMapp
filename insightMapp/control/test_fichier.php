<?php

// fonction de controle d'entrée de fichier

/*
 * le nom du fichier: plus petit que 200 chars
 * le la ligne ne doit pas compter que 
 * 
 */


function test_fichier($fichier)
{
	// le nom doit être sans espace et sans accents
	// pas d'accents, pas d'espaces pas de anti slash.
	echo ($fichier['name']);
	
	$regex = '#(. .,./.,[\p{L}a-zA-Z])*#is';
	$regex = '#[ /]+#';
	$regex2 = '#[^a-zA-Z0-~9!"#´}{|`^_]\[@?>=<;:.-,+*)($%&\' /]+#';
// 	u128-u154u160-u165u181-u183u224u226-u229u233-u237

	if(preg_match($regex, $fichier['name']))
	{
		echo 'find a \' \' or a \/ ';
	}
			
	if(preg_match($regex2, $fichier['name']))
	{
		echo 'find accent or sapce or /';
	}
	
			
			
	
	
}
