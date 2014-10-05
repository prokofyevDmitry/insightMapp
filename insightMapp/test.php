<?php
include 'control/test_fichier.php';

if (isset ( $_POST ['submit'] )) 

{
	
	
	
	if(isset($_FILES['profile']))
	test_fichier ( $_FILES ['profile'] );

}

?>


<form class="addInfo" action="test.php" method="post"
	enctype="multipart/form-data">

	<h2 id="title2">We will be glad to learn more about you... Only if you
		want us to!</h2>
	<p id=image_de_profile>
		Update your profile picture <input type="file" name="profile" /> <input
			type="submit" name="submit" />
	</p>
</form>
