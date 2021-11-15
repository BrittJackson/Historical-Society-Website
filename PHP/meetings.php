<!--Brittney Jackson, December 7 2020-->
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

<?php
  require('header.php');
  require('menu.php');
?>

<h2 class="meeting">Meetings</h2>
<br>
<h3 id="meetingInfo">Upcoming meetings are listed here.<br> These meetings are open to all HSEVA staff, board members, and those with an active membership.</h3>
<br>
<table>
<tr>
 <th>Name</th>
 <th>Date</th>
 <th>Time</th>
</tr>
<tr>
 <td>Preservation Meeting</td>
 <td>12-11-20</td>
 <td>8:30 AM</td>
</tr>
<tr>
 <td>Annual Members Meeting</td>
 <td>12-16-20</td>
 <td>9:30 AM</td>
</tr>
<tr>
 <td>Annual Members NYE Dinner</td>
 <td>12-31-20</td>
 <td>6:00 PM</td>
</tr>
</table>
<br><br><br><br>
<hr>
<?php require('footer.php');?>
