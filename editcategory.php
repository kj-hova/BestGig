<?php session_start();
include_once "bestgigconstants.php" ;
include_once "bestgigclasses.php";


	// echo "<pre>";
	// print_r($categorydata);
	// echo "</pre>";

	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";

// update category details
if (isset($_POST['submit'])) {
	
	// create object of category class
	$obj = new SkillCategory;

	// fetch a specific category data based on the category_id
	if (isset($_GET['skillcatid'])) {
	$categorydata = $obj->getSkillCategory($_GET['skillcatid']);
	}
	// reference update category method
	$output = $obj->updateSkillCategory($_GET['skillcatid'], $_POST['categoryname']);
	//var_dump($output);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Skill Category - <?php echo APP_NAME ?></title>
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
		<div class='row'>
			<div class='col-md-3'></div>
			<div class='col-md-6'>
				<div class="alert-danger">
				<?php
				if(isset($output)) {
				 	echo $output;
				 } ?></div>
				<h2>Edit Skill Category</h2>
				<form action='' method='post'>
					<div class='form-group'>
						<label>Skill Category Name</label>
						<input type='text' name='categoryname' class='form-control' id='categoryname' value='<?php
							if(isset($categorydata['skillcategory_name'])) {
								echo $categorydata["skillcategory_name"];
							} ?>'>
					</div>
					<div class='form-group'>
						<!-- <label>Category Status</label>
						<select name='categorystatus' id='categorystatus'>
							<option value="">Choose Category</option>
							<option value="active" <?php //if($categorydata['category_status']=='active'){echo "selected";} ?> >Active</option>
							<option value="inactive" <?php //if($categorydata['category_status']=='inactive'){echo "selected";} ?> >Inactive</option>
						</select> -->
					</div>
						<input type="hidden" name="skillcategoryid" value="<?php
							if(isset($categorydata['skillcategory_id'])) {
							echo $categorydata["skillcategory_id"];
							}
						?>">
		            <input type='submit' name='submit' value='Save Changes' class='btn btn-primary form-control'>
				</form>
			</div>
			<div class='col-md-3'></div>
		</div>
	</div>
</body>
</html>