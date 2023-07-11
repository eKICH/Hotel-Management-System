<?php
// include db connection.
include 'includes/conn.inc.php';

// check GET request id param
if(isset($_GET['id'])){

	$id = Mysqli_real_escape_string($conn, $_GET['id']);

	$sql = "SELECT * FROM rate_setup WHERE id=$id";


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
    <title>Hotel Management System - Room Rate Edit </title>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/custom.css"/>

</head>
<body id="room-rate">
<?php if($pizza): ?>
<!-- Menu-Nav -->
    <?php require "main-menu.php"; ?>
<!-- End of Menu-Nav -->

<!-- Container -->
    <div class="container">
        <!-- Room Rate Setup -->
            <form class="user-reg" action="javascript:void(0)" id="ajax-form">
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <h3 class="user-title">Room Rate Edit</h3>
                        <hr class="usr-reg">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="roomtype">Room Type <span>*</span></label>
                        <select name="newroomtype" id="newroomtype" class="form-control">
                        <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['room_type']); ?></option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="mealplan">Meal Plan <span>*</span></label>
                        <select name="newmealplan" id="newmealplan" class="form-control">
                            <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['meal_plan']); ?></option>
                            <option value="Half Board">Bed and Breakfast (BB)</option>
                            <option value="Half Board">Half Board (HB)</option>
                            <option value="Full Board">Full Board (FB)</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    
                    <div class="form-group col-lg-6">
                        <label for="location">Location <span>*</span></label>
                        <select name="newlocation" id="newlocation" class="form-control">
                            <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['location']); ?></option>
                            <option value="Residents">Resident</option>
                            <option value="Non-Resident">Non-Resident</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="totalamount">Total Amount / Day <span>*</span></label>
                        <input type="text" name="newtotalamount" id="newtotalamount" class="form-control" value="<?php echo htmlspecialchars($pizza['total_amount']); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="status">Status <span>*</span></label>
                        <select name="newstatus" id="newstatus" class="form-control">
                            <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['status']); ?></option>
                            <option value="Disabled">Disabled</option>
                            <option value="Active">Active</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" name="id" class="id" readonly value="<?php echo htmlspecialchars($pizza['id']); ?>" hidden>
                    </div>
                </div> <hr class="usr-reg">

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="submit" id="rate-submit" name="btn-submit" class="btn btn-primary btn-md" value="Update Rate">
                        <span>
                            <p class="alert alert-success" id="show_message" style="display: none; color:green;">Rate Updated Successfully</p>
                            <p class="alert alert-danger" id="error" style="display: none; color:red;"></p>
                        </span>
                    </div>
                </div>
            </form>
        <!-- End Room Rate Setup -->
    </div>
    <?php else: ?>
    <?php endif; ?>
<!-- End of Container -->

<script type="text/javascript">
    $(document).ready(function($){
        // hide messages
        $("#error").hide();
        $("#show_message").hide();

        // on submit...
        $('#ajax-form').submit(function(e){

            e.preventDefault();


            $("#error").hide();

            //Room Type required
            var newroomtype = $("select#newroomtype").val();
            if(newroomtype == ""){
                $("#error").fadeIn().text("Room Type required.");
                $("select#newroomtype").focus();
                return false;
            }

             //Meal Plan required
             var newmealplan = $("select#newmealplan").val();
             if(newmealplan == ""){
                $("#error").fadeIn().text("Meal Plan required.");
                $("select#newmealplan").focus();
                return false;
            }


            // Location required
             var newlocation = $("select#newlocation").val();
                if(newlocation == ""){
                    $("#error").fadeIn().text("Location required");
                    $("select#newlocation").focus();
                    return false;
                }

            // Total Amount required
            var newtotalamount = $("input#newtotalamount").val();
                if(newtotalamount == ""){
                    $("#error").fadeIn().text("Deposit required");
                    $("input#newtotalamount").focus();
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
                url: "rate-update.php",
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