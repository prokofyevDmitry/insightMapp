 <?php
session_start();

#La fonction permet de passer d'une image de taille indéfini à l'image de taillle défini et ronde dans le cas ou c'est une homescreen

# TTODO GESTION DES ERREURES

// VARIABLES DE TEST
 // $_SESSION['user_id'] = 131;
 // $_SESSION['nom'] = "test";
 // $_SESSION['prenom'] = "test";

 // 	$fichier_principal = "../upload/".$_SESSION['user_id']."";
	// $picture_path=$fichier_principal.'/photos/originals/profile_pic/1312014-09-25 12.34.16.png';
// ######################

// les deux coordonnées x et y sont la pour pouvoir utiliser la fonction en mode custom
// dans ce cas la size prend la valeur 0
function resize_picture($picture_path, $size,$x=null,$y=null)
{

	// la variable permet de deceler le cas ou l'image passée en argument est un carrée parfait , au quel cas tout le traitement est superflu. 
	$crop_situation=null;
	// intialisation des parametres 
	include 'ini/param.php';
	$verification_type=getimagesize($picture_path);
	/* verif du type de fichier:
		 la fonction getimagesize retourne le type de l'image dans la troisième case de l'array
	*/
	if($verification_type[2]===2)
	{	
		//cas ou le fichier est un jpeg
		$source = imagecreatefromjpeg($picture_path);
	}
	
		if($verification_type[2]==3)
		{
			// cas ou le fichier est un .png
			$source = imagecreatefrompng($picture_path);
		}

	switch($size)
	{
		// resize pour le homescreen, LES VARIABLES GLOBALS SONT INSTANCIÉES DANS LE PARAM.PHP	
	# write dir contient l'adresse finale de l'écriture du fichier 
		case "homescreen": $dest_x=$GLOBALS['HOME_IMAGE_SIZE_X'];$dest_y=$GLOBALS['HOME_IMAGE_SIZE_Y'];
		// On écrit la photo dans un nouveau dossier, appelé tmp il va servir de sas pour la modification de toutes les images liées à ce profil, le nom par déffaut: tmp_homescreen
						$write_dir = 'upload/'.$_SESSION['user_id'].'/photos/tmp/tmp_homescreen';break;
		// case "0": taille de la valeur custom
		default: break;
	}
	
	
	
	// pour réduire l'image dans les meilleures conditions, on cherchera le carée le plus grand dans le réctangle.
	$hauteure_source = imagesy($source);
	$largeur_source = imagesx($source);
	
	// la base du carée est la largeure de l'image source
	if($hauteure_source>$largeur_source)
	{
		$crop_situation = 1;
		$base = $largeur_source;
		$grande_arrete = $hauteure_source;
	}
	
	if($hauteure_source<$largeur_source)
	{
		$crop_situation = 2;
		$base = $hauteure_source;
		$grande_arrete = $largeur_source;
	}
	
	// création de l'image vide  	
	$destination = imagecreatetruecolor($dest_x, $dest_y);
	// on évite le cas ou l'image est carées, si la valeur $crop_situation n'a pas été initialisé, par contre si elle l'est 
	if(isset($crop_situation))
	{
		// calcul de la taille de la marge
		$marge = ($grande_arrete-$base)*0.5;
		// dans le cas ou la petite arrete est bien x
		if($crop_situation===1)
			imagecopyresampled($destination, $source, 0, 0, 0, $marge, $dest_x, $dest_y, $largeur_source, $hauteure_source-2*$marge);
		else
			imagecopyresampled($destination, $source, 0, 0, $marge, 0, $dest_x, $dest_y, $largeur_source-2*$marge, $hauteure_source);
			
	}
	// si l'image donnée est un carée alors on applique la façon classique
	if(!isset($crop_situation))
	imagecopyresampled($destination, $source, 0, 0, 0, 0, $dest_x, $dest_y, $largeur_source,$hauteure_source);
	// integration solution image ronde
# ici on rend automatiquement l'image de profile ronde

// 
	

	$source_path_finale = 'upload/'.$_SESSION['user_id'].'/photos/profile_pic/homescreen/profile.pic'.$_SESSION['nom'].date("Y-m-d-h-i-s").'.png'; 



# DANS LE CAS OU L'IMAGE DOIT ETRE RONDIFIE: ON APPLIQUE DIRRECTEMENT LE FILTRE NECESSAIRE
# CELA ARRIVE DANS LE CAS OU L'IMAGE EST DESTINEE A LA PHOTO DE PROFIL
# SINON ON PROCEDE DIRECT A L ECRITURE
	if(strcmp($size,"homescreen")===0)
	{

// hardcoding: code couleur principale du site : cyan 
$couleur = imagecolorallocate($source, 69, 209, 215);

// on applique la formule du cercle pour tracer point par point tout les cercles jusqu'a obtenir un cdre colorée



// l'image d'origine est carée il est donc aisé davoir la composante:
$cote = imagesy($destination);



$centre = $cote/2;
$R = pow($centre,2);
for($i = 0; $i<=$cote;$i++)
{
		for($j =0; $j<=$cote;$j++)
		{
			$result = pow($centre-$i,2)+pow($centre-$j,2);
			
			if($result>$R)
				imagesetpixel($destination, $i, $j, $couleur);
		}	
}

imagecolortransparent($destination,$couleur);

}



// header('Content-Type: image/png');

 imagepng($destination,$source_path_finale,0);
return $source_path_finale;

}


# Debug call resize_picture($picture_path,"homescreen");

?>
