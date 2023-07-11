<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - Room Registration</title>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <script>

       $(document).ready(function(){
         $("#room-reg").submit(function(event){
           event.preventDefault();
           var rnumber = $("#rnumber").val();
           var rtype = $("#rtype").val();
           var status = $("#status").val();
           var submit = $("#room-submit").val();

           $(".form-message").load("includes/room-reg.inc.php", {
            rnumber: rnumber,
            rtype: rtype,
            status: status,
            submit: submit
           });
         });
       });
     </script>
</head>
<body id="room-reg">
<!-- Menu-Nav -->
    <?php require "main-menu.php"; ?>
<!-- End of Menu-Nav -->

<!-- Container  -->
    <div class="container">
        <!-- Room Reg -->
            <form id="room-reg" class="user-reg" action="includes/room-reg.inc.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <h3 class="user-title">Room Registration</h3>
                        <hr class="usr-reg">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="roomnumber">Room Number</label>
                        <input type="text" name="rnumber" id="rnumber" class="form-control" placeholder="Enter Room Number">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="roomtype">Room Type</label>
                        <select name="rtype" id="rtype" class="form-control">
                            <option value="" hidden>--- Please Select ---</option>
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
                        <input type="text" name="status" id="status" class="form-control" value="Active" hidden>
                    </div>
                </div> <hr class="usr-reg">
                <div class="form-row"> 
                    <div class="form-group col-lg-6">
                        <input type="submit" name="btn-submit" id="room-submit" class="btn btn-primary btn-md" value="Register">
                        <a href="http://localhost/Hotel%20Management%20System/dashboard.php" class="btn btn-danger btn-md bg-transparent text-danger m-4">Cancel</a>
                        <span class="form-message"></span>
                    </div>
                </div>
            </form>
        <!-- End Room Reg -->
    </div>
<!-- End Container -->
<script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
</body>
</html>