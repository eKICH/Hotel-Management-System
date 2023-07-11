<?php

if(isset($_POST['exportreservation'])){
	// Include Db
	include "includes/conn.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Reservation_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','First Name','Last Name','email','phone', 'ID/Passport', 'Nationality', 'Nationality Type', 'gender', 'Check In', 'Check Out', 'Days', 'Room No', 'Room Type',  'Meal Plan',   'Amount/Day', 'Adults', 'Children', 'Status', 'Date Created'));
	$query ="SELECT id, fname, lname, email, phone, idno,  nationality, ntype, gender, check_in_date, check_out_date, days, room_no, room_type, meal_plan, aday, adults, children, status, date_created FROM guest_reserv ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>