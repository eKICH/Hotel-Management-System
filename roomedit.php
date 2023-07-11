<?php
// include db connection.
include 'includes/conn.inc.php';

// check GET request id param
if(isset($_GET['id'])){

	$id = Mysqli_real_escape_string($conn, $_GET['id']);

	$sql = "SELECT * FROM room_reg WHERE id=$id";


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
    <title>Hotel Management System - Room Edit</title>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
</head>
<body id="room-reg">
    <?php if($pizza): ?>
<!-- Menu-Nav -->
    <?php require "main-menu.php"; ?>
<!-- End of Menu-Nav -->

<!-- Container  -->
    <div class="container">
        <!-- Room Reg -->
            <form class="user-reg" action="javascript:void(0)" id="ajax-form">
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <h3 class="user-title">Room Edit</h3>
                        <hr class="usr-reg">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="roomnumber">Room Number</label>
                        <input type="text" name="newrnumber" id="newrnumber" class="form-control" value="<?php echo htmlspecialchars($pizza['room_no']); ?>">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="roomtype">Room Type</label>
                        <select name="newrtype" id="newrtype" class="form-control">
                        <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['room_type']); ?></option>
                            <option value="Superior Rooms">Superior Room</option>
                            <option value="Deluxe Rooms">Deluxe Room</option>
                            <option value="Executive Suites">Executive Suites</option>
                            <option value="Penthouse Suites 1 Bedroom">Penthouse Suites (1 Bedroom)</option>
                            <option value="Penthouse Suites 2 Bedroom">Penthouse Suites (2 Bedroom)</option>
                        </select>
                    </div>
                </div> 
                <div class="form-row">
                    <div class="form-group col-lg-6">
                       <label for="">Status <span>*</span></label>
                       <select name="newstatus" id="newstatus" class="form-control">
                        <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['status']); ?></option>
                            <option value="Allocated">Allocated</option>
                            <option value="Active">Active</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" name="id" class="id" readonly value="<?php echo htmlspecialchars($pizza['id']); ?>" hidden>
                    </div>
                </div> <hr class="usr-reg">
                <div class="form-row"> 
                    <div class="form-group col-lg-6">
                        <input type="submit" name="btn-submit" id="room-submit" class="btn btn-primary btn-md" value="Update Room">
                        <span>
                            <p class="alert alert-success" id="show_message" style="display: none; color:green;">Room Updated Successfully</p>
                            <p class="alert alert-danger" id="error" style="display: none; color:red;"></p>
                        </span>
                    </div>
                </div>
            </form>
        <!-- End Room Reg -->
    </div>
    <?php else: ?>
    <?php endif; ?>
<!-- End Container -->
<script type="text/javascript">
    $(document).ready(function($){
        // hide messages
        $("#error").hide();
        $("#show_message").hide();

        // on submit...
        $('#ajax-form').submit(function(e){

            e.preventDefault();


            $("#error").hide();

            //Room Number required
            var newrnumber = $("input#newrnumber").val();
            if(newrnumber == ""){
                $("#error").fadeIn().text("Room Number required.");
                $("input#newrnumber").focus();
                return false;
            }

             //Room Number required
             var newrtype = $("select#newrtype").val();
            if(newrtype == ""){
                $("#error").fadeIn().text("Room Type required.");
                $("select#newrtype").focus();
                return false;
            }

            //Status required
            var newstatus = $("select#newstatus").val();
            if(newstatus == ""){
                $("#error").fadeIn().text("Room Type required.");
                $("select#newstatus").focus();
                return false;
            }

            // ajax
            $.ajax({
                type:"POST",
                url: "room-update.php",
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