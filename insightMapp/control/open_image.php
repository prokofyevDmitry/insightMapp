<?php

function open_image($path_image)
{
	// on va vérifier le type de l'image (on en a deux: le jpeg ou le png

	$image_type_jpeg= false;
	$image_type_png = false;
	
	// les regex des testde type d'mage
	$regex_jpeg = "/^(*.jp[e]g)$/";
	$regex_png = "/^(*.png)$/";
	
	
	// si le regex est bon alors c'est un jpeg
	if(preg_match($regex_jpeg, $path_image))
		$image_type_jpeg=true;

	
	// so le regex bon alors c'est un png
	if(preg_match($regex_png, $path_image))
		$image_type_png=true;
	
	
	var_dump($image_type_jpeg,$image_type_png); die();
	
	
	
	
	
	// on déclare un header pour setter le type de fichier que nous allons ouvrir, dans ce cas la une image.
	//header("Content-type: image/jpeg");
		
	// on ouvre l'image avec la fonction PHP, si le path n'est pas bon, alors on affiche un méssage et on meure
}



open_image("hello.png");


	
	
	

