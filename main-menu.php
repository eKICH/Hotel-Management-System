<?php 
    session_start();

    $error = '';
    if (!isset($_SESSION['userid'])) {
        
        $error = "Login Required!";
        header("Location: http://localhost/Hotel%20Management%20System/index.php?error=".$error);
        die();
    } 
?>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
  <a class="navbar-brand brand-custom">Hotel Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="active nav-item">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/room-registration.php">Room Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/room-rates-setup.php">Room Rate Setup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/user-registration.php">User Registration</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/guest-reservation-view-admin.php">Reservations</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/checkouts-admin.php">Check Outs</a>
      </li>
     
    <!--  <li class="nav-item">
        <a class="nav-link" href="#">Reports</a>
      </li>-->
    </ul>
   <form class="form-inline my-2 my-lg-0">
        <li class="nav-item dropdown" style="list-style: none;">
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:#fff;">
            <?php  echo "".$_SESSION['userid']; ?>
            </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="includes/logout-script.inc.php">Logout</a>
        </div>
        </li>
      <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="http://localhost/Ticketing/login.php?" style="list-style: none; text-decoration-line: none; color: #fff;">Log Out</a></button>-->
    </form>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#room-reg a:contains('Room Registration')").parent().addClass('active').siblings().removeClass('active');
    $("#room-rate a:contains('Room Rate Setup')").parent().addClass('active').siblings().removeClass('active');
    $("#user-reg a:contains('User Registration')").parent().addClass('active').siblings().removeClass('active');
    $("#reservations a:contains('Reservations')").parent().addClass('active').siblings().removeClass('active');
    $("#check-outs a:contains('Check Outs')").parent().addClass('active').siblings().removeClass('active');
  });
</script>
