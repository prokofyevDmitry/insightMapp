<?php 


# ici on essaye de rendre automatiquement l'image de profile ronde
// lit le fichier: 
function rapport_erreur($error_code,$error_text)
{
	echo '<br>ERROR N '.$error_code.'<br> '.$error_text;

	if(!strpos($error_text, "session_start"))
		die();

}

set_error_handler("rapport_erreur");

$source_path = 'upload/137/photos/profile_pic/homescreen/test.jpg';

$type = exif_imagetype($source_path);

if($type ===2 )
{
	$source_tmp_jpeg = imagecreatefromjpeg($source_path);
	$source_path2 = 'upload/137/photos/profile_pic/homescreen/tmp.png';
	$source_path3 = 'upload/137/photos/profile_pic/homescreen/test.png';
	
	imagepng($source_tmp_jpeg,$source_path2,0);
	$source = imagecreatefrompng($source_path2);
}
else
{
	$source = imagecreatefrompng($source_path); 
}

// hardcoding: code couleur principale du site : cyan 
$couleur = imagecolorallocate($source, 69, 209, 215);

// on applique la formule du cercle pour tracer point par point tout les cercles jusqu'a obtenir un cdre colorée



// l'image d'origine est carée il est donc aisé davoir la composante:
$cote = imagesy($source);



$centre = $cote/2;
$R = pow($centre,2);
for($i = 0; $i<=$cote;$i++)
{
		for($j =0; $j<=$cote;$j++)
		{
			$result = pow($centre-$i,2)+pow($centre-$j,2);
			
			if($result>$R)
				imagesetpixel($source, $i, $j, $couleur);
		}	
}

imagecolortransparent($source,$couleur);



// header('Content-Type: image/png');

 imagepng($source,$source_path3,0);
		echo 'ok'
		


?>

