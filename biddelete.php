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
    <title><?php echo APP_NAME ?> - Delete Bids</title>
    
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- End of Required Tags -->
      
	<!-- JS TO INCLUDE EXTERNAL PAGES -->
	<script>
	$(function(){
		$("#includemainnavbar").load("adminnavbar.php");
		$("#includefooter").load("footer.php");
	}) 
	</script>
</head>

<body>
	<div class='container'>
		<div class='row'>
			<div class='col-md-6'>
				<?php
					if (isset($_POST['submit'])) {
						// create object of bids class
						$obj = new Bids;

						// reference delete method
						$output = $obj->deleteBid($_GET['bidid']);

						echo "<div class='alert alert-success'>$msg</div>";
					}
				?>
				<?php
					if (isset($_GET['bidid'])) {

				?>
				<h2>Do you really want to delete this bid?</h2>
				
				<form action='' method='post' enctype="multipart/form-data">
					<div class='form-group'>
						<input type="hidden" name="bidid" value="<?php
							if(isset($_GET['bidid'])) {
							echo $_GET['bidid']; } ?>">
			            <button type='submit' name='submit'class='btn btn-danger form-control mb-5'>Yes, Delete it</button>
			            <a href="project-directory.php" class='btn btn-secondary form-control'>No, Return the Project Directory</a>
			        </div>
				</form>
					<?php
					}
					?>
			</div>
		</div>
	</div>
</body>
</html>