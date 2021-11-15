<!--Brittney Jackson, Nov 12 2020-->
<?php require ('header.php'); ?>
<?php
$filename = "events.txt";
$eventsfile = fopen($filename, "r") or die("Unable to open $filename!");
?>
<div class="menu">
<?php include 'menu.php';?>
</div>
<h1 class="events">Public Events</h1>
<table class="eventsTable">
<thead>
<tr>
<th>Event</th>
<th>Sponsor</th>
<th>Description</th>
<th class="eventDate">Date</th>
<th>Time</th>
</tr>
</thead>
<tbody>
<?php
   //add events from database to events table in ascending date and time
   $database = new SQLite3('user.db');
   $query = 'SELECT * FROM events ORDER BY eventdate ASC, eventtime ASC';
   $result = $database->query($query);

   while($events = $result->fetchArray(SQLITE3_ASSOC))
   {
      echo '<tr><td>' . $events['eventname'] . '</td><td>' . $events['sponsor'] . '</td><td>' . $events['description'] . '</td><td>' . $events['eventdate'] . '</td><td>' . $events['eventtime'] . '</td></tr>';
   }
   
   $database->close();
?>
</tbody>
</table>
<br><br>
<button class="eventbutton" onclick="window.location.href = 'new_event.php';">Add Event</button>
<p>Click <a href="meetings.php">Here</a> To View Members Only Events</p>
<hr/>
<?php require('footer.php');?>
