<!--Brittney Jackson, Oct 16 2020-->
<?php
if (!isset ($_SESSION) || session_id() == ''){
  session_start();
}
?>
<?php require('header.php');?>
<?php require('menu.php');?>
<?php
if (isset($_SESSION['messages'])){
   foreach($_SESSION['messages'] as $val)
   {
      echo $val, '<br/>';
   }
}
 unset($_SESSION['messages']);
?>

<h2 class="regForm">Membership Registration</h2>
<form method="POST" action="registration_action.php" onSubmit = "passwMatch(this)">

<p>
<label for="username">Username</label>
<input type="text" name="username" id="username" class="regInput" placeholder="4-15 characters, letters and/or numbers only" size="40">
</p>

<p>
<label for="password">Password</label>
<input type="password" name="password" id="password" class="regInput" placeholder="6-20 characters">
</p>

<p>
<label for="passconfirm">Confirm Password</label>
<input type="password" name="passconfirm" id="passconfirm" class="regInput">
</p>

<p>
<label for="fname">First Name</label>
<input type="text" name="fname" id="fname" class="regInput" placeholder="John">
</p>

<p>
<label for="lname">Last Name</label>
<input type="text" name="lname" id="lname" class="regInput" placeholder="Smith">
</p>

<p>
<label for="email">Email</label>
<input type="email" name="email" id="email" class="regInput" placeholder="jsmith@theweb.com">
</p>

<p>
<label for="zip">Zip Code</label>
<input type="text" pattern="[0-9]{5}" name="zip" id="zip" class="regInput" placeholder="23322">
</p>

<p>
<label for="phone">Phone Number</label>
<input type="text" id="phone" name="phone" class="regInput" placeholder="555-555-0000">
</p>

<p>
<input type="checkbox" id="agree" name="agree" value="Agree">
<label for="agree">By checking this box, I agree to pay the $40 annual membership dues.</label>
</p>
<p>
<input type="submit" name="register" value="Submit" class="submitBtn">
</p>
</form>

<script>
 function passwMatch(pass){
	 password = pass.password.value;
	 passwordConfirm = pass.passconfirm.value;
   if (password != passwordConfirm){
	alert("Passwords do not match. Please re-enter password.");
	return false;
   }
   else{
	return true;
   }
}

</script>
<hr/>
<?php include 'footer.php';?>
