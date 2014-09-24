<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8"/>
    </head>



 <?php
             // cette partie permet d'éviter que les warnings du au isset de la fonction 'existanceVars' soit affichées/
            
            //test de chauque élément pour resortir l'erreur, l'afficher et faire en sorte que l'utilisateur ai le plus d'information possible deci
 
            //verif nom
           
           $nom=  testVar($_POST['nom'], false, true);
           $prenom= testVar($_POST['prenom'], false, true);
           $mail=  testVar($_POST['mail'], true, false);
           
            $mem[3];
           
           if($nom and $prenom and $mail)
            {
                echo '<p>Votre enregistrement est effectué <br> Pour revenir à la page de du questionaire, cliquer <a href=submit.php>ici</a></p>';
            }
            else
            {
               
                if($nom) $mem[0] =  'nom='.$_POST['nom'];
                else $mem[0]=null;
                if($prenom) $mem[1] =  '&prenom='.$_POST['prenom'];
                else $mem[1]=null;
                if($mail) $mem[2]='&mail='.$_POST['mail'];
                else $mem[2]=null;
                
                echo '<p>Il y a eu une erreure<br>Pour revenir à la page de du questionaire, cliquer <a href=../logIn.php?'.$mem[0].$mem[1].$mem[2].'&adresse='.$_POST['adresse'].'>ici</a></p>';
            }
            
            
            
            
            
            
            
            
            
            function testVar($string1, $mail,$alpha)
            {
                $result=true;
                
                if(!isset($string1)) $result=false;
                if($mail AND !mailTest($string1)) $result=false;
                if($alpha AND !ctype_alpha($string1)) $result=false;
                
                return $result;
                
            }            
            
            
            
            
            
            
            
            
            
            
            
            
            // la fonction teste l'adresse mail selon le principe suivant:
            // un mail posséde un '@' et '.', et le dernier '.' est toujours derrière le '@'
            function mailTest ( $mail)
            {   // la fonction strpos cherche dans $_POST['mail'] la premiere occurance de '@'
                 if( strrpos($mail, '@') < strrpos($mail, '.') )
                 {
                     return true;                    
                 }      
                 else
                 {
                     return false;
                 }
            }
            
            
            
            ?>

    
    
    
</html>