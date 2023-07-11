<?php

if(isset($_POST['exportuser'])){
	// Include Db
	include "includes/conn.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=User_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','First Name','Last Name', 'Email', 'Designation', 'Gender', 'Status','Date Created'));
	$query ="SELECT id, fname, lname, email, designation, gender, status, date_created FROM user_reg ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>