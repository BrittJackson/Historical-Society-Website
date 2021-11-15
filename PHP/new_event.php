<!--Brittney Jackson, November 28 2020-->
<?php
//check if session already started, if not then start
if (!isset ($_SESSION) || session_id() == ''){
  session_start();
}
if (empty($_SESSION['loggedin']) || ! $_SESSION['loggedin'])
{
   $_SESSION['loginMsg'] = "Please login to continue";
   header('Location: login.php');
   exit;
}
?>
<?php require('header.php');?>
<?php require('menu.php');?>
<?php 
//if session contains messages, display them
if(isset($_SESSION['messages'])){
  foreach($_SESSION['messages'] as $val){
	  echo $val, '<br/>';
  }
 }
unset($_SESSION['messages']); 
?>
<h1 class="eventinfo">Event Information</h1>
<br>
<form method = "POST" action="new_event_action.php" onSubmit="return validDate(this)">
<label for="eventname">Event</label><br>
<input type="text" id="eventname" name="eventname" value="<?php if (isset($_POST['eventname'])) echo $_POST['eventname']; ?>"><br><br>
<label for="sponsor">Sponsor</label><br>
<input type="text" id="sponsor" name="sponsor" value="<?php if (isset($_POST['sponsor'])) echo $_POST['sponsor']; ?>"><br><br>
<label for="description">Description</label><br>
<textarea id="description" name="description" rows="4" cols="15"> </textarea>
<br><br>
<label for="eventdate">Date</label><br>
<input type="date" id="eventdate" name="eventdate" value="<?php if (isset($_POST['eventdate'])) echo $_POST['eventdate']; ?>"><br><br>
<label for="eventtime">Time</label><br>
<input type="time" id="eventtime" name="eventtime" min="08:00" max="21:00" value="<?php if (isset($_POST['eventtime'])) echo $_POST['eventtime']; ?>">
<br><br>
<input type="submit" value="Submit" class="submitBtn">
</form>
<br>
<hr>
<script>

//determine if user chose date prior to current date
 function validDate(eventdate){
  var currentDate = new Date();
  var inputDate = document.getElementById("eventdate").value;

  inputDate = new Date(inputDate);

  //if input date less than today's date, show invalid
  if(inputDate < currentDate){
      alert("Cannot choose date prior to current date");
      return false; 
  }
  else if (inputeDate == NULL)
  {
      alert("No date selected.");
      return false;
  }
  else{
      return true;
  }
}
</script>
<?php require ('footer.php');?>
