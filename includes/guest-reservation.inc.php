<?php

  if (isset($_POST['submit'])) {

    require "conn.inc.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $idno = $_POST['idno'];
    $nationality = $_POST['nationality'];
    $ntype = $_POST['ntype'];
    $gender = $_POST['gender'];
    $datepicker = $_POST['datepicker'];
    $dateout = $_POST['dateout'];
    $days = $_POST['days'];
    $rno = $_POST['rno'];
    $rtype = $_POST['rtype'];
    $mealplan = $_POST['mealplan'];
    $aday = $_POST['aday'];
    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $status = $_POST['status'];


    $errorEmpty = false;
    $errorValidate = false;


    if (empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($idno) || empty($nationality) || empty($ntype) || empty($gender) || empty($datepicker) || empty($dateout) || empty($days) || empty($rno) || empty($rtype) || empty($mealplan) || empty($aday) || empty($adult)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Enter a valid Email Address!..</span>";
        $errorValidate = true;
    }
    
    
    
    else {
          $sql = "INSERT INTO guest_reserv (fname, lname, email, phone, idno, nationality, ntype, gender, check_in_date, check_out_date, days, room_no, room_type, meal_plan, aday, adults, children, status)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
        }
        else {
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", $fname, $lname, $email, $phone, $idno, $nationality, $ntype, $gender, $datepicker, $dateout, $days, $rno, $rtype, $mealplan, $aday, $adult, $child, $status);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>Guest Reservation Registered Successfully!..</span>";
        }
      }
 
}
  else {
    echo "<span class='form-error'>There was an error!..</span>";
    exit();
  }
 ?>

<script>

$("#fname, #lname, #email, #phone, #idno, #nationality, #ntype, #gender, #datepicker, #dateout, #days, #rno, #rtype, #mealplan, #aday, #adult, #child").removeClass("input-error");

var errorEmpty = "<?php echo $errorEmpty; ?>";
var errorValidate = "<?php echo $errorValidate; ?>";


if (errorEmpty == true) {

 $("#fname, #lname, #email, #phone, #idno, #nationality, #ntype, #gender, #datepicker, #dateout, #days, #rno, #rtype, #mealplan, #aday, #adult").addClass("input-error");

}

if (errorValidate == true) {

 $("#email").addClass("input-error");

}



if (errorEmpty == false && errorValidate == false) {

 $("#fname, #lname, #email, #phone, #idno, #nationality, #ntype, #gender, #datepicker, #dateout, #rno, #rtype, #mealplan, #aday, #adult, #child").val("");

}

</script>

