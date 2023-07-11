<?php
// include db connection.
include 'includes/conn.inc.php';

// check GET request id param
if(isset($_GET['id'])){

	$id = Mysqli_real_escape_string($conn, $_GET['id']);

	$sql = "SELECT * FROM user_reg WHERE id=$id";


	//get query results

	$result = Mysqli_query ($conn, $sql);

	//fetch result in array format
	$pizza = Mysqli_fetch_assoc($result);



	Mysqli_free_result($result);
	Mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - User Edit</title>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
</head>
<body id="user-reg">
<?php if($pizza): ?>
<!-- Menu-Nav -->
    <?php 
        require "main-menu.php";
    ?>
<!-- End of Menu-Nav -->

<!-- Container  -->
    <div class="container">
        <!-- Registration Form -->
            <form class="user-reg" action="javascript:void(0)" id="ajax-form">
                <div class="form-row">
                    <div class="form-group col-lg-12 my-lg-auto">
                        <h3 class="user-title">User Edit</h3>
                        <hr class="usr-reg">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="fname">First Name <span>*</span></label>
                        <input type="text" name="newfname" id="newfname" class="form-control" value="<?php echo htmlspecialchars($pizza['fname']); ?>">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="lname">Last Name <span>*</span></label>
                        <input type="text" name="newlname" id="newlname" class="form-control" value="<?php echo htmlspecialchars($pizza['lname']); ?>">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="email">Email <span>*</span></label>
                        <input type="text" name="newemail" id="newemail" class="form-control" value="<?php echo htmlspecialchars($pizza['email']); ?>">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="designation">Designation <span>*</span></label>
                        <select name="newdesignation" id="newdesignation" class="form-control">
                            <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['designation']); ?></option>
                            <option value="Admin">Admin</option>
                            <option value="Receptionist">Receptionist</option>
                        </select>
                    </div>
    
                </div>

                <div class="form-row">
                    
                <div class="form-group col-lg-6">
                        <label for="gender">Gender <span>*</span></label>
                        <select name="newgender" id="newgender" class="form-control">
                            <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['gender']); ?></option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                    <label for="status">Status <span>*</span></label>
                    <select name="newstatus" id="newstatus" class="form-control">
                        <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['status']); ?></option>
                        <option value="Disabled">Disabled</option>
                        <option value="Active">Active</option>
                    </select>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" name="id" class="id" readonly value="<?php echo htmlspecialchars($pizza['id']); ?>" hidden>
                    </div>
                </div> <hr class="usr-reg">

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="submit" name="btn-submit" id="btn-submit" class="btn btn-success btn-md" value="Update User">
                        <span>
                            <p class="alert alert-success" id="show_message" style="display: none; color:green;">User Updated Successfully</p>
                            <p class="alert alert-danger" id="error" style="display: none; color:red;"></p>
                        </span>
                    </div>
                </div>
            </form>
        <!-- End of Registration Form -->
    </div>
    <!-- End of Container -->
    <?php else: ?>
    <?php endif; ?>
<script type="text/javascript">
    $(document).ready(function($){
        // hide messages
        $("#error").hide();
        $("#show_message").hide();

        // on submit...
        $('#ajax-form').submit(function(e){

            e.preventDefault();


            $("#error").hide();

            //first Name required
            var newfname = $("input#newfname").val();
            if(newfname == ""){
                $("#error").fadeIn().text("First Name required.");
                $("input#newfname").focus();
                return false;
            }

             //Last Name required
             var newlname = $("input#newlname").val();
             if(newlname == ""){
                $("#error").fadeIn().text("Last Name required.");
                $("input#newlname").focus();
                return false;
            }

             //Email required
             var newemail = $("input#newemail").val();
             if(newemail == ""){
                $("#error").fadeIn().text("Email required.");
                $("input#newemail").focus();
                return false;
            }

            // Designation required
             var newdesignation = $("select#newdesignation").val();
                if(newdesignation == ""){
                    $("#error").fadeIn().text("Designation required");
                    $("select#newdesignation").focus();
                    return false;
                }

            // Gender required
            var newgender = $("select#newgender").val();
                if(newgender == ""){
                    $("#error").fadeIn().text("Gender required");
                    $("select#newgender").focus();
                    return false;
                }

            // status required
            var newstatus = $("select#newstatus").val();
                if(newstatus == ""){
                    $("#error").fadeIn().text("Status required");
                    $("select#newstatus").focus();
                    return false;
                }


            // ajax
            $.ajax({
                type:"POST",
                url: "users-update.php",
                data: $(this).serialize(), // get all form field value in serialize form
                success: function(){
                $("#show_message").fadeIn();
                $("#show_message").fadeOut(5000);
                $("#ajax-form")[0].reset();
                }

            });
        });

        return false;
        });
</script>
    <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
</body>
</html>