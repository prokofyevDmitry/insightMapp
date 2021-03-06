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

// include 'control/classes/Class_user.php';

// echo ($_SESSION['hi']);



// $user = unserialize($_SESSION['user']);

	// securisation de connexion
	
	if(!isset($_SESSION['mail']) or !isset($_SESSION['connecte']) or isset($_SESSION['derniere_connexion']) )
	{

 		echo '<script>
 			window.location.replace("index.php");
 				exit(); 
		</script>';

	}
	else
	{
		
		
		
		
		if(isset($_POST['submit']))
		{
			// inclusion des controleurs et des models, pour le controle interne et pour la communication avec les bases de données
			include 'control/test_Input.php';
			include 'control/test_fichier.php';
			include 'control/test_menu_deroulant.php';
			include 'model/insert_new_champ_to_existing_line.php';
			include 'model/bd_connexion.php';
			include 'model/champ_search_precise.php';
			include 'control/resize_picture.php';
			// exclusion de la faille SSX
			$post_transmis = array (
					'profile_pic',
					'sexe',
					'jour',
					'mois',
					'annee',
					'pays',
					'ville',
					'mail_list',
					'status',
			);
			for($i=0; $i<count($post_transmis); $i++)
			{ if(isset($_POST[$post_transmis[$i]]))
				$_POST[$post_transmis[$i]] = htmlspecialchars($_POST[$post_transmis[$i]]); 
			}
			
			
			
			//test de la validité de fichier
			if(isset($_FILES['profile_pic']))
			$fichier = (test_fichier($_FILES['profile_pic'])) ? true : false;
			else
				$fichier=false;

			
			$sexe = (isset($_POST['sexe']) AND (strcmp($_POST['sexe'],'femme') or strcmp($_POST['sexe'],'homme'))) ? true: false;
			

			
			// TODO test de la date;
			// ecrire le test de la validation d'une date 
			if(isset($_POST['mois']) AND isset($_POST['jour']) AND isset($_POST['annee']))
			$date = (checkdate(intval($_POST['mois']), intval($_POST['jour']), intval($_POST['annee']))) ? true : false;
			else $date = false;
			$pays = (test_menu_deroulant($_POST['pays'],'vue/listes/country_list.php')) ? true:false;

			
			
			// verification du nom de ville: 
			$ville = (test_input($_POST['ville'], 'city', 0, 0)) ? true : false;
		
			
		if(isset($_POST['mail_list']))
		$mail_list = (strcmp($_POST['mail_list'],'mail_list')==0   ) ? true : false;
			else $mail_list = false;
			
		$status = ($_POST['status']!=null)  ? true : false;

		// récapitulons les résultats:
		// Dans chaque cas ou on a un false, on ne va rien ecrire, si il y un true, alors on va ecrire

		// on s'en branle de valider ou pas l'entrer.
		// on se connecte à la base de donnes:
		$bdd = db_connexion('insightmapp',$GLOBALS['insightmapp_user_name'],$GLOBALS['insightmapp_password'] ='');
		
		
		
		
		
		if($fichier)
		{
			
			// on sauvgarde le fichier (on verifie que l'utilisateur est toujours connecté).
			if(isset($_SESSION['user_id']))
			{	
				// creation fichier
				$upload_folder = 	'upload/'.$_SESSION['user_id'].'/photos/originals/profile_pic/'.$_FILES['profile_pic']['name'];
			
				
				if(!move_uploaded_file($_FILES['profile_pic']['tmp_name'],$upload_folder ))
				{
					// TODO AJOUTER LA GESTION D'ERREUR 
					die();
				}
			
				// on réduit la taille de l'image:
				$_SESSION['profile_pic_path'] = resize_picture($upload_folder, "homescreen");
				
				
			}
			//on ecrit son adresse dans la base de données.
			insert_new_champ_to_existing_line($bdd, 'users','profile_pic', $upload_folder,'id',$_SESSION['user_id']);
		}
		

		if($sexe)
		{// mise a jours de la base de données
			insert_new_champ_to_existing_line($bdd, 'users','sexe', $_POST['sexe'],'id',$_SESSION['user_id']);
		}
		
		if($date) // update date de naissance
		{
			insert_new_champ_to_existing_line($bdd, 'users','date_naissance', $_POST['annee'].'/'.$_POST['mois'].'/'.$_POST['jour'],'id',$_SESSION['user_id']);
		}
		
		if($pays)
		{
			insert_new_champ_to_existing_line($bdd, 'users','pays', $_POST['pays'],'id',$_SESSION['user_id']);
		}
		
		if($ville)
		{
			insert_new_champ_to_existing_line($bdd, 'users','ville', $_POST['ville'],'id',$_SESSION['user_id']);
		}
		
		if($status)
		{
			insert_new_champ_to_existing_line($bdd, 'users','status', $_POST['status'],'id',$_SESSION['user_id']);
		}
		
		if($mail_list)
		{
			insert_new_champ_to_existing_line($bdd, 'users','mail_list',$_POST['mail_list'],'id',$_SESSION['user_id']);
			
		}		
		insert_new_champ_to_existing_line($bdd, 'users', 'last_activity', date(DATE_RSS), 'id', $_SESSION['user_id']);
		$_SESSION['derniere_connexion'] = champ_search_precise($_SESSION['user_id'],'id','last_activity',$bdd,'users');
		
		
			
		
		
		//TODO changer la redirection (jquery);
		echo'<script>
 			window.location.replace("../index.php");
 				exit();
		</script>';
}

		else{	
		include 'vue/additional_information_form.php';
		}
}	

		
		

