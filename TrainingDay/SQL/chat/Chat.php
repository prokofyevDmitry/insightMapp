<?php
session_start ();
// check de la connexion
if ($_SESSION['logOK'] == true) {
	$bdd = new PDO ( 'mysql:host=localhost;dbname=chat', 'root', '', array (
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
	) );
	if(isset($_POST['submit']) AND isset($_POST['message']))
	{
		sendMessage($bdd);
		$_POST['refresh'] = 1;
	}	
	
	
} else {
	echo '<h1> technical error please get back to login page and re-signin <h1> <br> <a href="ChatHome.php">LogIn Screen</a> ';
}

// La fonction récupere le message contenu dans une POST et le place dans la base de données

function sendMessage($bdd) {
	$req = $bdd->prepare('INSERT INTO messages (login,message) VALUE (:login, :message)');
	$req->execute(array(
		'login' => $_SESSION['login'],
			'message' =>$_POST['message'],
	));

}

function readMessage($bdd) {
	$donnes = $bdd->query('SELECT login,message FROM messages ORDER BY ID DESC');
	$i = 10;
	while ($line = $donnes->fetch() AND $i>0)
	{
		echo  '<tr> 
				<td class="login">'.$line['login'].'</td> 
				<td class="message">'.$line['message'].' </td> 
			  </tr>';
		$i--;
	}
}


?>

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8" />
<style type="text/css">
body
{


content-align:center;
}

table
{
border-radius: 4px;
}
.message
{
border-radius:4px;
padding: 5px;
background-color:rgba(102, 224, 194, 0.75);
}
.login
{
color:#E6E6E6;
border-radius: 4px;
margin: 3px;

}
</style>

</head>

<body>
<aside><?php echo $_SESSION['login']?></aside>

<table>
<?php 
if(isset($_POST['refresh']))
{
		readMessage($bdd);
}
/*TODO 
	Make the connexion personalisable. 
  Make timeable queries and reload the page if there is something new on the database
  Make a better interface :)
*/
?>


</table>

<form action="Chat.php" method="post">
<textarea name="message" ></textarea>
<input type="submit" name ="submit" value="send" />
<input type="submit" name="refresh" value="Refresh"/>
</form>
</body>

</html>

