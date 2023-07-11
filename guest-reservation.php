<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - Guest Reservation</title>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/custom.css"/>
    <script>

       $(document).ready(function(){
         $("#guest-reg").submit(function(event){
           event.preventDefault();
           var fname = $("#fname").val();
           var lname = $("#lname").val();
           var email = $("#email").val();
           var phone = $("#phone").val();
           var idno = $("#idno").val();
           var nationality = $("#nationality").val();
           var ntype = $("#ntype").val();
           var gender = $("#gender").val();
           var datepicker = $("#datepicker").val();
           var dateout = $("#dateout").val();
           var days = $("#days").val();
           var rno = $("#rno").val();
           var rtype = $("#rtype").val();
           var mealplan = $("#mealplan").val();
           var aday = $("#aday").val();
           var adult= $("#adult").val();
           var child = $("#child").val();
           var status = $("#status").val();
           var submit = $("#btn-submit").val();

           $(".form-message").load("includes/guest-reservation.inc.php", {
            fname: fname,
            lname: lname,
            email: email,
            phone: phone,
            idno: idno,
            nationality: nationality,
            ntype: ntype,
            gender: gender,
            datepicker: datepicker,
            dateout: dateout,
            days: days,
            rno: rno,
            rtype: rtype,
            mealplan: mealplan,
            aday: aday,
            adult: adult,
            child: child,
            status: status,
            submit: submit
           });
         });
       });
     </script>
</head>
<body id="guest-reserv">
<!-- Menu-Nav -->
    <?php require "menu-guest.php"; ?>
<!-- End Menu-Nav -->

<!-- Container -->
    <div class="container">
        <!-- Guest Reservation -->
            <form id="guest-reg" class="user-reg" action="includes/guest-reservation.inc.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-lg-12">
                    <h3 class="user-title">Guest Reservation</h3>
                        <hr class="usr-reg">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <label for="fname">First Name <span>*</span></label>
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="lname">Last Name <span>*</span></label>
                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="email">Email <span>*</span></label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="example@hms.com">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-3">
                        <label for="phone">Phone <span>*</span></label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="idno">ID Number / Passport <span>*</span></label>
                        <input type="text" name="idno" id="idno" class="form-control" placeholder="Enter ID Number">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="nationality">Nationality <span>*</span></label>
                        <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter Nationality">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="nationality">Nationality Type <span>*</span></label>
                        <select name="ntype" id="ntype" class="form-control">
                            <option value="" hidden>--- Please Select ---</option>
                            <option value="Resident">Resident</option>
                            <option value="Non-Resident">Non-Resident</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <label for="gender">Gender <span>*</span></label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">--- Please Select ---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="checkin">Check In Date <span>*</span></label>
                        <input type="text" id="datepicker" name="date" class="form-control" placeholder="Check-In-Date" autocomplete="off">
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap4'
                            });
                        </script>
                    </div>
                    
                    <div class="form-group col-lg-3">
                        <label for="checkout">Check Out Date <span>*</span></label>
                        <input type="text" id="dateout" name="date" class="form-control" placeholder="Check-Out-Date" autocomplete="off">
                        <script>
                            $('#dateout').datepicker({
                                uiLibrary: 'bootstrap4'
                            });
                        </script>
                    </div>
                    
                    <div class="form-group col-lg-2">
                        <label for="days">Days <span>*</span></label>
                        <input type="text" name="totalDays" id="days" class="form-control" readonly>
                    </div>
                   
                </div>
                <!-- <label for=""><?php echo $output; ?></label> -->
                <div class="form-row">
                    
                    <div class="form-group col-lg-3">
                        <label for="roomno">Room Number <span>*</span></label>
                        <select name="rno" id="rno" class="form-control">
                        <?php

                                include "includes/conn.inc.php";

                                $sql = "SELECT room_no FROM room_reg WHERE room_type='Superior Rooms' AND status='Active'";

                                $result = mysqli_query($conn, $sql);

                                $options = "";
                               

                                while($row = mysqli_fetch_array($result))
                                {
                                    
                                    $options .='<option>'.$row["room_no"].'</option>';
                                }

                            ?>
                            <option value="" hidden>--- Please Select ---</option>
                            <optgroup label="Superior Rooms">
                                <?php echo $options;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $sql = "SELECT room_no FROM room_reg WHERE room_type='Deluxe Rooms' AND status='Active'";

                                $result = mysqli_query($conn, $sql);

                                $options = "";
                               

                                while($row = mysqli_fetch_array($result))
                                {
                                    
                                    $options .='<option>'.$row["room_no"].'</option>';
                                }

                            ?>
                            <optgroup label="Deluxe Rooms">
                                <?php echo $options;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $sql = "SELECT room_no FROM room_reg WHERE room_type='Executive Suites' AND status='Active'";

                                $result = mysqli_query($conn, $sql);

                                $options = "";
                               

                                while($row = mysqli_fetch_array($result))
                                {
                                    
                                    $options .='<option>'.$row["room_no"].'</option>';
                                }

                            ?>
                            <optgroup label="Executive Suites">
                                <?php echo $options;?>  
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $sql = "SELECT room_no FROM room_reg WHERE room_type='Penthouse Suites 1 Bedroom' AND status='Active'";

                                $result = mysqli_query($conn, $sql);

                                $options = "";
                               

                                while($row = mysqli_fetch_array($result))
                                {
                                    
                                    $options .='<option>'.$row["room_no"].'</option>';
                                }

                            ?>
                            <optgroup label="Penthouse Suites 1 Bedroom">
                                <?php echo $options;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $sql = "SELECT room_no FROM room_reg WHERE room_type='Penthouse Suites 2 Bedroom' AND status='Active'";

                                $result = mysqli_query($conn, $sql);

                                $options = "";
                               

                                while($row = mysqli_fetch_array($result))
                                {
                                    
                                    $options .='<option>'.$row["room_no"].'</option>';
                                }

                            ?>
                            <optgroup label="Penthouse Suites 2 Bedroom">
                                <?php echo $options;?>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="roomtype">Room Type <span>*</span></label>
                        <select name="rtype" id="rtype" class="form-control">
                            <option value="">--- Please Select ---</option>
                            <option value="Superior Rooms">Superior Room</option>
                            <option value="Deluxe Rooms">Deluxe Room</option>
                            <option value="Executive Suites">Executive Suites</option>
                            <option value="Penthouse Suites">Penthouse Suites (1 Bedroom)</option>
                            <option value="Penthouse Suites">Penthouse Suites (2 Bedroom)</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="mealplan">Meal Plan <span>*</span></label>
                        <select name="mealplan" id="mealplan" class="form-control">
                            <option value="">--- Please Select ---</option>
                            <option value="Bed and Breakfast">Bed and Breakfast (BB)</option>
                            <option value="Half Board">Half Board (HB)</option>
                            <option value="Full Board">Full Board (FB)</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="aday">Amount Per Day <span>*</span></label>
                        <select name="aday" id="aday" class="form-control">
                            <?php

                                include "includes/conn.inc.php";

                                $sql = "SELECT total_amount FROM rate_setup WHERE room_type='Superior Rooms' AND location='Residents'";

                                $result = mysqli_query($conn, $sql);

                                $options = "";
                               

                                while($row = mysqli_fetch_array($result))
                                {
                                    
                                    $options .='<option>'.$row["total_amount"].'</option>';
                                }

                            ?>
                            <option value="" hidden>--- Select Amount ---</option>
                            <optgroup label="Superior Rooms Residents (BB, HB, FB)">
                            <?php echo $options;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $more = "SELECT total_amount FROM rate_setup WHERE room_type='Superior Rooms' AND location='Non-Resident'";

                                $resultmore = mysqli_query($conn, $more);

                                $optionsmore = "";


                                while($row = mysqli_fetch_array($resultmore))
                                {
                                    
                                    $optionsmore .='<option>'.$row["total_amount"].'</option>';
                                }

                            ?>
                            <optgroup label="Superior Rooms Non-Residents (BB, HB, FB)">
                            <?php echo $optionsmore;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $okay = "SELECT total_amount FROM rate_setup WHERE room_type='Deluxe Rooms' AND location='Residents'";

                                $resultokay = mysqli_query($conn, $okay);

                                $optionsokay = "";


                                while($row = mysqli_fetch_array($resultokay))
                                {
                                    
                                    $optionsokay .='<option>'.$row["total_amount"].'</option>';
                                }

                            ?>
                            <optgroup label="Deluxe Rooms Residents (BB, HB, FB)">
                            <?php echo $optionsokay;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $well = "SELECT total_amount FROM rate_setup WHERE room_type='Deluxe Rooms' AND location='Non-Resident'";

                                $resultwell = mysqli_query($conn, $well);

                                $optionswell = "";


                                while($row = mysqli_fetch_array($resultwell))
                                {
                                    
                                    $optionswell .='<option>'.$row["total_amount"].'</option>';
                                }

                            ?>
                            <optgroup label="Deluxe Rooms Non-Residents (BB, HB, FB)">
                            <?php echo $optionswell;?>
                            </optgroup>

                             <?php

                                include "includes/conn.inc.php";

                                $edit = "SELECT total_amount FROM rate_setup WHERE room_type='Executive Suites' AND location='Residents'";

                                $resultedit = mysqli_query($conn, $edit);

                                $optionsedit = "";


                                while($row = mysqli_fetch_array($resultedit))
                                {
                                    
                                    $optionsedit .='<option>'.$row["total_amount"].'</option>';
                                }

                            ?>
                            <optgroup label="Executive Suites Residents (BB, HB, FB)">
                            <?php echo $optionswell;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $indo = "SELECT total_amount FROM rate_setup WHERE room_type='Executive Suites' AND location='Non-Resident'";

                                $resultindo = mysqli_query($conn, $indo);

                                $optionsindo = "";


                                while($row = mysqli_fetch_array($resultindo))
                                {
                                    
                                    $optionsindo .='<option>'.$row["total_amount"].'</option>';
                                }

                            ?>
                            <optgroup label="Executive Suites Non-Residents (BB, HB, FB)">
                            <?php echo $optionsindo;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $do = "SELECT total_amount FROM rate_setup WHERE room_type='Penthouse Suites 1 Bedroom' AND location='Residents'";

                                $resultdo = mysqli_query($conn, $do);

                                $optionsdo = "";


                                while($row = mysqli_fetch_array($resultdo))
                                {
                                    
                                    $optionsdo .='<option>'.$row["total_amount"].'</option>';
                                }

                            ?>
                            <optgroup label="Penthouse Suites 1 Bedroom Residents (BB, HB, FB)">
                            <?php echo $optionsdo;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $todo = "SELECT total_amount FROM rate_setup WHERE room_type='Penthouse Suites 1 Bedroom' AND location='Non-Resident'";

                                $resulttodo = mysqli_query($conn, $todo);

                                $optionstodo = "";


                                while($row = mysqli_fetch_array($resulttodo))
                                {
                                    
                                    $optionstodo .='<option>'.$row["total_amount"].'</option>';
                                }

                            ?>
                            <optgroup label="Penthouse Suites 1 Bedroom Non-Residents (BB, HB, FB)">
                            <?php echo $optionstodo;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $todone = "SELECT total_amount FROM rate_setup WHERE room_type='Penthouse Suites 2 Bedroom' AND location='Residents'";

                                $resulttodone = mysqli_query($conn, $todone);

                                $optionstodone = "";


                                while($row = mysqli_fetch_array($resulttodone))
                                {
                                    
                                    $optionstodone .='<option>'.$row["total_amount"].'</option>';
                                }

                            ?>
                            <optgroup label="Penthouse Suites 2 Bedroom Residents (BB, HB, FB)">
                            <?php echo $optionstodone;?>
                            </optgroup>

                            <?php

                                include "includes/conn.inc.php";

                                $todone1 = "SELECT total_amount FROM rate_setup WHERE room_type='Penthouse Suites 2 Bedroom' AND location='Non-Resident'";

                                $resulttodone1 = mysqli_query($conn, $todone1);

                                $optionstodone1 = "";


                                while($row = mysqli_fetch_array($resulttodone1))
                                {
                                    
                                    $optionstodone1 .='<option>'.$row["total_amount"].'</option>';
                                }

                            ?>
                            <optgroup label="Penthouse Suites 2 Bedroom Non-Residents (BB, HB, FB)">
                            <?php echo $optionstodone1;?>
                            </optgroup>
                        </select>
                    </div>
                </div>


                <div class="form-row">

                    <div class="form-group col-lg-4">
                        <label for="adults">Adults <span>*</span></label>
                        <select name="adult" id="adult" class="form-control">
                            <option value="">--- Please Select ---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="child">Children <span>*</span></label>
                        <select name="child" id="child" class="form-control">
                            <option value="">--- Please Select ---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="status" id="status" class="form-control" value="Allocated" hidden>
                    </div>
                </div> <hr class="usr-reg">

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary btn-md" value="Book In">
                        <a href="http://localhost/Hotel%20Management%20System/user-dashboard.php" class="btn btn-danger btn-md bg-transparent text-danger m-4">Cancel</a>
                        <span class="form-message"></span>
                    </div>
                </div>
            </form>
        <!-- End of Guest Reservation -->
    </div>
<!-- End Container -->
<script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
<script src="js/date.js"></script>
</body>
</html>