<?php
function initialisation_user_session($info_user)
{
	$_SESSION['mail'] = $info_user['mail'];
	$_SESSION['nom'] = $info_user['nom'];
	$_SESSION['prenom'] = $info_user['prenom'];
	$_SESSION['user_id'] = $info_user['id'];
	$_SESSION['derniere_connexion'] = $info_user['last_activity'];
}