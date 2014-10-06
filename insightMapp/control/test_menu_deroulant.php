<?php


// cette fonction permet de tester les menus déroulant, en y associant le fichier contenant les valeurs du menu déroulants



function test_menu_deroulant($string_to_test, $localisation_des_valeurs)
{



// cette focntion veririfie que le pays entrée par l'utilisateur correspond à la liste existante:



// on place ici le fichier avec les valeurs du menu déroulant
$fichier_de_reference = fopen($localisation_des_valeurs, 'r');

// on lit une a une la ligne le fichier des valeurs.
$ligne= fgets($fichier_de_reference);
$ligne = htmlspecialchars($ligne);

while($ligne != false)
{
	//on définit un regex: le but est de trouver la valeur à confirmer dans une des valeurs contenues dans le fichier des valeurs du menu déroulant
	$regex = '#"'.$string_to_test.'"#';
	
	
	//on test
	if(preg_match($regex,$ligne))
	{
		$bon= true;
	}
	$ligne = fgets($fichier_de_reference);	
}



if(isset($bon) and $bon==true)
{
	return true;
}
else 
	return false;
fclose($fichier_de_reference);

}