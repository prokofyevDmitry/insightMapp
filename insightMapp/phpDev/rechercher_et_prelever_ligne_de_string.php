<?php
include 'control/test_fichier.php';

if (isset ( $_POST ['submit'] )) 

{
	$pays = fopen('./upload/pays.txt', 'r');
	// cette array va contenir les nom de pays clean
	$lespays = array();
	// on copie
	$ligne= fgets($pays);
	$i= 0;
	$pay = array();
	while($ligne !=false)
	{
	
	$debut = strstr($ligne,'"');
// 	echo ($debut.'<br>');
	$debut = substr($debut, 1);
// 	echo ($debut.'<br>');
	$pay = explode('"', $debut);
// 	echo ($pay[0].'<br>');
	$lespays[$i] = $pay[0];
	
	$i++;
	$ligne= fgets($pays);
	}
	
	for($i=0; $i<count($lespays); $i++)
	{
	echo ($lespays[$i]. '<br>');
	}
	
	
	
	fclose($pays);

}

?>


<form class="addInfo" action="test.php" method="post"
	enctype="multipart/form-data">

	<h2 id="title2">We will be glad to learn more about you... Only if you
		want us to!</h2>
	<select name="pays" id="pays">
<?php include 'vue/listes/country_list.php'?> <!--  liste de tout les pays avec la terminaison "<select>" -->
</select>
<input  type="submit" value="GO" placeholder="GO" class="submit" name="submit"/>

	</p>
</form>
