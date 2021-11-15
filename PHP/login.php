<!--Brittney Jackson, December 7 2020-->
<?php
 if (!isset ($_SESSION) || session_id() == ''){
   session_start();
}
?>

<?php
 //check if user has already logged in 
  if (!empty($_SESSION['loggedin']) && $_SESSION['loggedin']) 
  {
    $_SESSION['loginMsg'] = "You are already logged in";
    header('Location: index.php');
    return;
  }
  else
  { //'headers already sent error' without this statement here
    require('header.php');
    require('menu.php');
  }
?>
<?php
  //display login messages then unset 
  if ( !empty($_SESSION['loginMsg'])) {
    echo $_SESSION['loginMsg'];
    unset($_SESSION['loginMsg']);
  }
?>
<h2 class="loginform">Login</h2>
<form method ="POST" action="login_action.php">

<p>
<label for="username">Username</label>
<input type="text" name="username" id="username" class="loginInput">
</p>

<p>
<label for="password">Password</label>
<input type="text" name="password" id="password" class="loginInput">
</p>
<br>
<input type="submit" class="submitBtn">
</form>  
<p class="registerLink">Not a member yet? Register <a href="registration.php">Here</a></p>
<hr/>
<?php include 'footer.php';?>
