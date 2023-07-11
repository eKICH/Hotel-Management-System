<?php

if(isset($_POST['exportcheckout'])){
	// Include Db
	include "includes/conn.inc.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Checkout_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','First Name','Last Name', 'ID/Passport', 'Nationality', 'Nationality Type', 'Room Type', 'Room No', 'Meal Plan', 'Check In', 'Check Out', 'Days', 'Amount', 'Total Amount', 'Amount Paid', 'Status', 'Date Created'));
	$query ="SELECT id, fname, lname, idno,  nationality, ntype, rtype, rno, mealplan, checkin, checkout, tdays, aday, totalamount, amountpaid, status, date_created FROM check_out ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>