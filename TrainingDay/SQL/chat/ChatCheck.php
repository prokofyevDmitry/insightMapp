<?php
session_start();
// Le script de verification de chargement d'une session

// LES #### indiquent les adaptations au CHAT

if( isset($_POST['password']) AND isset($_POST['login'])  AND $_POST['password']!=null AND $_POST['login'] != null)
{
	// si les deux champs existe et ont était rempli alors 
	$bdd = new PDO('mysql:host=localhost;dbname=chat','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// on se connecte a la bd 'chat'
	$donnes = $bdd->query('SELECT login, password FROM users'); //###
	// on va chercher tout les donnes sur les users (mot de passe et login )
	while ($line = $donnes->fetch())
	{ // on lit chaque line de $donnes avec fetch()
		if($_POST['password'] == $line['password'] AND $_POST['login'] == $line['login'])
		{// Si le mot de passe correspond alors on pass ok à 1 et on sort du while
			$ok = 1;
			break;
		}
	}
	if(isset($ok)) // si le $ok existe alors on se dirige vers le chat 
	{
		$_SESSION['logOK'] = true;  //###
		$_SESSION['refresh'] =false; //###
		$_SESSION['login'] = $_POST['login']; //###
		echo '<script>
window.location = \'Chat.php\';
</script> ';
	}
		else 
			error(2); // sinon on revient à la page de log avec un message d'erreur
	
	
	
}
else 
{
	error(1); // si rien n'existe on revient à la page de log avec un message d'erreur.
	
}


function error( $a)
{
	switch ($a)
	{
		case 1: // le cas 1 est que l'utilisateur n'a rien rentré dans les champs
			echo '<script>
window.location = \'ChatHome.php?error=1\';
</script> '; break;
		case 2 : // le cas est que l'utilisateur a entré un mauvais mot de passe
			echo '<script>
window.location = \'ChatHome.php?error=2\';
</script> '; break;
		default: echo '<h1>FATAL ERROR</h1>'; break;	
	}
}

?>