<!DOCTYPE html>

<html>

<head>
<link rel="stylesheet" href="CSStyle/HomeStyle.css"/>
<meta charset='utf-8'/>   
<link rel="stylesheet" href="CSStyle/leaf.css"/>
<?php include ("parts/mapLeafInc.php");

// on inclut ici les fonctions utilisées lors des tests. 

include 'model/bd_connexion.php';
include 'model/champ_query.php';

?>

</head>

    
<body>
    <header>
            <?php include("parts/logo.php"); ?>
            <?php include("parts/search.php"); ?>
    </header>
    <section>
    
      	<form  class="login" action="parts/login_test.php" method="post">
<input name="login" placeholder="login" type="text"/>
<input name="password" placeholder="password" type="password"/>
<input type="submit" value="GO" class="submit" name="submit"/>
 <a class="linkSignup" href="parts/signIn.php"> <p>New user</p></a>
 <a class="linkSignup" href="parts/forgotPassword.php"> <p>Forgot password?</p></a>
 
</form>

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