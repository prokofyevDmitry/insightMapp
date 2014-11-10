<?php // ici nous alons reboucler sur la meme page d'aceuille dans le cas ou certains données ne sont pas bonnes

/* TODO Débuger la connexion à la base de donnée et verifier la bonne verification des mails
 * 
 * 
 */

// l'array result permet de stocker les résultats des tests intermediaires pour els variables etc...
$result = array(0,0,0,0);
$chart_name = 'users';
$test= null; 
include $test.'control/test_Input.php';
include $test.'model/bd_connexion.php';
include $test.'model/champ_query.php';
include $test.'control/test_password.php';
include $test.'model/insert_new_element.php';
include $test.'control/creat_user_foldersystem.php';
include $test.'model/champ_search_precise.php';
include $test.'model/champ_search.php';
include $test.'control/initialisation_user_session.php';
$bdd = db_connexion('insightmapp','root',''); // connexion base de données. 


if(isset( $_POST['submit_signin'] )  )
{
foreach ($_POST as $key =>$value) // securisation contre l'injection
{
	$_POST[$key] = htmlspecialchars($value);
}	

 $_SESSION['$result[0]']=test_input($_POST['nom'], 'nom', $bdd, $chart_name); // nettoyage des html chars
 $_SESSION['$result[1]']=test_input($_POST['prenom'], 'prenom', $bdd, $chart_name);
 $_SESSION['$result[2]']=test_input($_POST['mail'], 'mail', $bdd, $chart_name);
  
 //mot de passe 
 
 $_SESSION['$result[3]']= test_password();

  // egalitées de mot de passe.



 if($_SESSION['$result[0]']==true AND $_SESSION['$result[1]']==true AND $_SESSION['$result[2]']==true AND $_SESSION['$result[3]']==true) // on récupére que des 0, donc tout les éléments on était validées;
 {
 
 	
 	$hash_mdp = password_hash($_POST['mdp'],PASSWORD_BCRYPT);
 	
 	if($hash_mdp!=false) // verifie que le hash s'est bien passé. 
 	insert_new_element($bdd, 'users', 4, 'nom', $_POST['nom'], 'prenom', $_POST['prenom'], 'mail',$_POST['mail'],'password',$hash_mdp);
 	else 
 		echo 'ERROR 0003';
 	
 	
 	
 	// ON CREE LE SYSTHEME DE FICHIER DE L'UTILISATEUR
 	$_SESSION['connecte'] = true;
 	creat_user_foldersystem(champ_search_precise($_POST['mail'],'mail','id',$bdd,'users'));
 	$donnee = champ_search($_POST['mail'],'mail', $bdd, 'users');
 	if(isset($donnee))
 	{$ligne = $donnee->fetch();
 	// initialise les données session de l'utilisateur.
 	initialisation_user_session($ligne);}
 
 /*
TODO:  Maintenant que nous nous sommes inscrit, il faut se loggue.
			Commencer la partie log. Utilisé les bout de code déja utilisées.
*/
 	
 	
 	echo '<script>
 					window.location.replace("?loc=home_premiere_visite")
 					exit();
 					</script>';
 }
 else
 { 
 	
 
 	
 	// on instance l'utilisation de head_page_print.
 	$section_contain =  'vue/user_signup_form.php';

//  $css = css_array_fill_home_page(array(1,1,0,1));
 $css = array (
 		'HomeStyle.css',
 		'leaf.css',
 		'signIn.css'
 		
 		
 );
 
 head_page_print(true, true, true, true, true, $css, $section_contain);
 
 }
 
}
else
{
	
	 
	$section_contain = "vue/user_signup_form.php";
	
	//$css = css_array_fill_home_page(array(1,1,0,1));
	$css = array (
			'HomeStyle.css',
			'leaf.css',
			'signIn.css'
 	);
	
	head_page_print(true, true, true, true, true, $css, $section_contain);
	


}


?>




