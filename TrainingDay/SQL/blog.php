<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=blog','root', '', array (
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));

// structure de la base blog : 
// nom table post
// nom des champs: login titre messages time commentaires
// structure de la base de données 


?>

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="blog.css"/>
</head>

<body>
<?php 
// methode pour les commentaires: ils sont séparés: le login du message par: µ#
// la fin du message est signé par µ¤

// INCRIPTION DE COMMENTAIRE DANS LA BASE DE DONNES
if(isset($_GET['id']) AND isset($_GET['newcom']))
{
	write_new_commentaire($bdd);
	refresh_commentaires($bdd);
	
}


// si il y a pas de message ouvert, on affiche tout ce qu'il y a sur le blog
if(isset($_GET['id']) AND !isset($_GET['newcom'])) //  affichage d'un post en particulier. 
{

		refresh_commentaires($bdd);
}


if(!isset($_POST['submit']) AND !isset($_GET['id']) AND !isset($_GET['newcom'])) 
{
	refresh($bdd);
}
elseif(!isset($_GET['id']) AND !isset($_GET['newcom']) AND isset($_POST['message']) AND !isset($zoom) AND isset($_POST['titre']) AND isset($_POST['login']))
{
	sendMessage($bdd);
	refresh($bdd);
}
elseif( !isset($_GET['id']) AND !isset($_GET['newcom']))
{
	errorcheck();
}






function refresh($bdd)
{ //DATE_FORMAT(date, '%d/%m/%Y %Hh%imin%ss'
	$messages = $bdd->query('SELECT * ,DATE_FORMAT(date,  \'%d/%m/%Y à %Hh%i\') AS date_form FROM post ORDER BY date_form LIMIT 0,50 '); // on selectionnes tout les
	
	while($donnes = $messages->fetch())
	{
		echo '<nav> <a href = blog.php?id='.$donnes['ID'] .'> 
		<div class="title"> '.$donnes['titre'].' par  '.$donnes['login'] .' le '.$donnes['date_form']. '<br> </div>  
		<div class="message">' .$donnes['messages'].'</div> </a> </nav>'
		
		;
	}
	echo ' <form action="blog.php" method="post">
<input type="text" name="login" placeholder="pseudo">
<input type="text" name="titre" placeholder="Titre">
<textarea name="message" placeholder="Ecrivez votre message ici"></textarea>
<input type="submit" name ="submit" value="send" />
</form>
			';
	
}

function sendMessage($bdd)
{
	$req = $bdd->prepare('INSERT INTO post (login, titre, messages, date) VALUE (:login,:titre, :message , NOW() )');
	$_POST['login'] = strip_tags($_POST['login']);
	$_POST['titre']=strip_tags($_POST['titre']);
	$_POST['message'] = strip_tags($_POST['message']);
	$req->execute(array(
			'login' => $_POST['login'],
			'titre' => $_POST['titre'],
			'message' =>$_POST['message']
			
	));
}

function errorcheck()
{
	if(!isset($_POST['login'])) echo 'Please enter the login';
	if(!isset($_POST['titre'])) echo 'Please enter the title';
	if(!isset($_POST['message'])) echo 'Please enter the message';
}

function refresh_commentaires($bdd)
{
	$rec = $bdd->prepare('SELECT * ,DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS date_form FROM post WHERE ID=:id ORDER BY date_form DESC LIMIT 0,50');
	$rec->execute(array('id'=> $_GET['id']));
	$donnes = $rec->fetch();
	echo '<nav> <a href = blog.php?id='.$donnes['ID'] .'> 
		<div class="title"> '.$donnes['titre'].' par  '.$donnes['login'] .' le '.$donnes['date_form']. '<br> </div>  
		<div class="message">' .$donnes['messages'].'</div> </a> </nav>'
					;
	
					$rec->closeCursor();
					$rec_messages = $bdd->prepare('SELECT *, DATE_FORMAT(date, \'%d/%m/%Y  à %Hh%i\') AS date FROM commentaires WHERE post_id = :post_id ORDER BY date LIMIT 0,50');
					$id = (int)($_GET['id']);
					$rec_messages->execute(array('post_id' =>  $id));
					while($comment = $rec_messages->fetch())
					{
						echo '<nav class="comment"> <div class= "com_login"> Par '.$comment['login']. ' le '.$comment['date'] .'<br> </div>
				<div class="com"> '.$comment['commentaire'] . '</div> </nav>';
					}
	
					$rec_messages->closeCursor();
		
					include 'commentaire.php';
	
}

function write_new_commentaire($bdd)
{
	$pos_message = $bdd->prepare('INSERT INTO commentaires(login, commentaire, post_id,date ) 
VALUES ( :login, :commentaire,:post_id,NOW() )  ');
	$pos_message->execute(array( 
	'login'=>$_POST['login'],
	'commentaire' => $_POST['commentaire'],
	'post_id' => $_GET['id']
));

	
}

// Completly new way to design the internet 


?>



</body>

</html>