<?php 


# ici on essaye de rendre automatiquement l'image de profile ronde
// lit le fichier: 

$source_path = 'upload/137/photos/profile_pic/homescreen/dima_diam.jpg';

$source = imagecreatefromjpeg($source_path);

$couleur = imagecolorallocate($source, 69, 209, 215);



// for($i=0;$i<=40;$i=$i+0.1)
// imageellipse($source, 42, 42,84+$i,84+$i, $couleur);


// on applique la formule du cercle pour tracer point par point tout les cercles jusqu'a obtenir un cdre colorée



// l'image d'origine est carée il est donc aisé davoir la composante:
$cote = imagesy($source);



$R = pow($cote,2);

for($i = 1; $i<$cote;$i++)
{
		for($j =1; $j<$cote;$j++)
		{
			$result = pow($i,2)+pow($j,2);
			if($result>$R-5*$cote and $result<=$R+5*$cote)
				imagesetpixel($source, $i, $j, $couleur);
		}	
}




        header("Content-type: image/jpg");     
		imagejpeg($source);

/*
 * 
  for(i=x-r;i<=x+r;i++)
{
  for(j=y-r;j<=y+r;j++)
{
  true1= 0;
  int result = pow(i-x,2)+pow(j-y,2);
if(R==result)
{
setPixel(i,j,0xFFFF);
true1 = 1;
}

if(result<R+r && result>R-r )
{

  setPixel(i,j,0xFFFF);
  true1 = 1;
 * 
 */
		
		
		
		


?>

