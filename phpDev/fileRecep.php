<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
    <?php
    $ok = true;
    $noType=false; $noVar=false; $noSize=false;
    if(!isset($_FILES['monImage']) and $_FILES['monImage']['error']=0) {$ok=false; $noVar=true; }
    else
    { 
switch ($_FILES['monImage']['type'])
{
    case 'image/gif':
        break;
    case 'image/jpg':
        break;
     case 'image/jpeg':
        break;
    case 'image/png':
        break;
    
    default :
        $ok=false;
        $noType=true ;
        break;

}
    if($_FILES['monImage']['size'] > 1000000 ) {$ok = false; $noSize=true;}
    
        
}

if($ok == true)
{
    echo '<p> Fichier Validé </p>';
    $path = '/opt/lampp/htdocs/tests/upload/' . basename($_FILES['monImage']['name']);
    move_uploaded_file($_FILES['monImage']['tmp_name'], '/opt/lampp/htdocs/tests/upload/' . basename($_FILES['monImage']['name']));
   echo '<img alt="photo Uploadé" href="'.$path.'"/>';
}
else
{
    echo '<p> Le fichier est <strong>NON VALIDE</strong> </p>';
   }
   
   
           

    
    

        ?>
        
        <a href="fileEmit.php" > Revenir </a>
    </body>
</html>
