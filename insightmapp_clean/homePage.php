<!DOCTYPE html>

<html>

<!--  See the db structure in /Dropbox/Project1/insightmapp_dbstructure.txt -->

<head>

<link rel="stylesheet" href="CSStyle/HomeStyle.css"/>
<meta charset='utf-8'/>   
<link rel="stylesheet" href="CSStyle/leaf.css"/>

<?php include ("parts/mapLeafInc.php"); // inclusion de la carte et des paramettres la concerants?>
</head>

    
<body>
    <header>
            <?php include("parts/logo.php");  //affichage logo ?>
            <?php include("parts/search.php");// la bare de recherche ?>
    </header>
    <section>
    
      	<nav class="side">
        <?php include("parts/sideList.php"); // la liste ?>           
        </nav>
        <?php include("parts/sideFooter.php") ;?>
    </section>
      
        
  <footer > 
    
      
      
    </footer>
 
    <?php include ('./parts/map.php');
    include ("parts/scriptLeaf.php") ;?>
    
</body>    

</html>