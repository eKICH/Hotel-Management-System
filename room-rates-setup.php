<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - Room Rate Setup </title>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/custom.css"/>

    <script>

       $(document).ready(function(){
         $("#room-rate").submit(function(event){
           event.preventDefault();
           var roomtype = $("#roomtype").val();
           var mealplan = $("#mealplan").val();
           var location = $("#location").val();
           var totalamount = $("#totalamount").val();
           var status = $("#status").val();
           var submit = $("#rate-submit").val();

           $(".form-message").load("includes/room-rate.inc.php", {
            roomtype: roomtype,
            mealplan: mealplan,
            location: location,
            totalamount: totalamount,
            status: status,
            submit: submit
           });
         });
       });
     </script>
</head>
<body id="room-rate">
<!-- Menu-Nav -->
    <?php require "main-menu.php"; ?>
<!-- End of Menu-Nav -->

<!-- Container -->
    <div class="container">
        <!-- Room Rate Setup -->
            <form id="room-rate" class="user-reg" action="includes/room-rate.inc.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <h3 class="user-title">Room Rate Setup</h3>
                        <hr class="usr-reg">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="roomtype">Room Type <span>*</span></label>
                        <select name="roomtype" id="roomtype" class="form-control">
                        <option value="" hidden>--- Please Select ---</option>
                            <option value="Superior Rooms">Superior Room</option>
                            <option value="Deluxe Rooms">Deluxe Room</option>
                            <option value="Executive Suites">Executive Suites</option>
                            <option value="Penthouse Suites 1 Bedroom">Penthouse Suites (1 Bedroom)</option>
                            <option value="Penthouse Suites 2 Bedroom">Penthouse Suites (2 Bedroom)</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="mealplan">Meal Plan <span>*</span></label>
                        <select name="mealplan" id="mealplan" class="form-control">
                            <option value="" hidden>--- Please Select ---</option>
                            <option value="Bed and Breakfast">Bed and Breakfast (BB)</option>
                            <option value="Half Board">Half Board (HB)</option>
                            <option value="Full Board">Full Board (FB)</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    
                    <div class="form-group col-lg-6">
                        <label for="location">Nationality Type <span>*</span></label>
                        <select name="location" id="location" class="form-control">
                            <option value="">--- Please Select ---</option>
                            <option value="Residents">Resident</option>
                            <option value="Non-Resident">Non-Resident</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="totalamount">Total Amount / Day <span>*</span></label>
                        <input type="text" name="totalamount" id="totalamount" class="form-control" Placeholder="Enter Total Amount/Day">
                    </div>

                </div>

                <div class="form-row">
                   
                </div> 
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="status" id="status" class="form-control" value="Active" hidden>
                    </div>
                </div> <hr class="usr-reg">

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="submit" id="rate-submit" name="btn-submit" class="btn btn-primary btn-md" value="Set Rate">
                        <a href="http://localhost/Hotel%20Management%20System/dashboard.php" class="btn btn-danger btn-md bg-transparent text-danger m-4">Cancel</a>
                        <span class="form-message"></span>
                    </div>
                </div>
            </form>
        <!-- End Room Rate Setup -->
    </div>
<!-- End of Container -->
<script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
</body>
</html>