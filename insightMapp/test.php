<?php 


# ici on essaye de rendre automatiquement l'image de profile ronde
// lit le fichier: 

$source_path = 'upload/137/photos/profile_pic/homescreen/dima_diam.jpg';
$dest_path = 'upload/137/photos/profile_pic/homescreen/test.jpg';
$source = imagecreatefromjpeg($source_path);




// hardcoding: code couleur principale du site : cyan 
$couleur = imagecolorallocate($source, 69, 209, 215);



// for($i=0;$i<=40;$i=$i+0.1)
// imageellipse($source, 42, 42,84+$i,84+$i, $couleur);


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

		
		
		
		


?>

