

<form action="blog.php?id=<?php echo $_GET['id']. '&newcom=ok'?>" method="post">
<input type="text" name="login" placeholder="pseudo">
<textarea name="commentaire" placeholder="Ecrivez votre commentaire ici"></textarea>
<input type="submit" name ="submit_comment" value="send" />
</form>
<a href="blog.php" >Revenir au blog</a>
