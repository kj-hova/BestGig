<?php
include_once('bestgigclasses.php');

//create object of the category class
  $obj = new SkillCategory;
  $skillcatid = $_POST['skillcategory'];
  $skills = $obj->getSkills($skillcatid);
  //var_dump($skills);
	//Fetch skills
	foreach ($skills as $key => $value) {
	    $skillcatid = $value['skills_id'];
	    $skillsname = $value['skills_name'];
	    //echo "<input type='checkbox' value='$skillcatid'><label>".$skillsname."</label>";
	    echo "<option value='$skillcatid'>".$skillsname."</option>";
	  }
?>