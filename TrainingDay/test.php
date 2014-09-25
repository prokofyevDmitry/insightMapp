
<?php

 $bdd = new PDO('mysql:host=localhost;dbname=insightmapp', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


try
{
 
//  mise_a_jour_bdd($bdd,'users','nom','prokfoyev','prenom','dmitry','mail','dmitry.prokofyev@free.fr','password','hello');
 mise_a_jour_bdd($bdd,'users',4,'nom','prokfoyev','prenom','dmitry','mail','dmitry.prokofyev@free.fr', 'password', 'hello');
 }
  catch (Exception $e)
	{
		die('Erreur'.$e->getMessage());
		return;	
	}
 

 
 
function mise_a_jour_bdd($bdd,$table,$nb_champs,$champ1,$val_champ1,$champ2=null,$val_champ2=null,$champ3=null,$val_champ3=null,$champ4=null,$val_champ4=null,$champ5=null,$val_champ5=null,$champ6=null,$val_champ6=null)
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
		 
	 ); break;
	 
}
 
 
 
$rec = $bdd->prepare($prep);
	    

	    
	    
$rec->execute($exec);
  }


 
 
 


?>