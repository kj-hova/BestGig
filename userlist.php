<?php
include ("bestgigconstants.php");
include ("bestgigclasses.php");

if(!empty($_SESSION['admin_email'])){
  header("location: error.php");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo APP_NAME ?> - Project Directory</title>
		
		<!-- SEO META TAGS -->
		<meta name='keyword' content='<?php echo APP_NAME ?>, best gig, crowdsourcing app in Lagos, Nigeria freelancer, freelance Lagos Nigeria'>
		<meta name='author' content='john "KJ" idehai'>
		<meta name='description' content='<?php echo APP_NAME ?> is a crowdsourcing platform that enables members to post and bid for projects in Nigeria.'>
		<!-- End of SEO Meta Tags -->

		<!-- OTHER REQUIRED TAGS/LINKS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<!-- BestGig Custom CSS -->
		<link rel="stylesheet" type="text/css" href="bestgig.css">
		<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
    	<link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.11.2/js/dataTables.bootstrap5.min.js">
    	<link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.11.2/js/jquery.dataTables.min.js">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="DataTables/datatables.min.js"></script>
		<!-- End of Required Tags -->
	    
	    <!-- JS TO INCLUDE EXTERNAL PAGES -->
	    <script>
			$(function(){
				$("#includemainnavbar").load("adminnavbar.php");
			}) 
	    </script>
	</head>
	<body>
		<!--MAIN NAVIGATION BAR-->
	    <div id="includemainnavbar"></div>
	  	<!--Main Navbar-->

	  	<div class="container-fluid">

	  		<div class="row">
	  			<a href="adminprofile.php" class="btn btn-sm">Back to Admin Page</a>
	  		</div>
	  		<div class="row">
	  			<h2>Full List of All <?php echo APP_NAME ?> Projects as @ <?php if (date_default_timezone_set('Africa/Lagos')) {
	  				echo date('M, j, Y h:i:s a');
	  			} ?></h2>
	  		</div>
	  		<div class="row">
	  			<div class="col-md-12 table-responsive-sm">
	  				<table class='table table-bordered table-striped border-primary table-sm table-hover table-condensed table-active align-top' id="usertable">
						<thead>
							<tr>
								<th>S/N</th>
								<th>User ID</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Email Address</th>
								<th>Password</th>
								<th>Telephone</th>
								<th>Profile Picture</th>
								<th>Gender</th>
								<th>Date of Birth</th>
								<th>Street Address</th>
								<th>Local Government</th>
								<th>State</th>
								<th>Valid ID</th>
								<th>Utility Bill</th>
								<th>Description</th>
								<th>Membership Type</th>
								<th>Membership Subscription Period</th>
								<th>User Account Registration Date</th>
								<th>Date of Last Update</th>
								<th>User Status</th>
								<th>Edit User</th>
								<th>Delete User</th>
								<th>Change User's Image</th>
							</tr>
						</thead>
						<tbody>
							<?php
								//create object of admin class
								$obj = new Admin;
								$user = $obj->getUsers();

								// echo "<pre>";
								// print_r($user);
								// echo "</pre>";
								$kounter = 0;
								foreach ($user as $key => $value) {
									
							?>
							<tr>
								<td><?php echo ++$kounter; ?></td>
								<td><?php echo $value['user_id'] ?></td>
								<td><?php echo $value['user_fname'] ?></td>
								<td><?php echo $value['user_mname'] ?></td>
								<td><?php echo $value['user_lname'] ?></td>
								<td><?php echo $value['user_email'] ?></td>
								<td><?php echo $value['user_pwd'] ?></td>
								<td><?php echo $value['user_phone'] ?></td>
								<td><?php echo $value['user_picture'] ?></td>
								<td><?php echo $value['user_gender'] ?></td>
								<td><?php echo $value['user_dob'] ?></td>
								<td><?php echo $value['user_street'] ?></td>
								<td><?php echo $value['localgov_id'] ?></td>
								<td><?php echo $value['states_id'] ?></td>
								<td><?php echo $value['user_validid'] ?></td>
								<td><?php echo $value['user_utilitybill'] ?></td>
								<td><?php echo $value['user_description'] ?></td>
								<td><?php echo $value['memtype_id'] ?></td>
								<td><?php echo $value['user_memduration'] ?></td>
								<td><?php echo $value['user_datereg'] ?></td>
								<td><?php echo $value['user_lastupdate'] ?></td>
								<td><?php echo $value['user_status'] ?></td>
								<td>
									<a href="edituser.php?userid=<?php echo $value['user_id'] ?>" class='btn btn-primary btn-xs'>Edit</a>
								</td>
								<td>
									<a href="deleteuser.php?userid=<?php echo $value['user_id'] ?>&useremail=<?php echo $value['user_email']; ?>" class='btn btn-danger btn-xs'>Delete</a>
								</td>
								<td>
									<a href="changeuserimage.php?userid=<?php echo $value['user_id']; ?>&useremail<?php echo $value['user_email']; ?>" class='btn btn-secondary btn-xs'>Change Image</a>
								</td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>

	  			</div>
	  		</div>
	  	</div>
	  	<script type="text/javascript">
	  	$(document).ready(function() {
		    $('#usertable').DataTable();
		}
		);
	  	</script>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>

	</body>
</html>