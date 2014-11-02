<?php
// 	la fonction permet d'afficher l'ensemble de la page dacceuille (en la modulant)
//	l'argument $included_CSS_files est un tableau de string qui contrient le chemin absolu d'accees au fichier le CSS
//	L'argument $section_containt contient le contenue principal à afficher dans la page

// on chrnge sensiblement l'arboressence: parts va contenit tout les fichiers php qui ne rentrent pas dans les autres categories.

function head_page_print($logo,$barre_de_recherche,$map,$sidebar,$footer,$included_CSS_files,$section_containt=null)
{
	$adresse_composants = "../parts/";
	
	
	echo '
	<!DOCTYPE html>
	
	<html>
	
	<!--  See the db structure in /Dropbox/Project1/insightmapp_dbstructure.txt -->
	
	<head>
	<meta charset=\'utf-8\'/>
	
			';
	// inclusion de plusieurs fichiers CSS		
	// par défaut il y a 
	if(isset($included_CSS_files))
	{
		for($i=0; $i<count($included_CSS_files) ; $i++)
	{	
	echo '<link rel="stylesheet" href="../CSStyle/'.$included_CSS_files[$i].'"/>';
	}
	}
	
	if($map==true) include ($adresse_composants."mapLeafInc.php"); 
	
	echo '
	</head>
	
	    
	<body>
	    <header>
';
	
	
	if($logo == true)	 include($adresse_composants."logo.php"); 
	if($barre_de_recherche== true)	 include($adresse_composants."search.php"); 
	    
	    echo '</header>
	    <section>' ;
	    

if($sidebar== true ){
			include($adresse_composants."sideList.php");            
	        
	         include($adresse_composants."time_line.php") ;
} 

	// partie à remplacer pour utiliser la variable footer
echo '
	    </section>
	
	    <footer > 
	    
	    </footer>
	 ';
		
if($map==true){	     include ($adresse_composants."/map.php");
	    include ($adresse_composants."scriptLeaf.php") ;}
	    
	    
	 echo'    
	</body>    
	
	</html>
	';
	
	
	
}




// TEST DU SCRIPT (A EFFACER DANS LA VERSION FINALE);

$css[0] = 'HomeStyle.css';
$css[1] = 'hello c';


head_page_print(true, true, true, true, true, true, $css );

echo ($css[0]);

