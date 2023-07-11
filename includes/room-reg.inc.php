<?php

  if (isset($_POST['submit'])) {

    require "conn.inc.php";

    $room_no = $_POST['rnumber'];
    $room_type = $_POST['rtype'];
    $status = $_POST['status'];


    $errorEmpty = false;
    $errorRoom = false;


    if (empty($room_no) || empty($room_type)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }


    else{

       $sql = "SELECT room_no FROM room_reg WHERE room_no=?";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "<span class='form-error'>Something went wrong. SqlError!..</span>";

   }
    else {
         mysqli_stmt_bind_param($stmt, "s", $room_no);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
           echo "<span class='form-error'>Room Number Already Exists!..</span>";
           $errorRoom = true;

         }

    else {
          $sql = "INSERT INTO room_reg (room_no, room_type, status)
          VALUES (?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
        }
        else {

            mysqli_stmt_bind_param($stmt, "sss", $room_no, $room_type, $status);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>Room ".$room_no." Registered Successfully!..</span>";

              }
           }
         }
      }
    }
  else {
    echo "<span class='form-error'>There was an error!..</span>";
    exit();
  }
 ?>

 <script>

   $("#rnumber, #rtype").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";
  var errorRoom = "<?php echo $errorRoom; ?>";

  if (errorEmpty == true) {

    $("#rnumber, #rtype").addClass("input-error");

  }

  if (errorRoom == true) {

    $("#rnumber").addClass("input-error");

  }


  if (errorEmpty == false && errorRoom == false) {

    $("#rnumber, #rtype").val("");

  }

 </script>
