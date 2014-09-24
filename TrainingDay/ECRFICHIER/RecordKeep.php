

<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
<style type="text/css"> input {display: block; margin: 5px;} </style>

</head>

<body>
<form action="RecordKeep.php" method="post" >
<input type ="text" placeholder="name" name="nom"/>
<input type ="text" placeholder="forename" name="forename"/>
<input type ="text" placeholder="age" name="age"/>
<input type ="text" placeholder="adress" name="adress"/>
<input type ="text" placeholder="nationality" name="nationality"/>
<input type="submit" name ="submit" value ="ok"/>

<?php 
/*foreach ($_POST as $key => $value )
{
	echo '$_POST['.$key.']='.$value.'<br>';
}*/
// bien faire la distiction du place d'écriture:
// 		Dans un fichier on utilise le "\n" pour le retour à la ligne
//		Dans le document html (echo) on utilise la balise <br>
$i=-1;
$plein = 10;
$record = fopen('../fichiers/record.txt', 'a+');
while($plein != false)
{
	$plein = fgets($record);
	$i++;
}





if( $_POST['nom']!=null AND $_POST['forename']!=null AND $_POST['age']!=null AND $_POST['adress']!=null AND $_POST['nationality']!=null)
{
 
 foreach ($_POST as $key => $value )
 if($key != 'submit')
 	fputs($record, $value . "\n");
 

 echo "Il y a ".($i+5)/5 ." inscrits";
 $set_tab = "ok";
 
}
elseif( isset($_POST['submit']))
{
	foreach ($_POST as $key => $value)
	{
		if($value == null)
		{
			switch ($key)
			{
				case 'nom': echo "<h3>Please enter a name <br></h3>";
				break;
				case 'forename': echo "<h3>Please enter a forename <br></h3>";
				break;
				case 'age' : echo "<h3>Please enter a age<br></h3>";
				break;
				case 'adress': echo "<h3>Please enter an adress<br></h3>";
				break;
				case 'nationality' : echo "<h3>Please enter a nationality<br></h3>";
 				break;
				default: break;
			}
		}
			
	}

	
	if(!(is_numeric($_POST['age'])) AND $_POST['age']!=null) echo "Your age is wrong!";
	echo "Il y a ".($i)/5 ." inscrits";
}




// on veut construire un tableau qui se recharge à chaque submit, à partir du fichier.

$text=array();
$i=0;
while($plein != false)
{
	$plein = fgets($record);
	$text[$i] = $plein;
	$i++;
}



fclose($record);

?>
<!--

	<table>
	<tr> 
	<td><h4>Nom</h4></td>
	<td><h4>Prenom</h4></td>
	<td><h4>Age</h4></td>
	<td><h4>Adresse</h4></td>
	<td><h4>Nationalité</h4></td>
	</tr>
	</table>

	-->










</form>
</body>

</html>


