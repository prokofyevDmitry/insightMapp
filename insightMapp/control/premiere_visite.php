<?php
/* Lors de la premiere connexion on va demander un peu plus d'information sur l'utilisateur,
Il n'est pas oubligé de la donnée, on lui laisse le choix bien evidament. 

*	Les information à colecter
*		
*		Ajouter un photo de profil
*		nationalité
*		Ville ou il habite
*		sexe
*
*		On inclura ici une presentation générale de ce que peut faire le site.
*
*
*
*
*/

include 'control/classes/Class_user.php';

// echo ($_SESSION['hi']);



// $user = unserialize($_SESSION['user']);

	// securisation de connexion
	if(!isset($_SESSION['user']) or !isset($_SESSION['connecte']) or isset($_SESSION['derniere_connexion']))
	{
		echo '<script>
			window.location.replace("index.php");
				exit(); 
			</script>';
	}
	else
	{
		
		if(isset($_GET['submit']))
		{
			// traitement des informations complementaires inserrées. 
		/*TODO
		 * TEST A FAIRE:
		 * 
		 * 
		 */	
		
			
		}
			
			
// 		print_r ($_SESSION);
		
		// Affichage des informations auxiliaires:

		include 'vue/additional_information_form.php';
		
		

		
		
		
		
		
		
	}
	
	
	
?>