<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<style type="text/css">
input
{
display:block;

margin :10px;
}

</style>
</head>
<?php 
if(isset($_GET['error'])) // a la reception de la reconduite de ChatCheck, affichage de l'ereure. 
{

	if($_GET['error'] == 1)
	{
		echo '<h3> Please fill login and password</h3>';
	}
	elseif ($_GET['error'] == 2)
	{
		echo '<h3> Wrond login or password, please retry</h3>';
	}
}


?>




<body>
<form action="ChatCheck.php" method="post">
<input name="login" placeholder="login" type="text"/>
<input name="password" placeholder="password" type="password"/>
<input type="submit" value="ok" name="submit"/>
</form>


<?php
/*

$bdd = new PDO('mysql:host=localhost;dbname=chat', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$login = false;


if(isset($_POST['login']) AND isset($_POST['password'])  )
{
	if($_POST['login']!=null and $_POST['password']==null )
	{	$content = $bdd->exec('SELECT user_name ,password FROM users');
	
	while ($donnee = $content->fetch())
	{
		if($_POST['login'] == $donnee['login'] AND $_POST['password'] == $donnee['password'])
			$login = true;
		
		if($login == true)
			break;
	}
	
	if($login==false)
	{include('failLogIn.php');
	include('chat/submit.php');
	}
	else
		include('chat/chat.php');
	}
	elseif($_POST['submit'] == 'ok')
	{
		echo '<p>You must fill in your login and password<p>';
		include 'chat/submit.php';
	}
	else
	{
		include 'chat/submit.php';
		
	}
		// il faut finir cette partie, affin de verifier toutes les possibilités lors de la connexion. S
}

else	
	include 'chat/submit.php';
*/
?>



</body>

<?php

?>