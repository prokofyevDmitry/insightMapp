<?php
// 	la fonction permet d'afficher l'ensemble de la page dacceuille (en la modulant)
//	l'argument $included_CSS_files est un tableau de string qui contrient le chemin absolu d'accees au fichier le CSS
//	L'argument $section_containt contient le contenue principal à afficher dans la page


function head_page_print($logo,$barre_de_recherche,$sidebar,$footer,$included_CSS_files,$section_containt)
{
	echo '
	<!DOCTYPE html>
	
	<html>
	
	<!--  See the db structure in /Dropbox/Project1/insightmapp_dbstructure.txt -->
	
	<head>
	<style>
	.
	
	</style>
	'
	
	// inclusion de plusieurs fichiers CSS		
	
	for($i=0; $i=)
	<link rel="stylesheet" href="CSStyle/HomeStyle.css"/>
	<meta charset='utf-8'/>
	<link rel="stylesheet" href="CSStyle/leaf.css"/>
	
	<?php include ("parts/mapLeafInc.php");?>
	</head>
	
	    
	<body>
	    <header>
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