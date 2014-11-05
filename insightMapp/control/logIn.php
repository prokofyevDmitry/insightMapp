<?php 

include 'control/classes/Class_user.php';

include 'model/bd_connexion.php';
include 'model/champ_query.php';
include 'model/champ_search.php';
include 'control/initialisation_user_session.php';


//connexion base de données:
$bdd=db_connexion('insightmapp', 'root', '');
 
 
if(isset($_POST['submit']) )
{
	if(isset($_POST['login']) AND isset($_POST['password']) AND $_POST['login']!=NULL)
	{
		// eviter l'injection
		foreach ($_POST as $value => $key) 
			$_POST[$value]=htmlspecialchars($key);
		// recherche de l'email dans la bbd
		$donnee = champ_search($_POST['login'],'mail', $bdd, 'users');
		if(isset($donnee))
			$ligne = $donnee->fetch();
		 

		// verification du mot de passe
		if( password_verify($_POST['password'], $ligne['password']) )
		{
			
			
			initialisation_user_session($ligne);
			$_SESSION['connecte'] = true;
			
			 
				echo '<script>
 					window.location.replace("?loc=home_connecte")
 					exit(); 
 					</script>';
			
			// REMARQUE:le exit() PERMET D EVITER L EFFACEMENT DE LA SESSION
			
			
					// OK
		}
		else
		{
			// mauvais mot de passe
			$_SESSION['login_ou_password_not_matching']=true;
			
		}
		 
	}
	 

}
 
 
else
	// premiere connexion a la page
$premiere_connexion= true;



 

// on inclut ici les fonctions utilisées lors des tests. 




/*
 * ### LE PRINCIPE DE FONCIONNEMENT
 * 
 * 		On lit les deux entrées,
 * 		on verifie la présence de l'adresse mail sur la base de donnée,  
 * 		si elle marche on verifie le mot de passe (hash)
 * 		si une des parties ne marche pas on recrache tout en disant: nom d'utilisateur ou mot de passe incorécte.
 */



$css =array (
	'HomeStyle.css',
		'leaf.css',
);
// si on s'est tropmpé ou alors c'est la premiere fois qu'on arrive sur la page d'avant, elle est inclue dans le corps de la head_page

if(isset($premiere_connexion) OR isset($_SESSION['login_ou_password_not_matching']))
	$section = 'include("vue/user_login_form.php");';



head_page_print(true, true, true, true, true, $css, $section);
