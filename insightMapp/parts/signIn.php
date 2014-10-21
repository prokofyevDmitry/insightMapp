<?php // ici nous alons reboucler sur la meme page d'aceuille dans le cas ou certains données ne sont pas bonnes

/* TODO Débuger la connexion à la base de donnée et verifier la bonne verification des mails
 * 
 * 
 */

session_start();
 $result = array(0,0,0,0);
$chart_name = 'users';
 include '../control/test_Input.php';
include '../model/bd_connexion.php';
include '../model/champ_query.php';
include '../control/test_password.php';
include '../model/insert_new_element.php';
include '../control/creat_user_foldersystem.php';
include '../model/champ_search_precise.php';


$bdd = db_connexion('insightmapp','root',''); // connexion base de données. 




if(isset( $_POST['submit_signin'] ) )
{
	

foreach ($_POST as $value =>$key) // securisation contre l'injection
{
	$_POST[$value] = htmlspecialchars($key);
}	

 $result[0]=test_input($_POST['nom'], 'nom', $bdd, $chart_name); // nettoyage des html chars
 $result[1]=test_input($_POST['prenom'], 'prenom', $bdd, $chart_name);
 $result[2]=test_input($_POST['mail'], 'mail', $bdd, $chart_name);	
 
 //mot de passe 
 
 	$result[3] = test_password();

  // egalitées de mot de passe.



 if($result[0]==true AND $result[1]==true AND $result[2]==true AND $result[3]==true) // on récupére que des 0, donc tout les éléments on était validées;
 {
 
 	
 	$hash_mdp = password_hash($_POST['mdp'],PASSWORD_BCRYPT);
 	
 	if($hash_mdp!=false) // verifie que le hash s'est bien passé. 
 	insert_new_element($bdd, 'users', 4, 'nom', $_POST['nom'], 'prenom', $_POST['prenom'], 'mail',$_POST['mail'],'password',$hash_mdp);
 	else 
 		echo 'ERROR 0003';
 	
 	
 	
 	// ON CREE LE SYSTHEME DE FICHIER DE L'UTILISATEUR
 	
 	creat_user_foldersystem(champ_search_precise($_POST['mail'],'mail','id',$bdd,'users'));
 	
 	
 
 /*
TODO:  Maintenant que nous nous sommes inscrit, il faut se loggue.
			Commencer la partie log. Utilisé les bout de code déja utilisées.
*/
 
 
 	
 
 	echo '<h2> You are logged in, Congrat :) <h2> <br> <a href="../index.php?loc=home"> Get Home </a>';
 	
  
 
 }
 else
 { 
 	
 	include '../vue/user_signin_form.php';
 	echo '<div class="signin_warning"';
 	
 	if($result[0]==false) echo'<p >Entrez un nom valide<p>';
 	if($result[1]==false ) echo'<p  >Entrez un prénom valide<p>';
 	if($result[2]==false) echo'<p  >Adresse mail non valide (peut-être qu\'elle est déjà utilisé) </p>';
 	if($result[2]===2) {echo '<p> Entrez une adresse email<p>';}
 	
 	
 	switch ($result[3])
 	{
 		// la mot de passe est trop petit 0
 		// le mot de passe est pas le meme que la confiramtion 2
 		// le mot de passe est trop long (peu probable  mais bon) 3
 		// le mot de passe n'est pas assez fort 4
 		// tout est ok true
 		case 0: echo '<p  >Votre mot de passe est trop petit: 8 charactères au minimum</p>'; break;
 		case 1: break;
 		case 2: echo'<p>Votre mots de passe et sa confirmation ne correspondent pas</p>'; break;
 		case 3: echo '<p>Votre mot de passe est trop long, 40 charactères au maximum</p>'; break;
 		case 4: echo '<p>Votre mot de passe n\'est pas assez sécurisé<p>'; break; 	
 		default:echo'<p>failed to switch</p>'; break;	
 	}
 	
 	
 	
 	
 	echo '</div>';
 }
 
}
else
{ 
include '../vue/user_signin_form.php'; 
}

?>
