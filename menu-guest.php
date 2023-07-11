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
  <h3 class="navbar-brand brand-custom">Hotel Management System</h3>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item active px-md-2">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/user-dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item px-md-2">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/guest-reservation.php">Guest Reservation</a>
      </li>
      <li class="nav-item px-md-2">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/guest-checkout.php">Check Outs</a>
      </li>
      <li class="nav-item px-md-2">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/room-view-user.php">Rooms</a>
      </li>
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


<script type="text/javascript">
  $(document).ready(function(){
    $("#guest-reserv a:contains('Guest Reservation')").parent().addClass('active').siblings().removeClass('active');
    $("#guest-checkout a:contains('Check Outs')").parent().addClass('active').siblings().removeClass('active');
    $("#room a:contains('Rooms')").parent().addClass('active').siblings().removeClass('active');
  });
</script>