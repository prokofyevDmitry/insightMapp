<?php


function creat_user_foldersystem($user_id)
{
	$fichier_principal = 'upload/'.$user_id;
	mkdir($fichier_principal);
	mkdir($fichier_principal.'/photos');
	
	mkdir($fichier_principal.'/photos/thumbnail');
	mkdir($fichier_principal.'/photos/profile_pic');
	mkdir($fichier_principal.'/photos/profile_pic/homescreen/');
	mkdir($fichier_principal.'/photos/old_profile_pic');
	mkdir($fichier_principal.'/photos/originals');
	mkdir($fichier_principal.'/photos/originals/profile_pic');
	mkdir($fichier_principal.'/photos/originals/old_profile_pic');
}


