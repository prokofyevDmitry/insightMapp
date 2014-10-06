<?php

// Permet d'ajouter un élément de plusieurs champs dans une base de donnée:




function insert_new_element($bdd,$table,$nb_champs,$champ1,$val_champ1,$champ2=null,$val_champ2=null,$champ3=null,$val_champ3=null,$champ4=null,$val_champ4=null,$champ5=null,$val_champ5=null,$champ6=null,$val_champ6=null)
{

	
	
	//  $prep = 'INSERT INTO '.$table.'('.$champ1.','.$champ2.','.$champ3.','.$champ4.','.$champ5.','.$champ6.') VALUES ( :value1, :value2, :value3, :value4, :value5, :value6) ';

	switch ($nb_champs)
	{
		case 1: $prep = 'INSERT INTO '.$table.'('.$champ1.' ) VALUES(:value1)';
	 $exec = array( 'value1'=>$val_champ1);
	 break;
		
	 	case 2: $prep = 'INSERT INTO '.$table.'('.$champ1.','.$champ2.' ) VALUES(:value1, :value2)';
	 $exec = array( 'value1'=>$val_champ1,
			 'value2'=>$val_champ2
	 );
	 break;

		case 3: $prep = 'INSERT INTO '.$table.'('.$champ1.','.$champ2.','.$champ3.' ) VALUES(:value1, :value2, :value3)';
	 $exec = array( 'value1'=>$val_champ1,
			 'value2'=>$val_champ2,
			 'value3'=>$val_champ3
	 );
	 break;

	 	case 4: $prep = 'INSERT INTO '.$table.'('.$champ1.','.$champ2.','.$champ3.','.$champ4.' ) VALUES(:value1, :value2, :value3, :value4)';
	 $exec = array( 'value1'=>$val_champ1,
			 'value2'=>$val_champ2,
			 'value3'=>$val_champ3,
	 		'value4'=>$val_champ4
	 			
	 ); 
	 break;

	}



	$rec = $bdd->prepare($prep);
	 

	 
	 
	$rec->execute($exec);
}


