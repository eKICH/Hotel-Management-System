<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
  <h3 class="navbar-brand brand-custom">Hotel Management System</h3>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active px-md-2">
        <a class="nav-link" href="http://localhost/Hotel%20Management%20System/dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown px-md-2">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Room
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="http://localhost/Hotel%20Management%20System/room-registration.php">Registration</a>
                <a class="dropdown-item" href="http://localhost/Hotel%20Management%20System/room-view.php"> View</a>
            </div>
      </li>
      <li class="nav-item dropdown px-md-2">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Room Rate
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="http://localhost/Hotel%20Management%20System/room-rates-setup.php">Rate Setup</a>
                <a class="dropdown-item" href="http://localhost/Hotel%20Management%20System/room-rate-view.php">Rate View</a>
            </div>
      </li>
      <li class="nav-item dropdown px-md-2">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="http://localhost/Hotel%20Management%20System/user-registration.php">Registration</a>
                <a class="dropdown-item" href="http://localhost/Hotel%20Management%20System/user-view.php">View</a>
            </div>
      </li>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>

<script type="text/javascript">
    $(document).ready(function(){
      $("#room-reg a:contains('Room')").parent().addClass('active').siblings().removeClass('active');
          });
  </script>