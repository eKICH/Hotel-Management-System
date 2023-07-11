<?php
//include database connection
  require "includes/conn.inc.php";

//Declare variables

$newfname = $conn->real_escape_string($_POST['newfname']);
$newlname = $conn->real_escape_string($_POST['newlname']);
$newemail = $conn->real_escape_string($_POST['newemail']);
$newdesignation = $conn->real_escape_string($_POST['newdesignation']);
$newgender = $conn->real_escape_string($_POST['newgender']);
$newstatus = $conn->real_escape_string($_POST['newstatus']);


//update query
$sql = "UPDATE user_reg SET fname='$_POST[newfname]', lname='$_POST[newlname]', email='$_POST[newemail]', designation='$_POST[newdesignation]',gender='$_POST[newgender]',status='$_POST[newstatus]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($conn,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>
