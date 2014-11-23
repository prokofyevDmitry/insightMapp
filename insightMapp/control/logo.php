  <?php 
  
  
  echo '<div class="logo">'; 
            
  
  // si on est connecté alors on affiche la photo de profile, sinon l'image de insightmapp et on cache la partie signIn
  
  
  
  
  
  
  if(isset($_SESSION['connecte']))
  {
  	// l'adresse de la photo
  	$photo_path = 'upload/'.$_SESSION['user_id'].'/photos/profile_pic/';
  	// il y a toujours qu'une seule photo dans le fichier donc son nom dans une seule variable
  	$nom_photo_profile = scandir($photo_path);
  	// on doit vérifier que la photo choisie est bien un jpg ou un png, on utilise les refex:
  	
  	
  	
  	
  	
  	
  	
  	//var_dump($fichier_photo_profile,$nom_photo_profile); die();
  	
  	
  	echo '  <img alt="inSightMapplogo" src="'.$photo_path.$nom_photo_profile[2].'" class="IMlogo" /> ';
  }
	else
	{
  	echo '<img alt="inSightMapplogo" src="parts/svgImages/IMLogo.svg" class="IMlogo" />
  	<a href="index.php?loc=signin" class = "signin">Sign in</a>';
	}
	// l'option upload est toujours présente.
    echo '<a href="control/upload.php" class="Upload">Upload</a>
        </div>';
        ?>            