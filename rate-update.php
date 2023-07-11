<?php
//include database connection
  require "includes/conn.inc.php";

//Declare variables

$newroomtype = $conn->real_escape_string($_POST['newroomtype']);
$newmealplan = $conn->real_escape_string($_POST['newmealplan']);
$newlocation = $conn->real_escape_string($_POST['newlocation']);
$newtotalamount = $conn->real_escape_string($_POST['newtotalamount']);
$newstatus = $conn->real_escape_string($_POST['newstatus']);


//update query
$sql = "UPDATE rate_setup SET room_type='$_POST[newroomtype]', meal_plan='$_POST[newmealplan]', location='$_POST[newloaction]', total_amount='$_POST[newtotalamount]', status='$_POST[newstatus]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($conn,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>