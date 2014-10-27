<?php

//cette fonction est appelée pour remplir une array des path de fichier CSS. 

function css_array_fill_home_page()
{
	$array = array(
			'CSStyle/HomeStyle.css',
			'CSStyle/add_info.css',
			'CSStyle/leaf.css',
			'CSStyle/signIn.css'
	);
	return $array;
}