<!DOCTYPE html>

<html>

<!--  See the db structure in /Dropbox/Project1/insightmapp_dbstructure.txt -->

<head>
<style>
.

</style>
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
        <?php include("parts/sideFooter.php") ;?>
    </section>
      
        
  <footer > 
    
      
      
    </footer>
 
    <?php include ('./parts/map.php');
    include ("parts/scriptLeaf.php") ;?>
    
</body>    

</html>