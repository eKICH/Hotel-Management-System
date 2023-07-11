<?php
//include database connection
  require "includes/conn.inc.php";

//Declare variables

$newfname = $conn->real_escape_string($_POST['newfname']);
$newlname = $conn->real_escape_string($_POST['newlname']);
$newrnumber = $conn->real_escape_string($_POST['newrnumber']);
$newstatus = $conn->real_escape_string($_POST['newstatus']);


//update query
$sql = "UPDATE guest_reserv SET fname='$_POST[newfname]', lname='$_POST[newlname]', room_no='$_POST[newrnumber]', status='$_POST[newstatus]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($conn,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>