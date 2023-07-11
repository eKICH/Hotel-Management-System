<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - User Registration</title>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <script>

       $(document).ready(function(){
         $("#user-reg").submit(function(event){
           event.preventDefault();
           var fname = $("#fname").val();
           var lname = $("#lname").val();
           var email = $("#email").val();
           var password = $("#password").val();
           var repassword = $("#repassword").val();
           var designation = $("#designation").val();
           var gender = $("#gender").val();
           var status = $("#status").val();
           var submit = $("#btn-submit").val();

           $(".form-message").load("includes/user-reg.inc.php", {
            fname: fname,
            lname: lname,
            email: email,
            password: password,
            repassword: repassword,
            designation: designation,
            gender: gender,
            status: status,
            submit: submit
           });
         });
       });
     </script>
</head>
<body id="user-reg">
<!-- Menu-Nav -->
    <?php 
        require "main-menu.php";
    ?>
<!-- End of Menu-Nav -->

<!-- Container  -->
    <div class="container">
        <!-- Registration Form -->
            <form id="user-reg" class="user-reg" action="includes/user-reg.inc.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-lg-12 my-lg-auto">
                        <h3 class="user-title">User Registration</h3>
                        <hr class="usr-reg">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="fname">First Name <span>*</span></label>
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="lname">Last Name <span>*</span></label>
                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="email">Email <span>*</span></label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="example@hms.com">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="password">Password <span>*</span></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="repassword">Re-Password <span>*</span></label>
                        <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Re-Enter Password">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="designation">Designation <span>*</span></label>
                        <select name="designation" id="designation" class="form-control">
                            <option value="" hidden>--- Please Select ---</option>
                            <option value="Admin">Admin</option>
                            <option value="Receptionist">Receptionist</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="gender">Gender <span>*</span></label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="" hidden>--- Please Select ---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <input type="text" name="status" id="status" class="form-control" value="Active" hidden>
                    </div>
                </div> <hr class="usr-reg">
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="submit" name="btn-submit" id="btn-submit" class="btn btn-success btn-md" value="Register">
                        <a href="http://localhost/Hotel%20Management%20System/dashboard.php" class="btn btn-danger btn-md bg-transparent text-danger m-4">Cancel</a>
                        <span class="form-message"></span>
                    </div>
                </div>
            </form>
        <!-- End of Registration Form -->
    </div>
    <!-- End of Container -->
    <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
</body>
</html>