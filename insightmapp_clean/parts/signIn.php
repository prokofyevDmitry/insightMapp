<?php 
session_start();

include ('c')

$css[1] = "HomeStyle.css";
$css[0]= "leaf.css";
$css[2]="signIn.css";


// on incapsule la partie centrale dans la section de la structure de la page principale.
$page_content = '
				<body>
				<a href="homePage.php" class="backlink">     </a>
				<form action="login_test.php" method="post" class="signIn">
				<input type="text" placeholder="Nom" name="nom"/>
				<input type="text" placeholder="Prenom" name="prenom"/>
				<input type="email" placeholder="Adresse Mail" name="mail"/>
				<input type="password" placeholder="Mot de passe" name="mdp"/>
				<input type="password" placeholder="Répetez le mot de passe" name="confiramtion_mdp"/>
				<input type="submit" placeholder="GO" name="submit_signin" />
				</form>
				';





</body>
</html>
?>