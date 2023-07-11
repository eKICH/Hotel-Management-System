<?php
require "includes/conn.inc.php";


$user_id = $_REQUEST['id'];
$query = "DELETE FROM user_reg WHERE id='$user_id'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: http://localhost/Hotel%20Management%20System/user-view.php");
?>
