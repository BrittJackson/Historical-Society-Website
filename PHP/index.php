<!--Brittney Jackson, Oct 9 2020-->
<?php
$logoutLink = "logout_action.php";

//if session not started, then start
if(!isset($_SESSION) || session_id() ==''){
    session_start();
}

//display session messages
if(isset($_SESSION['successMsg'])){
   echo "<div style='border: 2px solid darkgreen; text-align:center; font-weight: bold'>";
   echo $_SESSION['successMsg'];
   echo "</div";
 }
 //if user is logged in, display logout link
 if (isset($_SESSION['loginMsg']))
 {
	 echo "<div style='border: 2px solid darkgreen; text-align:center; font-weight: bold'>";
	 echo $_SESSION['loginMsg'];
	 echo "<br>" ." <a href='$logoutLink'>Logout</a>";
	 echo "</div>";
 }
 //show user is logged out
 if(isset($_SESSION['logoutMsg']))
 { 
   echo "<div style='border: 2px solid darkgreen; text-align:center; font-weight: bold'>";
   echo $_SESSION['logoutMsg'];
   echo "</div";
 }
unset($_SESSION['successMsg']);
unset($_SESSION['loginMsg']);
unset($_SESSION['logoutMsg']);
?>

<?php include 'header.php';?>
<?php include 'menu.php';?> 

<h1 class="index">Welcome!</h1>
<img class="homepage" src="logo.png" alt="Historical Society of Eastern Virginia Logo"/>
<p class="credit">Photo by <a href="/photographer/gpinkston-46453">Greg Pinkston</a> from <a href="https://freeimages.com/">FreeImages</a>
<p class="index">At the Historical Society of Eastern Virginia, we are passionate about the preservation of our state's rich history. 
We endeavor to provide our community with resources to promote historical education and maintain 
Virginia's precious historical documents and artifacts.</p>
<?php include 'footer.php';?>

