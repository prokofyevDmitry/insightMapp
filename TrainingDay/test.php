<?php

header ('content-type: image/jpg');
$source = imagecreatefromjpeg('coucher.jpg');
$destination = imagecreatetruecolor(100,100);

$largeur_source =  imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagejpeg($destination);
/*
$thubnail = imagecreatefromjpeg('mini-coucher.jpg');
image*/

// explication d'utilisation de imagecopyresampled(): fichier de destinantion, fichier source , la localisation des coins par rapport à la destinantion
// // 



?>