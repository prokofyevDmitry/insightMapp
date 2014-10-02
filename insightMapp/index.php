<?php

/*
 le constructeur par déffaut: c'est ici qu'on vient au début et ou on revient après chaque page, 
ici se feront les validations.
 * Pour savoir qu'est ce qu'on va inclure on testera les variables courantes et les pages précédentes. 
 * 
 * 
 */

if(!isset($_COOKIE['connected']))
{
	include 'vue/homePage.php';
	
}




?>


