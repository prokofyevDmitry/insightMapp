


<form  class="login" action="logIn.php" method="post">
<input name="login" placeholder="UserName" type="email"/>
<input name="password" placeholder="password" type="password"/>
<input  type="submit" value="GO" placeholder="GO" class="submit" name="submit"/>
<a class="linkSignup" href="parts/signIn.php"> <p>Sign Up</p></a>
<a class="linkSignup2" href="parts/forgotPassword.php"> <p>Forgot password?</p></a>
<?php if(isset($none_password_ou_login) )  echo '<p class="linkSignup_warning"> Please enter your login and your password </p>';?>
<?php if(isset($login_ou_password_not_matching) )  echo '<p class="linkSignup_warning"> Wrong login or password, please retry </p>';?>

 
    
    
</form>