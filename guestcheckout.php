<?php
// include db connection.
include 'includes/conn.inc.php';

// check GET request id param
if(isset($_GET['id'])){

	$id = Mysqli_real_escape_string($conn, $_GET['id']);

	$sql = "SELECT * FROM guest_reserv WHERE id=$id";


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
    <title>Hotel Management System - Guest Check Out</title>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="css/custom.css"/>
    <script>

       $(document).ready(function(){
         $("#guest-out").submit(function(event){
           event.preventDefault();
           var fname = $("#fname").val();
           var lname = $("#lname").val();
           var idno = $("#idno").val();
           var nationality = $("#nationality").val();
           var ntype = $("#ntype").val();
           var rtype = $("#rtype").val();
           var rno = $("#rno").val();
           var mealplan = $("#mealplan").val();
           var checkin = $("#checkin").val();
           var checkout = $("#checkout").val();
           var tdays= $("#tdays").val();
           var aday= $("#aday").val();
           var totalamount = $("#totalamount").val();
           var amountpaid = $("#amountpaid").val();
           var balance = $("#balance").val();
           var status = $("#status").val();
           var submit = $("#btn-submit").val();

           $(".form-message").load("includes/guest-checkout.inc.php", {
            fname: fname,
            lname: lname,
            idno: idno,
            nationality: nationality,
            ntype: ntype,
            rtype: rtype,
            rno: rno,
            mealplan: mealplan,
            checkin: checkin,
            checkout: checkout,
            tdays: tdays,
            aday: aday,
            totalamount: totalamount,
            amountpaid: amountpaid,
            balance: balance,
            status: status,
            submit: submit
           });
         });
       });
     </script>
     
</head>
<body id="guest-checkout">
<?php if($pizza): ?>
<!-- Menu-Nav -->
    <?php require "menu-guest.php"; ?>
<!-- End Menu-Nav -->

<!-- Container -->
    <div class="container">
        <!-- Guest Reservation -->
            <form id="guest-out" class="user-reg" action="includes/guest-checkout.inc.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-lg-12">
                    <h3 class="user-title">Guest Check Out</h3>
                        <hr class="usr-reg">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-3">
                        <label for="fname">First Name <span>*</span></label>
                        <input type="text" name="fname" id="fname" class="form-control" readonly value="<?php echo htmlspecialchars($pizza['fname']); ?>">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="lname">Last Name <span>*</span></label>
                        <input type="text" name="lname" id="lname" class="form-control" readonly value="<?php echo htmlspecialchars($pizza['lname']); ?>">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="id">Id/Passport <span>*</span></label>
                        <input type="text" name="idno" id="idno" class="form-control" readonly value="<?php echo htmlspecialchars($pizza['idno']); ?>">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="nationality">Nationality <span>*</span></label>
                        <input type="text" name="nationality" id="nationality" class="form-control" readonly value="<?php echo htmlspecialchars($pizza['nationality']); ?>">
                    </div>
                </div>
               
                <div class="form-row">
                    <div class="form-group col-lg-3">
                        <label for="nationality">Nationality Type <span>*</span></label>
                        <input type="text" name="ntype" id="ntype" class="form-control" readonly value="<?php echo htmlspecialchars($pizza['ntype']); ?>">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="rtype">Room Type <span>*</span></label>
                        <input type="text" name="rtype" id="rtype" class="form-control" readonly value="<?php echo htmlspecialchars($pizza['room_type']); ?>">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="rno">Room No <span>*</span></label>
                        <input type="text" name="rno" id="rno" class="form-control" readonly value="<?php echo htmlspecialchars($pizza['room_no']); ?>">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="mealplan">Meal Plan <span>*</span></label>
                        <input type="text" name="mealplan" id="mealplan" class="form-control" readonly value="<?php echo htmlspecialchars($pizza['meal_plan']); ?>">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-lg-3">
                        <label for="checkin">Check In <span>*</span></label>
                        <input type="text" name="checkin" id="checkin" class="form-control" readonly value="<?php echo htmlspecialchars($pizza['check_in_date']); ?>">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="checkout">Check Out <span>*</span></label>
                        <input type="text" name="checkout" id="checkout" class="form-control" readonly value="<?php echo htmlspecialchars($pizza['check_out_date']); ?>">
                    </div>
                    
                    <div class="form-group col-lg-2">
                        <label for="tdays">Total Days <span>*</span></label>
                        <input type="text" name="tdays" id="tdays" class="form-control" value="<?php echo htmlspecialchars($pizza['days']); ?>" readonly>
                    </div>
                    
                    <div class="form-group col-lg-2">
                        <label for="aday">Amount/Day <span>*</span></label>
                        <input type="text" name="aday" id="aday" class="form-control" value="<?php echo htmlspecialchars($pizza['aday']); ?>" readonly>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="btnmult">Calculate Total Amount <span>*</span></label>
                        <input type="button" name="btn-mult" id="btn-mult" class="btn btn-dark" value="Calculate">
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-lg-4">
                        <label for="totalamount">Total Amount <span>*</span></label>
                        <input type="text" name="totalamount" id="totalamount" class="form-control" readonly>
                    </div>

                    
                    <div class="form-group col-lg-4">
                        <label for="amountpaid">Amount Paid <span>*</span></label>
                        <input type="text" name="amountpaid" id="amountpaid" class="form-control">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="balance">Balance <span>*</span></label>
                        <input type="text" name="balance" id="balance" class="form-control" value="" readonly>
                    </div>
                </div>

                <div class="form-row">
                    
 
                    <div class="form-group col-lg-6">
                        <input type="text" name="status" id="status" class="form-control" value="Checked-Out" hidden>
                    </div>
                </div> <hr class="usr-reg">

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary btn-md" value="Check Out">
                        <a href="http://localhost/Hotel%20Management%20System/user-dashboard.php" class="btn btn-danger btn-md bg-transparent text-danger m-4">Cancel</a>
                        <span class="form-message"></span>
                    </div>
                </div>
            </form>
        <!-- End of Guest Reservation -->
    </div>
<!-- End Container -->
<?php else: ?>
<?php endif; ?>
<script src="js/checkout.js"></script>
</body>
</html>