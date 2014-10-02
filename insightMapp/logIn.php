<?php 
session_start();
include 'control/classes/Class_user.php';

include 'model/bd_connexion.php';
include 'model/champ_query.php';
include 'model/champ_search.php';
include 'control/initialisation_user_session.php';


//connexion base de données:
$bdd=db_connexion('insightmapp', 'root', '');
 
 
if(isset($_POST['submit']) )
{
	if(isset($_POST['login']) AND isset($_POST['password']))
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
			//TODO verif la syntexe de "=new user"
			
			// on crée un nouveau utilisateur dans la classe
			
			initialisation_user_session($ligne);
			$_SESSION['connecte'] = true;
			
				

			/*  CETTE PARTIE EST LA CLASSE SERIALISEE, A DEVELOPPER PLUS TARD
			$serialisation_class = serialize($user);
			$_SESSION['user'] = $serialisation_class;
			*/
		
			
    		echo '<script>
					window.location.replace("index.php?loc=home_premiere_visite")
					exit(); 
					</script>';
			// REMARQUE:le exit() PERMET D EVITER L EFFACEMENT DE LA SESSION
			
			
					// OK
		}
		else
		{
			// mauvais mot de passe
			$login_ou_password_not_matching=true;
			
		}
		 
	}
	 

}
 
 
else
	// premiere connexion a la page
$premiere_connexion= true;



?>

<!DOCTYPE html>

<html>

<head>
<link rel="stylesheet" href="CSStyle/HomeStyle.css"/>
<meta charset='utf-8'/>   
<link rel="stylesheet" href="CSStyle/leaf.css"/>
 <?php include ("parts/mapLeafInc.php");

// on inclut ici les fonctions utilisées lors des tests. 




/*
 * ### LE PRINCIPE DE FONCIONNEMENT
 * 
 * 		On lit les deux entrées,
 * 		on verifie la présence de l'adresse mail sur la base de donnée,  
 * 		si elle marche on verifie le mot de passe (hash)
 * 		si une des parties ne marche pas on recrache tout en disant: nom d'utilisateur ou mot de passe incorécte.
 */

?>

</head>

    
<body>
    <header>
            <?php include("parts/logo.php"); ?>
            <?php include("parts/search.php"); ?>
    </header>
    <section>
    
      	<?php 
// si on s'est tropmpé ou alors c'est la premiere fois qu'on arrive sur la page
  if(isset($premiere_connexion) OR isset($login_ou_password_not_matching))
  	include("vue/user_login_form.php");
  	 
 
      	
      	?>
      	
      	
 

      	<nav class="side">
        <?php include("parts/sideList.php"); ?>
        </nav>
        <?php include("parts/sideFooter.php") ;?>
    </section>
      
        
  <footer > 
    
      
      
    </footer>
 
    <?php include ('./parts/map.php');
    include ("parts/scriptLeaf.php") ;?>
    
</body>    

</html>