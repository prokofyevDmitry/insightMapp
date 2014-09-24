
            
            
            <div class="allSubmit">
            
            <form method="post" action="entryController.php" class="submitForm">
           
                <input type="text" name="nom" <?php if(isset($_GET['nom'])) print 'value="'.$_GET['nom'].'"';else {echo 'placeholder="Nom"';} ?> >
                <input type="text" name="prenom" <?php if(isset($_GET['prenom'])) echo 'value="'.$_GET['prenom'].'"'; else {echo 'placeholder="Prénom"';} ?> >
                <input type="text" name="mail" <?php if(isset($_GET['mail'])) echo 'value="'.$_GET['mail'].'"'; else {echo 'placeholder="Adresse électronique"'; } ?> >
      
                
                <input type="text" name="ConfirmationMail" <?php if(isset($_GET['mail'])) echo 'value="'.$_GET['ConfiramtionMail'].'"'; else echo 'placeholder="Confirmez Votre Adresse électronique"'; ?> >
                
                
                <input type="text" name="adresse" <?php if(isset($_GET['adresse'])) echo 'value="'.$_GET['adresse'].'"'; ?> >
                <input type="submit" Value="Valider">
                
            </form>
            </div>
            <?php
            
            
              // cette fonction vérifie l'existance des variables entrées en paramèrtre,
            //  si au moins l'une d'elle n'existe pas, alors elle retourne false(tous des strings)
            function existanceTest( $string1,  $string2,  $string3, $string4) 
            {
                if(isset($string1) AND isset($string2) AND isset($string3) AND isset($string4))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            
            
            // la fonction verifie que les deux strings (meme si la deuxieme n'existe pas) sont composé exclusivement de lettre
            function alphaTest( $string1, $string2)
            {
                if((ctype_alpha($string1) AND ctype_alnum($string2)) OR (  ctype_alpha($string1) AND !isset($string2)))
                {
                    return true;
                }
                else
                {
                    return false;
                }
                    
            }
            // la fonction teste l'adresse mail selon le principe suivant:
            // un mail posséde un '@' et '.', et le dernier '.' est toujours derrière le '@'
            function mailTest ( $mail)
            {   // la fonction strpos cherche dans $_GET['mail'] la premiere occurance de '@'
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
            
