<!--Brittney Jackson, December 7 2020-->
<?php
  session_start();

if (empty($_POST['username']) || empty($_POST['password']))
{
   $_SESSION['loginMsg'] = "Enter username and password to continue";
   header('Location: login.php');
}
$username = $_POST['username'];
$password = $_POST['password'];
$database = new SQLite3('user.db');

$query = "SELECT username, password FROM users WHERE username='" . $_POST['username'] . "'";
$findUser = $database->query($query);

if($findUser)
{
    $row = $findUser->fetchArray(SQLITE3_ASSOC);
    if ($row['username'] != $username)
    {
       $_SESSION['loginMsg'] = "Username not found. Please register to continue.";
       $database->close();
       header('Location: registration.php');
    }
    $phash = $row['password'];

    $valid = password_verify($password, $phash);
    if ($valid)
    {
        $_SESSION['username'] = $username;
	$_SESSION['loggedin'] = TRUE;
	$_SESSION['loginMsg'] = $_SESSION['username'] . " is logged in";
	$database->close();
	//forward user to homepage
        header('Location: index.php');
    }
    else
    {
        unset($_SESSION['username']);
	unset($_SESSION['loggedin']);
	$_SESSION['loginMsg'] = "Username and/or password entered is invalid. Please try again.";
	//send back to login page
	header('Location: login.php');
    }
}
else
{
  $_SESSION['loginMsg'] = "Please register to continue.";
  //forward user to registration page
  header('Location: registration.php');
}
?>
<?php require('footer.php'); ?>
