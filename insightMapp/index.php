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
include ("control/head_page_print.php");
if(isset($_GET['loc']))
{
	 


switch ($_GET['loc'])
{
	// la case acceuille, ou l'on se renseigne sur la personne qui vient de se connecter
	case "home_premiere_visite": include 'control/premiere_visite.php'; break;
	case "signin": include 'control/logIn.php'; break;
	// losqu'on est connectés.
	case "home_connecte" : include 'control/home_connecte.php'; break;
	
	default:include 'vue/homePage.php';
}

}

if(!isset($_GET['loc']))
{
	$css[0] = "HomeStyle.css";
	$css[1] = "leaf.css";
	head_page_print(true, true, true, true, true, $css);
}

?>


w