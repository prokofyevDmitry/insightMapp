<?php

//cette fonction est appelée pour remplir une array des path de fichier CSS. 

//on passe en atribut un array de 1 ou 0, on inclura certain des fichiers CSS, ce qui evite le conflit!! 

function css_array_fill_home_page($array2)
{
	
	$array = array(
			'HomeStyle.css',
			'signIn.css',
			'leaf.css',
			'add_info.css'
	);
	
	
	for ($i= 0; $i<count($array); $i++ )
	if($array2[$i]==1)  $array1[$i] = $array[$i];
	else $array1[1]="empty.css";  
	return $array1;



}