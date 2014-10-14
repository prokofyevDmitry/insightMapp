<?php
include 'control/test_fichier.php';
include 'control/test_menu_deroulant.php';
if (isset ( $_POST ['submit'] )) 

{
	
}

?>


<form class="addInfo" action="test.php" method="post"
	enctype="multipart/form-data">

	<h2 id="title2">We will be glad to learn more about you... Only if you
		want us to!</h2>

<label class="mail_list" for="mail_list">Do you want to recieve our NewMail?</label><input type="checkbox"  class="mail_list" value="mail_list" name="mail_list"/>
	
<input  type="submit" value="GO" placeholder="GO" class="submit" name="submit"/>

	
</form>
