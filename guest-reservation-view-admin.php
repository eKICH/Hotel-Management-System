<?php
 // Initiate Connection to the DB
  include "includes/conn.inc.php";

  $query = "SELECT * FROM guest_reserv";
  $result = $conn->query($query);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - Guest Reservation View</title>
    <!-- <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script> -->
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>
<body id="reservations">
<!-- Menu Nav -->
<?php require "main-menu.php"; ?>
<!-- End Menu Nav -->
<!-- Container -->
<div class="container">
    <p class="user-title mt-4 mb-4">This section shows the list of all reservations and there status.</p>
    <hr class="usr-reg">
    <!-- Room Table View -->
    <table id="usertable" class="display table table-md table-bordered mb-0">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>ID/Passport</th>
                <th>Nationality</th>
                <th>Gender</th>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <!-- While Loop to iterate over the records -->
        <?php
            while($rows = mysqli_fetch_assoc($result))
            {
	    ?>
            <tr>
                <td><?php echo $rows['fname']; ?></td>
                <td><?php echo $rows['lname']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['phone']; ?></td>
                <td><?php echo $rows['idno']; ?></td>
                <td><?php echo $rows['nationality']; ?></td>
                <td><?php echo $rows['gender']; ?></td>
                <td><?php echo $rows['room_no']; ?></td>
                <td><?php echo $rows['room_type']; ?></td>
                <td><?php echo $rows['status']; ?></td>
                <td><a href="reservationeditadmin.php?id=<?php echo $rows['id'];?>" title="Click to Edit"  data-toggle="tooltip" style="text-decoration:none;">Edit</a></td>
                <td>
                <a href="reservationdelete.php?id=<?php echo $rows['id'];?>" title="Click to Delete"  data-toggle="tooltip" style="text-decoration:none;">Delete</a>
                </td>
            </tr>
        <?php
            }
        ?>
            <!-- End While Loop to iterate over the records  -->
        </tbody>
    </table> <hr class="usr-reg">
    <!-- End Room Table View -->
    <!-- Export to CSV -->
    <form class="mt-4" method="POST" action="export_reservation.php">
	    <input type="submit" class="btn btn-danger" name="exportreservation" value="Export CSV File"/>
    </form>
<!-- End Export to CSV -->
</div>
<!-- End Container -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready(function() {
		$('#usertable').DataTable({
            "scrollY":        "200px",
            "scrollCollapse": true,
            "paging":         true
        });
		} );
	</script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>