<!--Brittney Jackson, October 16 2020-->
<?php
  session_start(); 
  
  $regError = array();
  $error = FALSE;
  $_SESSION['messages'] = $regError;
 
  if (empty($_POST['username']))
  {
          $_SESSION['messages'][0] = 'username required';
	  $error = TRUE;
	  $_SERVER['PHP_SELF'];
  }
	  
  if (! preg_match('/^[a-zA-Z0-9]{4,15}$/', $_POST["username"]))
  {
	  $_SESSION['messages'][1] = 'username must be 4-15 characters, can only contain letters and/or numbers';
	  $error = TRUE;
	//require('registration.php');
  }
  if(empty($_POST['password']))
  {
          $_SESSION['messages'][2] = 'password creation required';	 
	  $error = TRUE; 
  }
  if (! preg_match('/^[a-zA-Z0-9@#%^&*]{6,20}$/', $_POST["password"])){
	  
	  $_SESSION['messages'][3] = 'password must be 6-20 characters, can include letters, numbers, and characters
          @#%^&*';
	  $error = TRUE;
	//require('registration.php');
  }
  if(empty($_POST["fname"]) || ! preg_match('/^[a-z]*$/i', $_POST["fname"]))
  {     $_SESSION['messages'][3] = 'Please enter a valid first name';
         $error = TRUE;
  	//require('registration.php');
  }
  if (empty($_POST["lname"]) || ! preg_match('/^[a-z]*$/i', $_POST["lname"])){
	$_SESSION['messages'][4] = 'Please enter a valid last name';
	 $error = TRUE;
	//require('registration.php');
  }
  if (empty($_POST["email"]) || ! preg_match('/^.+@.+$/', $_POST["email"]))
  {               
       $_SESSION['messages'][5] = 'Please enter a valid email address';
       $error = TRUE;	
	//require('registration.php');
  }

  if (empty($_POST["zip"]) || ! is_numeric($_POST["zip"]) || strlen($_POST["zip"]) != 5)
  {
      $_SESSION['messages'][6] = 'Please enter a valid 5 digit zip code';
      $error = TRUE;	
	//require('registration.php');
  }

  if (empty($_POST["phone"]) || ! preg_match('/^[1-9]\d{2}-\d{3}-\d{4}$/', $_POST['phone']))
  {
       $_SESSION['messages'][7] = 'Please enter a valid phone number including area code';
        $error = TRUE;	
	//require('registration.php');
  }
  if (!isset ($_POST['agree']))
  {
	$_SESSION['messages'][8] = 'You must agree before continuing';
	$error = TRUE;
  }
  if ($error){
	header('Location: registration.php');
  }

  else
  {
     $username = $_POST['username'];
     $password = $_POST['password'];
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $email = $_POST['email'];
     $zip = $_POST['zip'];
     $phone = $_POST['phone'];

     $database = new SQLite3('user.db');

     $query = "SELECT username FROM users WHERE username='" . $username . "'";

     $result = $database->query($query);
     if ($result->fetchArray()[0] != null)
     {
         $database->close();
	 $_SESSION['messages'][9] = "Username taken. Please select another";
	 header('Location: registration.php');
     }
     $phash = password_hash($password, PASSWORD_DEFAULT);

     $insert = "INSERT INTO users VALUES('" . $username . "', '" . $phash . "', '" . $fname . "', '" . $lname . "', '" . $email . "', '" . $zip . "', '" . $phone . "')";
     $userAdd = $database->exec($insert);
  
      //if user added to database successfully
     if($userAdd)
     {
	     $_SESSION['successMsg'] = 'Registration Successful';
	     echo "<div style='border: 2px solid darkgreen; text-align:center; font-weight: bold'>";
	     echo"</div>";
        header('Location: index.php');
     }
     else{
         $_SESSION['messages'][10] = 'Registration Failed';
	 header('Location: registration.php');
     }
  }
 ?>
