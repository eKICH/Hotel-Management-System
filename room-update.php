<?php
//include database connection
  require "includes/conn.inc.php";

//Declare variables

$newrnumber = $conn->real_escape_string($_POST['newrnumber']);
$newrtype = $conn->real_escape_string($_POST['newrtype']);
$newstatus = $conn->real_escape_string($_POST['newstatus']);


//update query
$sql = "UPDATE room_reg SET room_no='$_POST[newrnumber]', room_type='$_POST[newrtype]',status='$_POST[newstatus]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($conn,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>