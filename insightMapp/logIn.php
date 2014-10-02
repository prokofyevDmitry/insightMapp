<?php 
session_start();
include '../control/classes/Class_user.php';

include 'model/bd_connexion.php';
include 'model/champ_query.php';
include 'model/champ_search.php';
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

      	//connexion base de données:
      	$bdd=db_connexion('insightmapp', 'root', '');
      	
      	
      	if(isset($_POST['submit']) )
      	{
      		if(isset($_POST['login']) AND isset($_POST['password']))
      		{
      			foreach ($_POST as $value => $key) // eviter l'injection
      				$_POST[$value]=htmlspecialchars($key);
      		
      			// recherche de l'email dans la bbd
      			$donnee = champ_search($_POST['login'],'mail', $bdd, 'users');
      			if(isset($donnee))
      			$ligne = $donnee->fetch();
      			
      				
      				// verification du mot de passe
      			if( password_verify($_POST['password'], $ligne['password']) )
      			{
      				
      				// initaliser la classe utilisateur: 
//					local_user = new user($_POST['nom'] );
					//TODO verif la syntexe de "=new user" 
      				
      				
      				// OK
      			}
      			else 
      			{
      				//KO
      				$login_ou_password_not_matching=true;
include("vue/user_login_form.php");
      			}
      			
      			}
    	
      		
      	}
      	else 
      		// premiere connexion à la page
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