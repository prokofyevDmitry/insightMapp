

<!DOCTYPE html>

<html>

<head>
<link rel="stylesheet" href="../CSStyle/add_info.css"/>
<meta charset='utf-8'/>   
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

<h2 id="title2">We will be glad to learn more about you... Only if you want us to!</h2>

<section>
    <p id=presentation>
  Earlier today, I was working on a project and needed to convert images in a design to greyscale in Inkscape (I’m using version 0.48 on Windows Vista. Update: this is still the case and works in Inkscape 0.48 on Windows 7), and a quick flick across the menus didn’t prove fruitful.

A deeper look yielded what I was looking for: it’s been renamed from previous versions (I think) to Desaturate, and can be found under the Filters > Colours > Desaturate option.

Greyscale and desaturate colours in Inkscape 0.48

Note that the desaturate option in Inkscape also converts objects and paths to greyscale. You can get rid of the desaturation/greyscale effect by selecting the element(s) you want to change, and selecting Filters > Remove Filters (note: this will remove all filters applied, and not just the desaturation filter!).

Inkscape should have both Desaturate and Greyscale options according to Inkscape’s effect reference guide, but as you can see from the screenshot above, there is no greyscale option! You can, of course, create your own saved effect in Inkscape for greyscale if it bothers you that much.  
    </p>
    
    </section>    
    
    
  <nav>
<form class="addInfo" action="index.php/?loc=home_premiere_visite" method="post" enctype="multipart/form-data">


<p id=image_de_profile> <
Update your profile picture

    <label for="profile_pic"><img alt="undefined user" src="../CSStyle/drawing3.png"></label>
	<input type="file" name=profile_pic />
</p>
<!-- lors du submit, on renvoit les informations vers la page de "premiere visite", on utilisera un controleur interne pour la traiter -->


<label for="sexe">Gender</label>
<input type="radio" name="sexe" value="homme" class="homme"/>	<label for="homme">Male.</label>
<input type="radio" name="sexe" value="femme" class="homme"/>	<label for="femme">Female</label>

<p class="date-label">Birthdate</p>
<?php include 'listes/date_form.php'?>



<select name="pays" id="pays">
<?php include 'vue/listes/country_list.php'?> <!--  liste de tout les pays avec la terminaison "<select>" -->
</select>

<input name="ville" placeholder="City" type="text"/>
<label class="mail_list" for="mail_list">Do you want to recieve our NewMail?</label><input type="checkbox"  class="mail_list" value="mail_list" name="mail_list">
<textarea name="status" id="status" placeholder="Tell something about you, it's will be your 'official' presentation" /></textarea>
<input  type="submit" value="GO" placeholder="GO" class="submit" name="submit"/>



    
<?php if(isset($none_password_ou_login) )  echo '<p class="linkSignup_warning"> Please enter your login and your password </p>';?>
<?php if(isset($login_ou_password_not_matching) )  echo '<p class="linkSignup_warning"> Wrong login or password, please retry </p>';?>

</form>

</nav>
<?php
