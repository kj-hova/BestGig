<?php session_start();
include ("bestgigconstants.php");
include ("bestgigclasses.php");

if(!isset($_SESSION['admin_email']) AND !isset($_SESSION['admin_pwd'])){
  header("location: adminlogin.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo APP_NAME ?> - Bids Directory</title>
		
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
	  			<h2>Directory of All <?php echo APP_NAME ?> Bids as @ <?php if (date_default_timezone_set('Africa/Lagos')) {
	  				echo date('M, j, Y h:i:s a');
	  			} ?></h2>
	  		</div><hr>
	  		<div class="row">
	  			<div class="col-md-12 table-responsive-sm">
	  				<table class='table table-responsive-sm table-bordered table-striped border-primary table-sm table-hover table-condensed table-active align-top' id='directory'>
						<thead>
							<tr>
								<th scope="col" width="3%">S/N</th>
								<th scope="col" width="5%">Bid ID</th>
								<th scope="col" width="54%">Bid Proposal</th>
								<th scope="col" width="5%">Bid Amount</th>
								<th scope="col" width="5%">Timeframe</th>
								<th scope="col" width="5%">Bid Date</th>
								<th scope="col" width="5%">Status</th>
								<th scope="col" width="5%">Project ID</th>
								<th scope="col" width="3%">Promoter</th>
								<th scope="col" width="5%">Edit Bid</th>
								<th scope="col" width="5%">Cancel Bid</th>
							</tr>
						</thead>
						<tbody>
							<?php
								//create object of bid class
								$bid_obj = new Bids;
								$result = $bid_obj->getBids();

								$kounter = 0;
								foreach ($result as $key => $value) {
									
							?>
							<tr>
								<td><?php echo ++$kounter; ?></td>
								<td><?php echo $value['bid_id'] ?></td>
								<td><?php echo $value['bid_proposal'] ?></td>
								<td><?php echo $value['bid_amount'] ?></td>
								<td><?php echo $value['bid_timeframe'] ?></td>
								<td><?php echo $value['bid_regdate'] ?></td>
								<td><?php echo $value['bid_status'] ?></td>
								<td><?php echo $value['proj_id'] ?></td>
								<td><?php echo $value['user_id'] ?></td>
								<td>
									<a href="bidedit.php?bidid=<?php echo $value['bid_id'] ?>" class='btn btn-primary btn-xs'>Edit</a>
								</td>
								<td>
									<a href="biddelete.php?bidid=<?php echo $value['bid_id'] ?>" class='btn btn-danger btn-xs'>Cancel</a>
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

	  	<script type="text/javascript" language="javascript">
		    $(document).ready(function() {
		      $('#directory').DataTable();
		    	}
		    );
		</script>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>

	</body>
	
</html>