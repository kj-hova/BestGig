
<?php
include('bestgigclasses.php');

  //create object of the membershipType class
  $obj = new MembershipType;
  // fetch fee based on membership type
  if (!empty($_POST['membertype'])) {
    $memtypeid = $_POST['membertype'];
  }else{
    echo $memtypeid = "Please select membership type.";
  }
  // if (!isset($_GET['memberfee'])) {
  //   $memfee = $_GET['memberfee'];
  // }else{
  //   echo $memfee = "No selection.";
  // }
  
  $fee = $obj->getFees($memtypeid);
  
  // Fetch applicable fees
  // foreach ($fee as $key => $value) {
  //     $memtypeid = $value['memtype_type'];
  //     $memfee = $value['memtype_fee'];
      echo $fee;
  // }
 
  
?>