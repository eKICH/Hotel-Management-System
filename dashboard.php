<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - Admin Dashboard</title>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
</head>
<body>
<!-- Menu-Nav -->
    <?php require "main-menu.php"; ?>
<!-- End Menu-Nav -->
<!-- Container -->
    <div class="container">
        <!-- Dashboard -->
            <h3 class="user-title user-reg">Admin Dashboard</h3>
            <hr class="usr-reg">
        <!-- End Dashboard -->
        <!-- Dashboard Cards -->
    <div class="row">
        <div class="col-sm-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Room Registration</h5><hr>
                    <p class="card-text">Register Room and view its current status.</p>
                    <a href="http://localhost/Hotel%20Management%20System/room-registration.php" class="card-link btn btn-success">Register</a>
                    <a href="http://localhost/Hotel%20Management%20System/room-view.php" class="card-link btn btn-primary">View Status</a> 
                </div>
            </div>
        </div>

        <div class="col-sm-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Room Rate Setup</h5>
                    <hr>
                    <p class="card-text">Room Rate Setup and view existing rates.</p>
                    <a href="http://localhost/Hotel%20Management%20System/room-rates-setup.php" class="card-link btn btn-success">Set Rate</a>
                    <a href="http://localhost/Hotel%20Management%20System/room-rate-view.php" class="card-link btn btn-primary">View Rates</a> 
                </div>
            </div>
        </div>

        <div class="col-sm-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User Registration</h5><hr>
                    <p class="card-text">Register Users and View existing users.</p>
                    <a href="http://localhost/Hotel%20Management%20System/user-registration.php" class="card-link btn btn-success">Register</a>
                    <a href="http://localhost/Hotel%20Management%20System/user-view.php" class="card-link btn btn-primary">View Users</a> 
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-sm-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Guest Reservations</h5><hr>
                    <p class="card-text">View active reservations, Edit and Delete any that does not meet requirements.</p>
                    <a href="http://localhost/Hotel%20Management%20System/guest-reservation-view-admin.php" class="card-link btn btn-primary">View Reservations</a> 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Guest Check-out</h5><hr>
                    <p class="card-text">Check out Guests and view existing check outs.</p>
                    <a href="http://localhost/Hotel%20Management%20System/checkouts-admin.php" class="card-link btn btn-primary">View Check Outs</a> 
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