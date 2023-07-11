<?php

  if (isset($_POST['submit'])) {

    require "conn.inc.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $idno = $_POST['idno'];
    $nationality = $_POST['nationality'];
    $ntype = $_POST['ntype'];
    $rtype = $_POST['rtype'];
    $rno = $_POST['rno'];
    $mealplan = $_POST['mealplan'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $tdays = $_POST['tdays'];
    $aday = $_POST['aday'];
    $totalamount = $_POST['totalamount'];
    $amountpaid = $_POST['amountpaid'];
    $balance = $_POST['balance'];
    $status = $_POST['status'];


    $errorEmpty = false;
    $errorBalance = false;


    if (empty($fname) || empty($lname) || empty($idno) || empty($nationality) || empty($ntype) || empty($rtype) || empty($rno) || empty($mealplan) || empty($checkin) || empty($checkout) || empty($tdays) || empty($aday) || empty($totalamount) || empty($amountpaid)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }
    elseif ($balance > 0 ) {
        echo "<span class='form-error'>Balance Should be equal to Zero!..</span>";
        $errorBalance = true;
      }
    
    else {
          $sql = "INSERT INTO check_out (fname, lname, idno, nationality, ntype, rtype, rno, mealplan, checkin, checkout, tdays, aday, totalamount, amountpaid, status)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
        }
        else {
            mysqli_stmt_bind_param($stmt, "sssssssssssssss", $fname, $lname, $idno, $nationality, $ntype, $rtype, $rno, $mealplan, $checkin, $checkout, $tdays, $aday, $totalamount, $amountpaid, $status);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>Guest Checked Out Successfully!..</span>";

              }
           }
    }
  else {
    echo "<span class='form-error'>There was an error!..</span>";
    exit();
  }
 ?>

<script>

$("#fname, #lname, #idno, #nationality, #ntype, #rtype, #rno, #mealplan, #checkin, #checkout, #tdays, #aday, #totalamount, #amountpaid, #balance").removeClass("input-error");

var errorEmpty = "<?php echo $errorEmpty; ?>";
var $errorBalance = "<?php echo $errorBalance; ?>";


if (errorEmpty == true) {

 $("#fname, #lname, #idno, #nationality, #ntype, #rtype, #rno, #mealplan, #checkin, #checkout, #tdays, #aday, #totalamount, #amountpaid").addClass("input-error");

}

if ($errorBalance == true) {

 $("#balance").addClass("input-error");

}


if (errorEmpty == false && $errorBalance == false) {

 $("#fname, #lname, #idno, #nationality, #ntype, #rtype, #rno, #mealplan, #checkin, #checkout, #tdays, #aday, #totalamount, #amountpaid, #balance").val("");

}

</script>

