<?php

if(isset($_GET['nom']) AND isset($_GET['prenom']) ) 
echo 'Bonjour '.$_GET['nom'].' '.$_GET['prenom'];
else
echo 'touche pas au URL';
  


?>