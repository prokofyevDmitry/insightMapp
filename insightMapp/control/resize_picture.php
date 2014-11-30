<?php
session_start();
$_SESSION['user_id'] = 131;

// les deux coordonnées x et y sont la pour pouvoir utiliser la fonction en mode custom
// dans ce cas la size prend la valeur 0
function resize_picture($picture_path, $size,$x=null,$y=null)
{
	
	include 'ini/param.php';
	// verif du type de fichier:
	
	
	$longueure = strlen($picture_path);
	if(strpos($picture_path, ".jpg") or strpos($picture_path, ".jpeg"))
	{	
		echo 'jpg';
		$source = imagecreatefromjpeg($picture_path);
		$jpeg=true;
	}
	
		if(strpos($picture_path, ".png"))
		{echo 'png';
			$source = imagecreatefrompng($picture_path);
		$jpeg=false;
	
		}	

		
		
		
		
		
	switch($size)
	{
		// resize pour le homescreen
		case "homescreen": $dest_x=$GLOBALS['HOME_IMAGE_SIZE_X'];$dest_y=$GLOBALS['HOME_IMAGE_SIZE_Y'];
						$write_dir = '../upload/'.$_SESSION['user_id'].'/photos/profile_pic/homescreen/'.$_SESSION['nom'].'_'.$_SESSION['prenom'];break;
		// case "0": taille de la valeur custom
		default:break;
	}
	
	
	//TODO verifier si la proportions entre les x et y de l'image correspond bien au proportion demandées, sinon faire le croppage aprés la copysample
	// lecture de la taille de l'image
	$hauteure_source = imagesy($source);
	$largeur_source = imagesx($source);
	$proportion = $dest_y/$hauteure_source;
	
	// le cas ou l'image dépasserais sur les x aprées la redéfinition des y
	
	
	// création de l'image vide dans laquelle on inscrira les 	
	$destination = imagecreatetruecolor(91, 91);
// 	if($largeur_source*$proportion>$dest_x)
// 	{
		
// 	}
	// creation
	imagecopyresampled($destination, $source, 0, 0, 0, 0, $dest_y, $largeur_source*$proportion,$hauteure_source, $largeur_source);
	if($jpeg)
	{
		imagejpeg($destination,  $write_dir.'.jpg');
	}
	else 
	{
	imagepng($destination,$write_dir.'.png');
	}
	
}

resize_picture("../upload/131/photos/originals/profile_pic/1312014-09-25 12.34.16.png","homescreen");


