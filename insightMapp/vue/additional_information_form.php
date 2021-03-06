

<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" href="CSStyle/add_info.css"/>
<meta charset='utf-8'/>   
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

</head>
<body>
<section>   
    <p id=presentation>
    <img id="rounded_logo" alt="rounded insightmapp logo" src="CSStyle/pics/addform/rounded_logo.png">   <strong id="title">Écrire une présentation du site<br></strong>
        
        
  Earlier today, I was working on a project and needed to convert images in a design to greyscale in Inkscape (I’m using version 0.48 on Windows Vista. Update: this is still the case and works in Inkscape 0.48 on Windows 7), and a quick flick across the menus didn’t prove fruitful.

A deeper look yielded what I was looking for: it’s been renamed from previous versions (I think) to Desaturate, and can be found under the Filters > Colours > Desaturate option.

Greyscale and desaturate colours in Inkscape 0.48


Note that the desaturate option in Inkscape also converts objects and paths to greyscale. You can get rid of the desaturation/greyscale effect by selecting the element(s) you want to change, and selecting Filters > Remove Filters (note: this will remove all filters applied, and not just the desaturation filter!).

Inkscape should have both Desaturate and Greyscale options according to Inkscape’s effect reference guide, but as you can see from the screenshot above, there is no greyscale option! You can, of course, create your own saved effect in Inkscape for greyscale if it bothers you that much.  

        
           <strong id="insightmapp"> InsightTeam FR</strong>
    
    </p>
    
    </section>    
    
    
  <nav>
      
<h2 id="title2">We will be glad to learn more about you... <br> Only if you want us to!</h2>

      <form class="addInfo" action="index.php/?loc=home_premiere_visite" method="post" enctype="multipart/form-data">
          <p id=image_de_profile> 
Update your profile picture

    <label for="profile_pic"><img alt="undefined user picture" src="CSStyle/pics/addform/deffault-profile-pic.png"></label>
   
	<input type="file" id="realinput" name=profile_pic class="file" />
    


</p>
	
	

<!-- lors du submit, on renvoit les informations vers la page de "premiere visite", on utilisera un controleur interne pour la traiter -->
<p id=ss>
<input type="radio" name="sexe" value="homme" class="homme"/>	<label for="homme">Male</label>
<input type="radio" name="sexe" value="femme" class="homme"/>	<label for="femme">Female<br></label>
      </p>
<p class="date">Date of birth</p>
<?php include 'listes/date_form.php'?>
<br>
<p id=where>
<label  for="pays">Where are you from?</label>
<select class="list" name="pays" id="pays">
<?php include 'listes/country_list.php'?> <!--  liste de tout les pays avec la terminaison "<select>" -->
</select>

<input name="ville" placeholder="City" type="text"/>
          </p>
    <label class="mail_list" for="mail_list">Do you want to recieve our NewMail?</label>

    <input type="checkbox"  class="mail_list" value="mail_list" name="mail_list">
<textarea name="status" id="status" placeholder="Tell something about you, it's will be your 'official' presentation" /></textarea>
<input  type="submit" value="GO" placeholder="GO" id="submit" name="submit"/>



    
<?php if(isset($none_password_ou_login) )  echo '<p class="linkSignup_warning"> Please enter your login and your password </p>';?>
<?php if(isset($login_ou_password_not_matching) )  echo '<p class="linkSignup_warning"> Wrong login or password, please retry </p>';?>

</form>


</nav>

</body>


<?php
