





<?php 

// verification de la déffinition de SESSION, 
if($_POST['submit_signin']) $ok_session = true;
else $ok_session = false;

?>





<form action="index.php?loc=signup" method="post" class="signIn">
<input type="text" placeholder="Nom" name="nom" <?php if($ok_session)
{  if($_SESSION['$result[0]']!=false) echo'value="'.$_POST['nom'].'"';}?>/>
<input type="text" placeholder="Prenom" name="prenom" <?php  if($ok_session)
{ if($_SESSION['$result[1]']!=false) echo'value="'.$_POST['prenom'].'"';}?>/>
<input type="email" placeholder="Adresse Mail" name="mail" <?php  if($ok_session)
{if($_SESSION['$result[2]']!=false) echo'value="'.$_POST['mail'].'"';}?>/>
<input type="password" placeholder="Mot de passe" name="mdp"/>
<input type="password" placeholder="Répetez le mot de passe" name="confiramtion_mdp"/>
<input type="submit" class="submit" value="GO" name="submit_signin" />
</form>
<?php 

if($ok_session)
{
	echo '<div class="signin_warning"';
 
 	if( $_SESSION['$result[0]']==false) echo'<p >Entrez un nom valide<p>';
 	if( $_SESSION['$result[1]']==false ) echo'<p  >Entrez un prénom valide<p>';
 	if( $_SESSION['$result[2]']==false) echo'<p  >Adresse mail non valide (peut-être qu\'elle est déjà utilisé) </p>';
 	if($_SESSION['$result[2]']===2) {echo '<p> Entrez une adresse email<p>';}
 	
 	
 	switch ($_SESSION['$result[3]'])
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
 	?>
 