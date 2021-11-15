<!--Brittney Jackson, November 28 2020-->
<?php
  session_start();

  $eventError = array();
  $error = FALSE;
  $_SESSION['messages'] = $eventError;
  $eventname = $_POST['eventname'];
 
  if (empty($_POST['eventname']))
  {
      $_SESSION['messages'][0] = 'Event Name Required';
      $error = TRUE;
  }	  

  if(empty($_POST['sponsor']))
  {
      $_SESSION['messages'][1] = 'Sponsor Name Required';
      $error = TRUE;
  }
  if (trim($_POST['description']) == "")
  {
      $_SESSION['messages'][2] = 'Event Description Required';
      $error = TRUE;
  }
  if (strtotime($_POST['eventdate'])=== false){
      $_SESSION['messages'][3] = 'Must Specify Event Date';
      $error = TRUE;
  }
  if (strtotime($_POST['eventtime']) == false)
  { 
      $_SESSION['messages'][4] = 'Must Specify an Event Time';	 
      $error = TRUE;
  }
  //check if event already exists
  $database = new SQLite3('user.db');

  $query="SELECT eventname FROM events WHERE eventname='" . $eventname . "'";
  $result = $database->query($query);

  if($result->fetchArray()[0] != null)
  {
     $database->close();
     $_SESSION['messages'][5] = 'Event Already Exists. Please Choose Another Event Name.';
     require('new_event.php');
     return;
  }
  if ($error){
      header('Location: new_event.php');
  }
 else
 {
     $eventname = $_POST['eventname'];
     $sponsor = $_POST['sponsor'];
     $description = $_POST['description'];
     $eventdate = $_POST['eventdate'];
     $eventtime = $_POST['eventtime'];

     $database = new SQLite3('user.db');

     //remove apostrophe since apostrophe throws SQL error
     $eventname = str_replace("'", '', $eventname);
     $description = str_replace("'", '', $description);

     $insert = "INSERT INTO events VALUES('" . $eventname . "', '" . $sponsor . "', '" . $description . "', '" . $eventdate . "', '" . $eventtime. "')";
     
     $eventAdd = $database->exec($insert);

      //if event added to database successfully
     if($eventAdd)
     {
        $_SESSION['successMsg'] = 'Added New Event Successfully';
        header('Location: index.php');
     }
 }
?>
