<?php 

// les types des entrées:
/*nomchamp:alias
 * nom
 * prenom
 * mail : filter_var($mail, 'FILTER_VALIDATE_EMAIL');
 * mdp
 * repetition mdp
 * 
 */

function test_input($test, $methode,  $bdd, $chart_name)
{$result = 0;

if(strlen($test)==0)
{	$result = false;
return $result;
}

	switch($methode) // l'ordre est défini par le POST
		{
			case 'nom': $result = test_name($test); break;
			case 'pays':$result = test_name($test); break;
			case 'city':$result = test_name($test); break;
			case 'prenom':$result = test_name($test); break;
			case 'mail':break;
			
			default: echo 'ERROR 0002'; // echec de thes par la method
		}
		
		
		
			if($methode=='mail')
			{
				$result=true;
				
				
				$data=champ_query('mail', $bdd, $chart_name);
				while ($donnee = $data->fetch())
				{
					// pour la recherche d'un email dans la liste: il faut utiliser la dichotomie.
					if($donnee['mail'] == $test)
						$result=false;
				}
			}
			
	
		
		
			
return $result; 	
}



function test_name($string)
{
	if(strlen($string)==0)
		return false;
	$regex_text = "/^([\p{L}a-zA-Z]*)$/ui";  
	$string = preg_replace('.-.', '', $string);
	$string = preg_replace('. .', '', $string);
	$string = preg_replace('.\'.', '', $string);
// 	if(preg_match('#^[A-z]+$#',$string))
	if(preg_match($regex_text,$string))
		return true; // si on trouve quelque chose alors on va envoyer 0
	else return false;
}

