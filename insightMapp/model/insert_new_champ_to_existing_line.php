<?php
function insert_new_champ_to_existing_line($bdd,$table,$champ1,$val_champ1,$cible,$valeur_cible)
{



	//  $prep = 'INSERT INTO '.$table.'('.$champ1.','.$champ2.','.$champ3.','.$champ4.','.$champ5.','.$champ6.') VALUES ( :value1, :value2, :value3, :value4, :value5, :value6) ';

// 	UPDATE jeux_video SET prix = 10, nbre_joueurs_max = 32 WHERE ID = 51
	
	
	$prep = 'UPDATE '.$table.' SET '.$champ1.' = :value1 WHERE '.$cible.' = '.$valeur_cible ;
	 
	$exec = array( 'value1'=>$val_champ1);
	
	
	 $rec = $bdd->prepare($prep);




	$rec->execute($exec);
}

