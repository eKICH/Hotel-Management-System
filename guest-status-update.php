<?php
//include database connection
  require "includes/conn.inc.php";

//Declare variables

$newstatus = $conn->real_escape_string($_POST['newstatus']);


//update query
$sql = "UPDATE guest_reserv SET status='$_POST[newstatus]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($conn,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>