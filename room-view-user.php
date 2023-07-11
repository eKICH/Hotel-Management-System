<?php
 // Initiate Connection to the DB
  include "includes/conn.inc.php";

  $query = "SELECT * FROM room_reg";
  $result = $conn->query($query);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - Room View</title>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>
<body id="room">
<!-- Menu Nav -->
<?php require "menu-guest.php"; ?>
<!-- End Menu Nav -->
<!-- Container -->
<div class="container">
    <p class="user-title mt-4 mb-4">This section shows all the rooms registered and there status.</p>
    <hr class="usr-reg">
    <!-- Room Table View -->
    <table id="usertable" class="display table table-md table-bordered mb-0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <!-- While Loop to iterate over the records -->
        <?php
            while($rows = mysqli_fetch_assoc($result))
            {
	    ?>
            <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['room_no']; ?></td>
                <td><?php echo $rows['room_type']; ?></td>
                <td><?php echo $rows['status']; ?></td>
                <td><?php echo $rows['date_created']; ?></td>
                <td><a href="roomedit-user.php?id=<?php echo $rows['id'];?>" title="Click to Edit Room Details"  data-toggle="tooltip" style="text-decoration:none;">Edit</a></td>
                <!-- <td>
                <a href="roomdelete.php?id=<?php echo $rows['id'];?>" title="Click to Delete Room"  data-toggle="tooltip" style="text-decoration:none;">Delete</a>
                </td> -->
            </tr>
        <?php
            }
        ?>
            <!-- End While Loop to iterate over the records  -->
        </tbody>
    </table> <hr class="usr-reg">
    <!-- End Room Table View -->
    <!-- Export to CSV -->
    <form class="mt-4" method="POST" action="export_room.php">
	    <input type="submit" class="btn btn-danger" name="exportroom" value="Export CSV File"/>
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
		$('#usertable').DataTable();
		} );
	</script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>