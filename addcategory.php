<?php session_start(); 
include_once "bestgigconstants.php" ;
  
if(!empty($_POST)){

	if(empty($_POST['categoryname'])){
		$msg="Skill category name is required";
	}

	if (empty($msg)) {
		$skillcatname= $_POST['categoryname'];
		
		include_once "bestgigclasses.php";
		//create object of the skill category class
		$catobj=new SkillCategory;
		$output = $catobj->createSkillCategory($skillcatname);

		if (!$output) {
			$msg = $output['msg'];
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Skill Category - <?php echo APP_NAME ?></title>
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
			<div class='col-md-6'>
				<?php 
				if(!empty($msg)){
						echo "<div class='alert alert-danger'>$msg</div>";
				}else{
						//echo "<div class='alert alert-success'>Skill Category was successfully created.</div>";
				}

			  	?>
	<h2>Add New Category</h2>
	<form action='' method='post' enctype="multipart/form-data">
		<div class='form-group'>
			<label>Skill Category name</label>
			<input type='text' name='categoryname' class='form-control' id='categoryname'>
		</div>
		<div class='form-group'>
			<input type='submit' name='submit' value='Add Skill Category' class='btn btn-primary form-control'>
		</div>
		</form>
	</div>
	<div class='col-md-3'></div>
</div>
</div>
</body>
</html>