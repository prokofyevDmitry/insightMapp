


<form  class="login" action="index.php?loc=signin" method="post">
<input name="login" placeholder="UserName" type="email"/>
<input name="password" placeholder="password" type="password"/>
<input  type="submit" value="GO" placeholder="GO" class="submit" name="submit"/>
<a class="linkSignup" href="index.php/?loc=signup"> <p>Sign Up</p> </a>
<a class="linkSignup2" href="index.php?loc=forgotPassword"> <p>Forgot password?</p> </a>
<?php if(isset($_SESSION['login_ou_password_not_matching']) )  echo '<p class="linkSignup_warning"> Wrong login or password, please retry </p>';?>
</form>