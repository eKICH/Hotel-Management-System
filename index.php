<?php require "includes/login-script.inc.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/style.css">
  <title>Hotel Management System - Login</title>
</head>
<body>
  <!-- Nav-Bar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <span class="navbar-brand mb-0 h1 brand-custom">Hotel Management System</span>
  </nav>
  <!-- End Nav-Bar -->

  <!-- Container -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-6 col-md-3">
        <!-- Login Form -->
      <form name="user" class="form-container" method="POST" onsubmit="return validate()">
        <div class="form-group">
          <h2 class="user-login">HMS Login</h2>
        </div>
        <div style="color:red;">
          <?php
            if (isset($_GET['error']))
              echo $_GET['error'];
          ?>
		</div>
        <div class="form-group">
          <label for="email">Email address <span class="star">*</span></label>
          <input type="email" class="form-control" name="email" id="email" placeholder="example@hms.com">
          <span class="error-valid" id="emaillocation"></span>
        </div>

        <div class="form-group">
          <label for="password">Password <span class="star">*</span></label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
          <span class="error-valid" id="passwordlocation"></span>
        </div>
        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Login</button>
      </form>
      <!-- End Login Form -->
      </div>
    </div>
  </div>
  <!-- End Container -->
  <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
  <script src="js/login.js"></script>
</body>
</html>