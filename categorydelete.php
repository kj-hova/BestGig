<?php session_start();

include ("bestgigclasses.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Delete Skill Category - <?php echo APP_NAME ?></title>
	<meta name='keyword' content='bestgig, best gig, crowdsourcing app in Lagos, Nigeria freelancer, freelance Lagos Nigeria'>
	<meta name='author' content='john KJ idehai'>
	<meta name='description' content='bestgig is a crowdsourcing platform that matches projects and workers in Nigeria.'>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="bestgig.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
	     $(function(){
	      $("#includemainnavbar").load("mainnavbar1.php");
	      $("#includefooter").load("footer.php");
	      });
	</script>
</head>

<body>
	<div class='container'>
		<div class='row'>
			<div class='col-md-6'>
				<?php
					if (isset($_POST['submit'])) {
						// create object of category class
						$obj = new SkillCategory;

						// reference delete method
						$output = $obj->deleteSkillCategory($_GET['skillcatid']);

						echo "<div class='alert alert-success'>$msg</div>";
					}
				?>
				<?php
					if (isset($_GET['skillcatid'])) {

				?>
				<h2>Are you sure you want to delete the <?php if (isset($_GET['skillcatname'])) {
					echo $_GET['skillcatname'];} ?> category?</h2>
				
				<form action='' method='post' enctype="multipart/form-data">
					<div class='form-group'>
						<input type="hidden" name="categoryid" value="<?php
							if(isset($_GET['skillcatid'])) {
							echo $_GET['skillcatid']; } ?>">
			            <button type='submit' name='submit'class='btn btn-danger form-control'>Yes, Delete it</button><br><br>
			            <a href="listcategory.php" class='btn btn-secondary form-control'>No, Return Skill Category list</a>
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