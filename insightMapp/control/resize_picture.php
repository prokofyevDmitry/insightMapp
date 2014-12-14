<?php
session_start();

# TODO GESTION D ERREUR 

// VARIABLES DE TEST
// $_SESSION['user_id'] = 131;
// $_SESSION['nom'] = "test";
// $_SESSION['prenom'] = "test";
// ######################

// les deux coordonnées x et y sont la pour pouvoir utiliser la fonction en mode custom
// dans ce cas la size prend la valeur 0
function resize_picture($picture_path, $size,$x=null,$y=null)
{

// cas où le paramettre passé est mauvais:
	


	
	// la variable permet de deceler le cas ou l'image passée en argument est un carrée parfait , au quel cas tout le traitement est superflu. 
	$min_var_zero=null;
	include 'ini/param.php';
	
	
	// verif du type de fichier:
	$longueure = strlen($picture_path);
	if(strpos($picture_path, ".jpg") or strpos($picture_path, ".jpeg"))
	{	
		//cas ou le fichier est un jpeg
		#echo 'jpg';
		$source = imagecreatefromjpeg($picture_path);
		$jpeg=true;
	}
	
		if(strpos($picture_path, ".png"))
		{
			// cas ou le fichier est un .png
			#echo 'png';
			$source = imagecreatefrompng($picture_path);
		$jpeg=false;
	
		}	

		
		
		
		
		
	switch($size)
	{
		// resize pour le homescreen, LES VARIABLES GLOBALS SONT INSTANCIÉES DANS LE PARAM.PHP	
	
		case "homescreen": $dest_x=$GLOBALS['HOME_IMAGE_SIZE_X'];$dest_y=$GLOBALS['HOME_IMAGE_SIZE_Y'];
						$write_dir = 'upload/'.$_SESSION['user_id'].'/photos/profile_pic/homescreen/'.$_SESSION['nom'].'_'.$_SESSION['prenom'];break;
		// case "0": taille de la valeur custom
		default:break;
	}
	
	
	
	// pour réduire l'image dans les meilleures conditions, on cherchera le carée le plus grand dans le réctangle.
	$hauteure_source = imagesy($source);
	$largeur_source = imagesx($source);
	
	// la base du carée est la largeure de l'image source
	if($hauteure_source>$largeur_source)
	{
		$min_var_zero = 1;
		$base = $largeur_source;
		$grande_arrete = $hauteure_source;
	}
	
	if($hauteure_source<$largeur_source)
	{
		$min_var_zero = 2;
		$base = $hauteure_source;
		$grande_arrete = $largeur_source;
	}
	
	
	
	
	// création de l'image vide  	
	$destination = imagecreatetruecolor($dest_x, $dest_y);
	// on évite le cas ou l'image est carées, si la valeur $min_var_zero n'a pas été initialisé, c'est que c'est le cas
	if(isset($min_var_zero))
	{
		// calcul de la taille de la marge
		$marge = ($grande_arrete-$base)*0.5;
	
		// dans le cas ou la petite arrete est bien x
		if($min_var_zero===1)
			imagecopyresampled($destination, $source, 0, 0, 0, $marge, $dest_x, $dest_y, $largeur_source, $hauteure_source-2*$marge);
		else
			imagecopyresampled($destination, $source, 0, 0, $marge, 0, $dest_x, $dest_y, $largeur_source-2*$marge, $hauteure_source);
			
	}
	
	// si l'image donnée est un carée alors on applique la façon classique
	if(!isset($min_var_zero))
	imagecopyresampled($destination, $source, 0, 0, 0, 0, $dest_x, $dest_y, $largeur_source,$hauteure_source);
	
	// le cas ou l'image dépasserais sur les x aprées la redéfinition des y
	
	

	// ecriture finale de l'image crée dans le fichier $write_dir construit dans le case
	if($jpeg)
	{
		imagejpeg($destination,  $write_dir.'.jpg');
		
		// le path dans session pour logo.php:
		$_SESSION['profile_pic_path'] = $write_dir.'.jpg';
	}
	else 
	{
	imagepng($destination,$write_dir.'.png');
	$_SESSION['profile_pic_path'] = $write_dir.'.png';
	}
	
}


#	APPEL DE DEBUGGAGE
//resize_picture("../upload/131/photos/originals/profile_pic/1312014-09-25 12.34.16.png","homescreen");


