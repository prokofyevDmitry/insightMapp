<?php

/*
 le constructeur par déffaut: c'est ici qu'on vient au début et ou on revient après chaque page, 
ici se feront les validations.
 * Pour savoir qu'est ce qu'on va inclure on testera les variables courantes et les pages précédentes. 
 * 
 * 
 */



// techniques for redirection: 

session_start();
// inclusion de la fonction d'impression de la page génarle
include 'control/head_page_print.php';
include'control/css_array_fill_home_page.php';
if(isset($_GET['loc']))
{
	 


switch ($_GET['loc'])
{
	// la case acceuille, ou l'on se renseigne sur la personne qui vient de se connecter
	case "home_premiere_visite": include 'control/premiere_visite.php'; break;
	// la page de connexion
	case "signin": include 'control/logIn.php'; break;
	// losqu'on est connectés.
	case "home_connecte" : include 'control/home_connecte.php'; break;
	
	case "signup": include 'control/signIn.php'; break;
	default: $false_adresse = true ; break;
	
}

}

if(!isset($_GET['loc']) or isset($false_adresse))
{

	// load of deffault page
$css = css_array_fill_home_page(array(1,1,1,0));
	// si le sujet est connecté le traitement se fera à l'interne dans les sous parties
	head_page_print(true, true, true, true, true, $css);
}


?>


w