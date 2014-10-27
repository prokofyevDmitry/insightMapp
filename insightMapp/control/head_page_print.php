<?php
// 	la fonction permet d'afficher l'ensemble de la page dacceuille (en la modulant)
//	l'argument $included_CSS_files est un tableau de string qui contrient le chemin absolu d'accees au fichier le CSS
//	L'argument $section_containt contient le contenue principal à afficher dans la page

// on chrnge sensiblement l'arboressence: parts va contenit tout les fichiers php qui ne rentrent pas dans les autres categories.
function head_page_print($logo,$barre_de_recherche,$map,$sidebar,$footer,$included_CSS_files,$section_containt)
{
	echo '
	<!DOCTYPE html>
	
	<html>
	
	<!--  See the db structure in /Dropbox/Project1/insightmapp_dbstructure.txt -->
	
	<head>
	<meta charset=\'utf-8\'/>
	
			';
	// inclusion de plusieurs fichiers CSS		
	// par défaut il y a 
	for($i=0; $i<count($included_CSS_files) ; $i++)
	{	
	echo '<link rel="stylesheet" href="CSStyle/'.$included_CSS_files[i].'"/>';
	}
	
	
	if($map==true) include ("parts/mapLeafInc.php"); 
	
	echo '
	</head>
	
	    
	<body>
	    <header>
';
			<?php include("parts/logo.php"); ?>
	            <?php include("parts/search.php"); ?>
	    </header>
	    <section>
	    
	      	<nav class="side">
	        <?php include("parts/sideList.php"); ?>           
	        </nav>
	        <?php include("parts/time_line.php") ;?> 
	    </section>
	
	    <footer > 
	    
	    </footer>
	 
	    <?php include ('./parts/map.php');
	    include ("parts/scriptLeaf.php") ;?>
	    
	</body>    
	
	</html>
	
	
	
	
}