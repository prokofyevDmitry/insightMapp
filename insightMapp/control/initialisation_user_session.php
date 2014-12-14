<?php
function initialisation_user_session($info_user) {
	$_SESSION ['mail'] = $info_user ['mail'];
	$_SESSION ['nom'] = $info_user ['nom'];
	$_SESSION ['prenom'] = $info_user ['prenom'];
	$_SESSION ['user_id'] = $info_user ['id'];
	$_SESSION ['derniere_connexion'] = $info_user ['last_activity'];
	// on vérifie qu'il ait bien une photo réduit dans le doccument
	$profile_pic_path = 'upload/'.$_SESSION['user_id'].'/photos/profile_pic/homescreen/';
	$profile_image_homescreen_name = scandir($profile_pic_path);
	// normalement il n'y a qu'une seule image dans ce fichier
	// si $profile_pic_path est plus grand que 3 (avec . ..) on trig une erreur de contenance
// 	if(count($profile_image_homescreen_name)>3)
// 	{
// 		error_log("
// 				Plus de 2 images dans le /homescreen de".$_SESSION['user_id'], 3, $IMAGE_MANIP_ERROR_LOG_PATH );
// 	}
	

	
	if(count($profile_image_homescreen_name)>2)
	$_SESSION['profile_pic_path'] = $profile_pic_path.$profile_image_homescreen_name[2];
	
	
	$info_user['profile_pic'];
	
}