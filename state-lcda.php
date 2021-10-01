<?php
include('bestgigclasses.php');

//var_dump($_POST);
//create object of the states class
  $obj = new States;
  $stateid = $_POST['state'];
  $lcdas = $obj->getLcdas($stateid);
  //var_dump($lcdas);
	//Fetch LCDA
	foreach ($lcdas as $key => $value) {
	    $stateid = $value['id'];
	    $lcdaname = $value['name'];
	    echo "<option value='$stateid'>".$lcdaname."</option>";
	  }
?>