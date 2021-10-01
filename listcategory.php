<?php session_start(); 
include_once "bestgigconstants.php" ;
include_once "bestgigclasses.php";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Skill Category List - <?php echo APP_NAME ?></title>
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
<!--MAIN NAVIGATION BAR-->
<div id="includemainnavbar"></div>
<!--Main Navbar-->
<div class='container'>
	<div class='row mt-3 mb-3'>
		<div class="col-md-6">
  			<a href="adminprofile.php" class="btn btn-sm">Back to Admin Page</a>
  		</div>
  		<div class='col-md-6'>
			<a href="addcategory.php" class="btn btn-primary">Add New Skill Category</a>
		</div>
  	</div>
  	<div class="row">
  		<?php
			if (isset($_GET['msg'])) {
				echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
			}
		?>
  	</div>
	<div class="row">
		<h2><?php echo APP_NAME ?> Skill Category List</h2>
	</div>		
	<div class="row">
		<table class='table table-bordered table-hover'>
			<thead>
				<tr>
					<th>S/N</th>
					<th>Category Name</th>
					<th>Edit Action</th>
					<th>Delele Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//create object of category class
					$obj = new SkillCategory;
					$skillcategory = $obj->getSkillCategories();

					// echo "<pre>";
					// print_r($categories);
					// echo "</pre>";
					$kounter = 0;
					foreach ($skillcategory as $key => $value) {
						
				?>
				<tr>
					<td><?php echo ++$kounter; ?></td>
					<td><?php echo $value['skillcategory_name'] ?></td>
					<td>
						<a href="editcategory.php?skillcatid=<?php echo $value['skillcategory_id'] ?>" class='btn btn-primary btn-xs'>Edit Category</a>
					</td>
					<td>
						<a href="categorydelete.php?skillcatid=<?php echo $value['skillcategory_id'] ?>&skillcatname=<?php echo $value['skillcategory_name']; ?>" class='btn btn-danger btn-xs'>Delete Category</a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>