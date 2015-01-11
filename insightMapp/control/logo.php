  <?php 
  

if(isset($_SESSION['profile_pic_path']) and $_SESSION['profile_pic_path']!=null )
    echo '<div class="logo_conected">'; 
  else
  echo '<div class="logo">'; 
            
  
  // si on est connecté alors on affiche la photo de profile, sinon l'image de insightmapp et on cache la partie signIn
  
  
  
  
  
  
  if(isset($_SESSION['connecte']))
  {
  	
  	
  // la photo de profile est prise dans profile_pic_path, elle est soit ajoutée par resize_picture lors de l'ajout de la premier 
  // soit dans "initialisation_ser_session.php"
  	if(isset($_SESSION['profile_pic_path']) and $_SESSION['profile_pic_path']!=null )
  	echo ' <img alt="profileimage" src="'.$_SESSION['profile_pic_path'].'" id="homescreen_profile_pic" /> ';
  	else
  	echo '<img alt="inSightMapplogo" src="parts/svgImages/IMLogo.svg" class="IMlogo" />';
  
 echo ' <a href="index.php?loc=signout" class = "signin">Sign out</a>';
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