<!--Brittney Jackson, December 7 2020-->
<?php 
  if (session_id() == '' || !isset($_SESSION))
  {
     session_start();
  }
 unset($_SESSION['username']);
 unset($_SESSION['loggedin']);

 $_SESSION['logoutMsg'] = "You are logged out";
 header('Location: index.php');
?>
