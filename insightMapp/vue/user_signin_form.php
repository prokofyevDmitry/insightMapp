

<!DOCTYPE html>


<html>
<head>
<link rel="stylesheet" href="../CSStyle/signIn.css"/>
<meta charset="utf-8"/>
</head>



<body>

<form action="signIn.php" method="post" class="signIn">
<input type="text" placeholder="Nom" name="nom" <?php //  if($result[0]!=false) echo'value="'.$_POST['nom'].'"'?>/>
<input type="text" placeholder="Prenom" name="prenom" <?php //  if($result[1]!=false) echo'value="'.$_POST['prenom'].'"';?>/>
<input type="email" placeholder="Adresse Mail" name="mail" <?php // if($result[2]!=false) echo'value="'.$_POST['mail'].'"';?>/>
<input type="password" placeholder="Mot de passe" name="mdp"/>
<input type="password" placeholder="Répetez le mot de passe" name="confiramtion_mdp"/>
<input type="submit" class="submit" value="GO" name="submit_signin" />
</form>
