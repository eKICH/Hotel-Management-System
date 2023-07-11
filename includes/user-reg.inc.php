<?php

  if (isset($_POST['submit'])) {

    require "conn.inc.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];

    $uppercase = preg_match('@[A-Z]@', $password);

    $errorEmpty = false;
    $errorMatch = false;
    $errorValidate = false;
    $errorLength = false;


    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($repassword) || empty($designation) || empty($gender)) {
      echo "<span class='form-error'>All fields are mandatory!..</span>";
      $errorEmpty = true;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Enter a valid Email Address!..</span>";
        $errorValidate = true;
      }
    elseif ($password != $repassword) {
        echo "<span class='form-error'>Password and repassword should match!..</span>";
        $errorMatch = true;
      }
    elseif (!$uppercase || strlen($password) < 6) {
        echo "<span class='form-error'>Atleast 6 characters or more and should include atleast one upper case letter!..</span>";
        $errorLength = true;
      }


    else{

       $sql = "SELECT email FROM user_reg WHERE email=?";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "<span class='form-error'>Something went wrong. SqlError!..</span>";

   }
    else {
         mysqli_stmt_bind_param($stmt, "s", $email);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
           echo "<span class='form-error'>Email Already Exists!..</span>";
           $errorEmail = true;

         }

    else {
          $sql = "INSERT INTO user_reg (fname, lname, email, password, designation, gender, status)
          VALUES (?,?,?,?,?,?,?)";
          $stmt =  mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<span class='form-error'>Something went wrong. SqlError!..</span>";
        }
        else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $email, $hashedPwd, $designation, $gender, $status);
            mysqli_stmt_execute($stmt);
            echo "<span class='form-success'>User Registered Successfully!..</span>";
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

$("#fname, #lname, #email, #password, #repassword, #designation, #gender").removeClass("input-error");

var errorEmpty = "<?php echo $errorEmpty; ?>";
var errorMatch = "<?php echo $errorMatch; ?>";
var errorLength = "<?php echo $errorLength; ?>";
var errorValidate = "<?php echo $errorValidate; ?>";


if (errorEmpty == true) {

 $("#fname, #lname, #email, #password, #repassword, #designation, #gender").addClass("input-error");

}

if (errorValidate == true) {

 $("#email").addClass("input-error");

}

if (errorMatch == true) {

 $("#password, #repassword").addClass("input-error");

}

if (errorLength == true) {

 $("#password, #repassword").addClass("input-error");

}


if (errorEmpty == false && errorValidate == false && errorMatch == false && errorLength == false) {

 $("#fname, #lname, #email, #password, #repassword, #designation, #gender").val("");

}

</script>

