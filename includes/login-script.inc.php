<?php
//Include Database Connection
include "includes/conn.inc.php";

//Start Session


$error = '';
if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = ("SELECT * FROM user_reg WHERE email='$email'");
	$data = mysqli_query($conn, $query);

	$total = mysqli_num_rows($data);

	if($total > 0){
		$row = mysqli_fetch_array($data);
		$password_hash = $row['password'];
		if(password_verify($password,$password_hash)){
      session_start();
      $_SESSION['email'] = $row['email'];
			$_SESSION['designation'] = $row['designation'];
      if($row['designation']=="Admin"){
					$_SESSION['userid']=$email;
					//$success = "Successfully Logged In";
					header("Location:http://localhost/Hotel%20Management%20System/dashboard.php");

				}else if($row['designation']=="Receptionist"){
					$_SESSION['userid']=$email;
					//$success = "Successfully Logged In";
					header("Location:http://localhost/Hotel%20Management%20System/user-dashboard.php");

				}
		}
		else{
      $error = "Wrong email or Password!";
			header("Location:http://localhost/Hotel%20Management%20System/index.php?error=".$error);
		}
	}

}

?>