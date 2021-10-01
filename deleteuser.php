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
    <title><?php echo APP_NAME ?> - Delete User</title>
    
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
	}) 
	</script>
</head>

<body>
	<div class='container'>
		<div class='row'>
			<div class='col-md-6'>
				<?php
					if (isset($_POST['submit'])) {
						// create object of user class
						$obj = new User;

						// reference delete method
						$output = $obj->deleteUser($_GET['userid']);

						echo "<div class='alert alert-success'>$msg</div>";
					}
				?>
				<?php
					if (isset($_GET['userid'])) {

				?>
				<h2>Are you sure you want to delete this user?</h2>
				
				<form action='' method='post' enctype="multipart/form-data">
					<div class='form-group'>
						<input type="hidden" name="categoryid" value="<?php
							if(isset($_GET['userid'])) {
								echo $_GET['userid']; } ?>">
            <button type='submit' name='submit'class='btn btn-danger form-control'>Yes, Delete the User</button><br><br>
            <a href="userlist.php" class='btn btn-secondary form-control'>No, Return to the Members Directory</a>
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