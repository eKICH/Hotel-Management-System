<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - User Dashboard</title>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
</head>
<body>
<!-- Menu-Nav -->
    <?php require "menu-guest.php"; ?>
<!-- End Menu-Nav -->
<!-- Container -->
    <div class="container">
        <!-- Dashboard -->
            <h3 class="user-title user-reg">User Dashboard</h3>
            <hr class="usr-reg">
        <!-- End Dashboard -->
        <!-- Dashboard Cards -->
    <div class="row">
    <div class="col-sm-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Guest Reservations</h5><hr>
                    <p class="card-text">Create new reservations and view active reservations.</p>
                    <a href="http://localhost/Hotel%20Management%20System/guest-reservation.php" class="card-link btn btn-success">Check In</a>
                    <a href="http://localhost/Hotel%20Management%20System/guest-user-view.php" class="card-link btn btn-primary">View Reservations</a> 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Guest Check-out</h5><hr>
                    <p class="card-text">Check out Guests and view existing check outs.</p>
                    <a href="http://localhost/Hotel%20Management%20System/guest-checkout.php" class="card-link btn btn-success">Check Out</a>
                    <a href="http://localhost/Hotel%20Management%20System/checkouts.php" class="card-link btn btn-primary">View Check Outs</a> 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Room Edit</h5><hr>
                    <p class="card-text">Edit Room Status after guest Allocation and After Checkout.</p>
                    <a href="http://localhost/Hotel%20Management%20System/room-view-user.php" class="card-link btn btn-primary">View Room Edit</a> 
                </div>
            </div>
        </div>
    </div>
    <hr class="usr-reg">
    <!-- End Dashboard Cards -->
    </div>
<!-- End Container -->
<script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
</body>
</html>