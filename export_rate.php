<?php

if(isset($_POST['exportrate'])){
	// Include Db
	include "includes/conn.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Rate_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','Room Type','Meal Plan',  'Location', 'Total Amount', 'Status','Date Created'));
	$query ="SELECT id, room_type, meal_plan, location,  total_amount, status, date_created FROM rate_setup ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>