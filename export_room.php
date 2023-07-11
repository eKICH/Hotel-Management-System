<?php

if(isset($_POST['exportroom'])){
	// Include Db
	include "includes/conn.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Rooms_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','Room Number','Room Type', 'Status','Date Created'));
	$query ="SELECT id, room_no, room_type, status, date_created FROM room_reg ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>