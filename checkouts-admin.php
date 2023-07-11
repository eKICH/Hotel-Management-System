<?php
 // Initiate Connection to the DB
  include "includes/conn.inc.php";

  $query = "SELECT * FROM check_out";
  $result = $conn->query($query);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System - Guest Checkouts View</title>
    <!-- <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script> -->
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>
<body id="check-outs">
<!-- Menu Nav -->
<?php require "main-menu.php"; ?>
<!-- End Menu Nav -->
<!-- Container -->
<div class="container">
    <p class="user-title mt-4 mb-4">This section shows the list of all Guest Checkouts.</p>
    <hr class="usr-reg">
    <!-- Room Table View -->
    <table id="usertable" class="display table table-md table-bordered mb-0">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>ID/Passport</th>
                <th>Nationality</th>
                <th>Nationality Type</th>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Meal Plan</th>
                <th>Check in</th>
                <th>Check out</th>
                <th></th>
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
                <td><?php echo $rows['idno']; ?></td>
                <td><?php echo $rows['nationality']; ?></td>
                <td><?php echo $rows['ntype']; ?></td>
                <td><?php echo $rows['rno']; ?></td>
                <td><?php echo $rows['rtype']; ?></td>
                <td><?php echo $rows['mealplan']; ?></td>
                <td><?php echo $rows['checkin']; ?></td>
                <td><?php echo $rows['checkout']; ?></td>
                <!-- <td><?php echo $rows['tdays']; ?></td> -->
                <td><a href="checkoutreceipt.php?id=<?php echo $rows['id'];?>" title="Print Receipt"  data-toggle="tooltip" style="text-decoration:none;">Print</a></td>
               
            </tr>
        <?php
            }
        ?>
            <!-- End While Loop to iterate over the records  -->
        </tbody>
    </table> <hr class="usr-reg">
    <!-- End Room Table View -->
    <!-- Export to CSV -->
    <form class="mt-4" method="POST" action="export_checkout.php">
	    <input type="submit" class="btn btn-danger" name="exportcheckout" value="Export CSV File"/>
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
		$('#usertable').DataTable({});
		} );
	</script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>