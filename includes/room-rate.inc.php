<?php

  if (isset($_POST['submit'])) {

    require "conn.inc.php";

    $roomtype = $_POST['roomtype'];
    $mealplan = $_POST['mealplan'];
    $location = $_POST['location'];
    $totalamount = $_POST['totalamount'];
    $status = $_POST['status'];


    $errorEmpty = false;
    //$errorRate = false;


    if (empty($roomtype) || empty($mealplan) || empty($location) || empty($totalamount)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }


//     else{

//        $sql = "SELECT room_no FROM room_reg WHERE room_no=?";
//        $stmt = mysqli_stmt_init($conn);
//        if (!mysqli_stmt_prepare($stmt, $sql)) {
//          echo "<span class='form-error'>Something went wrong. SqlError!..</span>";

//    }
    // else {
    //      mysqli_stmt_bind_param($stmt, "s", $room_no);
    //      mysqli_stmt_execute($stmt);
    //      mysqli_stmt_store_result($stmt);
    //      $resultCheck = mysqli_stmt_num_rows($stmt);
    //      if ($resultCheck > 0) {
    //        echo "<span class='form-error'>Room Number Already Exists!..</span>";
    //        $errorRoom = true;

    //      }

    else {
          $sql = "INSERT INTO rate_setup (room_type, meal_plan, location, total_amount, status)
          VALUES (?,?,?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
        }
        else {

            mysqli_stmt_bind_param($stmt, "sssss", $roomtype, $mealplan, $location, $totalamount, $status);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>Rate Registered Successfully!..</span>";

              }
           }
         }

  else {
    echo "<span class='form-error'>There was an error!..</span>";
    exit();
  }
 ?>

 <script>

  $("#roomtype, #mealplan, #location, #totalamount").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";


  if (errorEmpty == true) {

    $("#roomtype, #mealplan, #location, #totalamount").addClass("input-error");

  }

//   if (errorRoom == true) {

//     $("#rnumber").addClass("input-error");

//   }


  if (errorEmpty == false) {

    $("#roomtype, #mealplan, #location, #totalamount").val("");

  }

 </script>
