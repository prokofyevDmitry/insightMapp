<?php

// fonction de controle d'entrée de fichier

/*
 * le nom du fichier: plus petit que 200 chars
 * le la ligne ne doit pas compter que
 *
 */
function test_fichier($fichier) {
	

	
	
	// le nom doit être sans espace et sans accents
	// pas d'accents, pas d'espaces pas de anti slash.
	// le début et la fin doivent etre en des lettre (le début du
if(isset($fichier) and $fichier['error']==0)
{
	$nom = test_fichier_nom ( $fichier);
	//test type du fichier;
	$type = test_fichier_type($fichier);
	// test taille fichier (<20mb);
	$taille = test_fichier_taille($fichier);
	
	
  	if($nom==false) echo 'wrong name<br>';
  	if($type==false) echo 'wrong type<br>';
  	if($taille==false) echo 'wrong taille<br>';
	
	if($nom==false or $type==false or $taille==false)
		return false;
	else return true;
}
else 
	return false;
}

// fonction de test de la validité du nom du doccument
function test_fichier_nom($fichier) {
	
	
	// Amélioration pour la 2.0: faire en sorte d'accepter tout les chars. 
	$pas_de_signes_interdits = '#^[a-zA-Z0-9._-]+$#';
	$pas_de_ponctuation_au_debut = '#^[a-zA-Z0-9]#';
	$pas_de_ponctuation_a_la_fin = '#[a-zA-Z]$#';
	
	// test de composition du nom du fichier
	if (preg_match ( $pas_de_signes_interdits, $fichier['name'] ) and preg_match ( $pas_de_ponctuation_au_debut, $fichier ['name'] ) and preg_match ( $pas_de_ponctuation_a_la_fin, $fichier ['name'] )) {
		
		$caracteres_specs = false;
	} else {
		$caracteres_specs = true;
	}
	
	if (strlen ( $fichier['name'] ) > 100) {
		$trop_long = true;
	}
	
	if (isset ( $trop_long ) or $caracteres_specs==true ) {
		return false;
	} else {
		return true;
	}
}

function test_fichier_type($file)
{
	$string = array (
			'png',
			'jpeg',
			'jpg'
	);
	
	
	
	$infosfichier = pathinfo($file['name']);
	$extension_upload = $infosfichier['extension'];
	
	if(in_array($extension_upload,$string))
	{
		return true;
	}
	else 
	{
		return false;
	}
}


function test_fichier_taille($file)
{
if($file['size']<100000000)	return true;
else return false;
}
