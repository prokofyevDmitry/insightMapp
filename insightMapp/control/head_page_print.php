<?php
// 	la fonction permet d'afficher l'ensemble de la page dacceuille (en la modulant)
//	l'argument $included_CSS_files est un tableau de string qui contrient le chemin absolu d'accees au fichier le CSS
//	L'argument $section_containt contient le contenue principal à afficher dans la page

// on chrnge sensiblement l'arboressence: parts va contenit tout les fichiers php qui ne rentrent pas dans les autres categories.

function head_page_print($logo,$barre_de_recherche,$map,$sidebar,$footer,$included_CSS_files,$section_containt=null)
{
	// le path des composants à inclure (logo etc)
	$adresse_composants = "../control/";
	
	
	echo '
	<!DOCTYPE html>
	<html>
	<meta charset=\'utf-8\'/>' ;
	// inclusion de plusieurs fichiers CSS		
	if(isset($included_CSS_files))
	{
		for($i=0; $i<count($included_CSS_files) ; $i++)
	{	
	echo '<link rel="stylesheet" href="CSStyle/'.$included_CSS_files[$i].'"/>';
	}
	}
	
	if($map==true) include ($adresse_composants."mapLeafInc.php"); 
	
	echo '</head>';
			echo '
			
	<body>
	    <header>
';
	
	
	if($logo == true)	 include($adresse_composants."logo.php"); 
	if($barre_de_recherche== true)	 include($adresse_composants."search.php"); 
	    
	    echo '</header>
	    <section>' ;
	    
if($section_containt!=null)
	eval($section_containt);
	
	// partie à remplacer pour utiliser la variable footer
echo '
	    </section>';

if($sidebar== true ){
    echo '<nav class = side>';
			include($adresse_composants."sideList.php");            
	        
	         include($adresse_composants."time_line.php");
    echo '</nav>';
} 
		
		
		
		
	   
		
if($map==true){	     include ($adresse_composants."/map.php");
	    include ($adresse_composants."scriptLeaf.php") ;}
	    
	    
	 echo'    
	 		<footer>
	 		</footer>
	</body>    
	
	</html>
	';
	
	
	
}




// TEST DU SCRIPT (A EFFACER DANS LA VERSION FINALE);

// $css =array(
// 		 'HomeStyle.css',
// 		'leaf.css'
		
// );
// on essaye la technique de l'impression

// la meuilleur solution est d'imprimer notre code à mette dans une fonction dans une string, puis de l'injecter dans la string.


// $string1 = 'hi';
// $string2 = 'nop';
// $switch = 1;
//  $string = '  <p class="logo" style="left:40%"> <p>';


// // $string = "include '../test.php'";

// head_page_print(true, true, true, true, true, $css, $string );


