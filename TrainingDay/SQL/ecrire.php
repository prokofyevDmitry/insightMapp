
<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exeception $e)
{
	die('Erreur: '.$e->getMessage()); // Systeme de débogage.
}

$bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) 
		VALUES ("Batlefiel" , "Dmitry", "PS3", 70, 24, "Le meilleur jeu de combat")');
//Exemple d'écriture dans la base de données. 
// Sans préciser le ID car il est encrementé par déffaut
// il faut en préciser l'origine

echo "Ligne ajoutée";

/*
 * mise a jour de la base de donner:
 */
$bdd->exec('UPDATE jeux_video SET prix=10 , nbre_joueurs_max=32 WHERE ID=52');

/*
 * requette préparée:
 * $req = $bdd->prepare('UPDATE jeux_video SET prix =:nvprix, nbre_joueurs_max=:nv_nb_joueurs WHERE nom = :nom_jeu');
 * $req = execute(array(
 * 'nvprix' = $nvprix,
 * 'nv_nb_joueurs = $nvjoueurs,
 * 'nom_jeu' = $nom_jeu
 * ));
 */
$bdd->exec('DELETE FROM jeux_video WHERE ID > 50');

?>