

<!DOCTYPE html>

<html>

<head>
<link rel="stylesheet" href="CSStyle/add_info.css"/>
<meta charset='utf-8'/>   




<form class="addInfo" action="../index.php/?loc=home_premiere_visite&submit=true" method="post" enctype="multipart/form-data">

<h2 id="title2">We will be glad to learn more about you... Only if you want us to!</h2>
<p id=image_de_profile>
Update your profile picture

	<input type="file" name=<?php echo 'profile_pic_'.$_SESSION['user_id'] ?> />
</p>
<!-- lors du submit, on renvoit les informations vers la page de "premiere visite", on utilisera un controleur interne pour la traiter -->


<label for="sexe">Gender</label>
<input type="radio" name="sexe" value="homme" class="homme"/>	<label for="homme">Mr.</label>
<input type="radio" name="sexe" value="femme" class="homme"/>	<label for="femme">Mme.</label>

<p class="date-label">Birthdate</p>
<?php include 'vue/listes/date_form.php'?>



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


<?php
