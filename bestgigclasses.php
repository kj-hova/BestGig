<?php

include_once("bestgigconstants.php");

// CREATION OF ADMIN CLASS
class Admin{

public $adminfname;
public $adminlname;
public $adminemail;
public $adminpwd;
public $dbcon;

function __construct(){

//database connection by creating object of Mysqli class
	$this->dbcon = new Mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);
	if ($this->dbcon->connect_error) {
		die("Connection Failed: ".$this->dbcon->connect_error);
	}
}	

// Create new Admin
function createAdmin($adminfname,$adminlname,$adminemail,$adminpwd){

	$query = "INSERT INTO admin SET admin_fname='$adminfname',admin_lname='$adminlname',admin_email='$adminemail',admin_pwd='$adminpwd'";

	//run sql query by using mysqli query()
	
	$qres=$this->dbcon->query($query);

	if ($qres) {
		
		$msg = "New admin was successfully created";
	}else{
		$msg = "Sorry, creation of new admin failed!".$this->dbcon->error;
	}

	return $msg;
	
}
# end of create Admin

// Login method for Admin
function loginAdmin($adminemail,$adminpwd){
	
	$sql = "SELECT * FROM admin WHERE admin_email='$adminemail' AND admin_pwd='$adminpwd' LIMIT 1";
	$qres = $this->dbcon->query($sql);

	if ($qres->num_rows > 0) {
		 $qres->fetch_assoc();

		$msg = "Welcome to your Admin session.";

		// start_session();

		$_SESSION['admin_email'] = $adminemail;
		$_SESSION['admin_pwd'] = $pwd;
		// $_SESSION['admin_fname'] = $adminfname;
		// $_SESSION['admin_lname'] = $adminlname;

	        header("location: adminprofile.php");		
	}else{
		$msg = "Invalid email or password";
	}
	return $msg;
}
# end of login Admin

// Fetch details of all users
function getUsers(){
	// write the sql query
	$query="SELECT * FROM user ORDER BY user_email";
	// execute run the query
	$qres=$this->dbcon->query($query);

	$rows=array();
	if($qres->num_rows>0){
     while($row=$qres->fetch_assoc()){
     	$rows[]=$row;
     }
	}
	return $rows;
}
# end of Admin get all users

// Fetch details of individual user
function getUser($useremail){
	//write the sql query
	$sql="SELECT * FROM user WHERE user_email='$useremail'";
	//execute run the query
	$result=$this->dbcon->query($sql);
	if($result->num_rows>0){
         $row=$result->fetch_assoc();
         return $row;
	}else{
         return "no user record found";
	}
	
}
# end of Admin get user

// Edit user details
// update category
function updateUser($userfname,$usermname,$userlname,$useremail,$userpwd,$userphone,$usergender,$userdob,$userstreet,$localgovid,$statesid,$userdescription,$memtypeid,$usermemduration,$userstatus){

	$userid = $_REQUEST['userid'];

	// write sql query
	$sql = "UPDATE user SET user_fname='$userfname', user_mname='$usermname', user_lname='$userlname', user_email='$useremail', user_pwd='$userpwd', user_phone='$userphone', user_gender='$usergender', user_dob='$userdob', user_street='$userstreet', localgov_id='$localgovid', states_id='$statesid', user_description='$userdescription', memtype_id='$memtypeid', user_memduration='$usermemduration', user_status='$userstatus' WHERE  user_id='$userid'";
	//var_dump($sql);
	exit;

		// run the query
		$result = $this->dbcon->query($sql);

		if ($this->dbcon->affected_rows == 1) {
			
			$msg = "User details was successfully edited";

			//redirect to userlist.php page
			header("location: userlist.php?msg=$msg");
			exit;
		}elseif($this->dbcon->affected_rows==0){
			return "No changes was made";
		}else{
			return "Could not edit user details".$this->dbcon->error;
		}
	}

	// delete category
	function deleteUser($userid){
		// write sql query
		$sql = "DELETE FROM user WHERE user_id='$userid'";
		// run the query
		$result = $this->dbcon->query($sql);

		if ($this->dbcon->affected_rows == 1) {
			// redirect
			$msg = "The user has been successfully deleted";

			header("location: adminprofile.php?msg=$msg");
			exit;
		}else{
			$msg = "Failed to delete this user".$this->dbcon->error;
		}
	}

	function listAdmin($adminid){
		$sql="SELECT * FROM admin WHERE admin_id='$adminid'";
		$result=$this->dbcon->query($sql);

		if($result){
			return $result->fetch_all(MYSQLI_ASSOC);
		}else{
			$this->dbcon->error;
		}

	}

}

// CREATION OF USER CLASS
class User{

public $userfname;
public $usermname;
public $userlname;
public $useremail;
public $userpwd;
public $userphone;
public $userpicture;
public $usergender;
public $userdob;
public $userstreet;
public $uservalidid;
public $userutilitybill;
public $userdescription;
public $dbcon;

function __construct(){

//database connection by creating object of Mysqli class
	$this->dbcon = new Mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);
	if ($this->dbcon->connect_error) {
		die("Connection Failed: ".$this->dbcon->connect_error);
	}
}	
// Create new User
function createUser($userfname,$usermname,$userlname,$useremail,$userpwd,$userphone,$usergender,$userdob){

$sql = "INSERT INTO user SET user_fname='$userfname',user_mname='$usermname',user_lname='$userlname',user_email='$useremail',user_pwd='$userpwd',user_phone='$userphone',user_gender='$usergender',user_dob='$userdob'";
	//run sql query by using mysqli query()
	//$result =$this->dbcon->query($sql);

	//run sql query by using mysqli query()
	
	$query=$this->dbcon->query($sql);

	if ($this->dbcon->error) {
		return "Unable to create user account.".$this->dbcon->error;
	}else{
		return  $this->dbcon->insert_id;
		
		return  "Your BestGig account was succesfully created";
	}	
}
# end of create new user

// Login method for User
function loginUser($useremail,$userpwd){

	$sql = "SELECT * FROM user WHERE user_email='$useremail' AND user_pwd='$userpwd' LIMIT 1";
					
	$qres = $this->dbcon->query($sql);

	if ($qres->num_rows > 0) {
		 $rows = $qres->fetch_assoc();

		// return $this->dbcon->insert_id;
		//  session_start();

		 	$_SESSION['user_id']=$rows['user_id'];
			$_SESSION['user_fname']=$rows['user_fname'];
			$_SESSION['user_mname']=$rows['user_mname'];
			$_SESSION['user_lname']=$rows['user_lname'];
			$_SESSION['user_email']=$rows['user_email'];
			$_SESSION['user_pwd']=$rows['user_pwd'];
			$_SESSION['user_phone']=$rows['user_phone'];
			$_SESSION['user_picture']=$rows['user_picture'];
			$_SESSION['user_gender']=$rows['user_gender'];
			$_SESSION['user_datereg']=$rows['user_datereg'];
			$_SESSION['user_street']=$rows['user_street'];
			$_SESSION['user_description']=$rows['user_description'];
			$_SESSION['skillcategory_id']=$rows['skillcategory_id'];
			$_SESSION['user_status']=$rows['user_status'];
			$_SESSION['localgov_id']=$rows['localgov_id'];
			$_SESSION['states_id']=$rows['states_id'];
			$_SESSION['memtype_id']=$rows['memtype_id'];


      // var_dump($rows);
      // die();

		$msg = "Welcome to your Bestgig profile page";

	}else{
		$msg = "Invalid email or password";
	}
	return $msg;
		return $rows;

}
# end of User login

// Fetch details of all users
function getUsersPublic(){
	// write the sql query
	$query="SELECT * FROM user ORDER BY user_id";
	// execute run the query
	$qres=$this->dbcon->query($query);

	$rows=array();
	if($qres->num_rows>0){
     while($row=$qres->fetch_assoc()){
     	$rows[]=$row;
     }
	}
	return $rows;
}
# end of Admin get all users
	
// Get User profile
function getUser($userid){
	//write the sql query
	$sql="SELECT * FROM skillcategory RIGHT OUTER JOIN user ON skillcategory.skillcategory_id = user.skillcategory_id LEFT OUTER JOIN local_governments ON user.localgov_id = local_governments.id LEFT OUTER JOIN states ON local_governments.state_id = states.state_id WHERE user_id='$userid'";
	//execute run the query
	$result=$this->dbcon->query($sql);
	if($result->num_rows>0){
         $row=$result->fetch_assoc();
         return $row;
	}else{
         return "no record found";
	}
}
# end of Get User

// Update User profile
function updateUser($userfname,$usermname,$userlname,$useremail,$userpwd,$userphone,$usergender,$userdob,$userstreet,$localgovid,$statesid,$userdescription,$skillcatid,$memtypeid,$usermemduration,$userid){

						$filename = $_FILES['profilepic']['name'];
						$filetype = $_FILES['profilepic']['type'];
						$filetemp = $_FILES['profilepic']['tmp_name'];
						$file_error = $_FILES['profilepic']['error'];

						$errors = array();

						if ($file_error > 0) {
							$errors[] = "<div class='alert alert-danger'>You did not select any file for upload</div>";
						}

						// check for the right file extension
						$extensions = array("jpg", "png", "gif", "jpeg");

						$file_ext = explode('.', $filename);
						$file_ext = end($file_ext);
						$file_ext=strtolower($file_ext);

						//echo $file_ext;

						if (!in_array($file_ext, $extensions)) {
							$errors[] = "<div class='alert alert-danger'>File extension not allowed!</div>";
						}
						if(empty($errors)){
							$newpic=rand().time().".".$file_ext;
							$destination="workimg/".$newpic;
							move_uploaded_file($filetemp, $destination);
						}




						$filename = $_FILES['validid']['name'];
						$filetype = $_FILES['validid']['type'];
						$filetemp = $_FILES['validid']['tmp_name'];
						$file_error = $_FILES['validid']['error'];

						$errors = array();

						if ($file_error > 0) {
							$errors[] = "<div class='alert alert-danger'>You did not select any file for upload</div>";
						}

						// check for the right file extension
						$extensions = array("pdf");

						$file_ext = explode('.', $filename);
						$file_ext = end($file_ext);
						$file_ext=strtolower($file_ext);

						//echo $file_ext;

						if (!in_array($file_ext, $extensions)) {
							$errors[] = "<div class='alert alert-danger'>File extension not allowed!</div>";
						}
						if(empty($errors)){
							$newpic1=rand().time().".".$file_ext;
							$destination="workimg/".$newpic1;
							move_uploaded_file($filetemp, $destination);
						}

						
					$filename = $_FILES['utilitybill']['name'];
						$filetype = $_FILES['utilitybill']['type'];
						$filetemp = $_FILES['utilitybill']['tmp_name'];
						$file_error = $_FILES['utilitybill']['error'];

						$errors = array();

						if ($file_error > 0) {
							$errors[] = "<div class='alert alert-danger'>You did not select any file for upload</div>";
						}

						// check for the right file extension
						$extensions = array("pdf");

						$file_ext = explode('.', $filename);
						$file_ext = end($file_ext);
						$file_ext=strtolower($file_ext);

						//echo $file_ext;

						if (!in_array($file_ext, $extensions)) {
							$errors[] = "<div class='alert alert-danger'>File extension not allowed!</div>";
						}
						if(empty($errors)){
							$newpic2=rand().time().".".$file_ext;
							$destination="workimg/".$newpic2;
							move_uploaded_file($filetemp, $destination);
						}


	//$userid = $_REQUEST['userid'];

	// write sql query
	$sql = "UPDATE user SET user_fname='$userfname', user_mname='$usermname', user_lname='$userlname', user_email='$useremail', user_pwd='$userpwd', user_phone='$userphone',user_picture='$newpic', user_gender='$usergender', user_dob='$userdob', user_street='$userstreet', user_validid='$newpic1', user_utilitybill='$newpic2', localgov_id='$localgovid', states_id='$statesid', user_description='$userdescription', skillcategory_id='$skillcatid', memtype_id='$memtypeid', user_memduration='$usermemduration' WHERE  user_id='$userid'";
	//var_dump($sql);

	// run the query
	$result = $this->dbcon->query($sql);

		if ($this->dbcon->affected_rows == 1) {
			
			$msg = "Your BestGig account was succesfully updated";

			//redirect to userlist.php page
			header("location: user.php?msg=$msg");
			exit;
		}elseif($this->dbcon->affected_rows==0){
			$msg = "No change was made to your profile";
		}else{
			$msg = "Could not update your profile at this time".$this->dbcon->error;
		}

	}
	function listdetails($userid){
		$sql="SELECT * FROM user JOIN membership_type ON user.memtype_id = membership_type.memtype_id WHERE user_id='$userid'";
		$result=$this->dbcon->query($sql);

		if($result){
			return $result->fetch_all(MYSQLI_ASSOC);
		}else{
			$this->dbcon->error;
		}

	}

}

class States{
//member variable
public $stateid;
public $statename;
public $dbcon;

//state function/methods
function __construct(){
	//database connection by creating object of mysqli class
	$this->dbcon=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);
	if ($this->dbcon->connect_error) {
	        die("Connection Failed:".$this->dbcon->connect_error);
	}
}
function getStates(){
//write the sql query
$sql="SELECT * FROM states ORDER BY state_name";

//execute run the query
$result=$this->dbcon->query($sql);
	if($this->dbcon->affected_rows>0){
	    return $result->fetch_all(MYSQLI_ASSOC);
	}else{
	         return $this->dbcon->error;
	}
}
function getLcdas($stateid){
	//write the sql query
	$sql="SELECT * FROM local_governments WHERE state_id='$stateid'";

	//execute run the query
	$result=$this->dbcon->query($sql);
	if($this->dbcon->affected_rows>0){
	    return $result->fetch_all(MYSQLI_ASSOC);
	}else{
	         return $this->dbcon->error;
    }
  }
}

// create method for membership type
class MembershipType{
//member variable
public $memtypeid;
public $memtypename;
public $memtypefee;
public $dbcon;

	//state function/methods
	function __construct(){
	//database connection by creating object of mysqli class
	$this->dbcon=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);
	    if ($this->dbcon->connect_error) {
	            die("Connection Failed:".$this->dbcon->connect_error);
	    }
	  }
	   
	function getMembershipType(){
	//write the sql query
	$sql="SELECT memtype_type, memtype_id FROM membership_type ORDER BY memtype_id";
	//var_dump($sql);
	//execute run the query
	$result=$this->dbcon->query($sql);
		if($this->dbcon->affected_rows>0){
		    return $result->fetch_all(MYSQLI_ASSOC);
		}else{
		         return $this->dbcon->error;
	    }
	}

	function getFees($memtypeid){
	//write the sql query
	$sql="SELECT memtype_fee FROM membership_type WHERE memtype_id='$memtypeid'";
	//execute run the query
	$result=$this->dbcon->query($sql);
		if($result->num_rows > 0){
			$res=$result->fetch_assoc();
		    echo $res['memtype_fee'];
		}else{
		         echo $this->dbcon->error;
	   	}
	}

}

#Begin Category class definition
class SkillCategory{
	//member variable
	public $skillcatid;
	public $skillcatname;
	public $dbcon; //database connection handler

	//member function/methods
	function __construct(){
		//database connection by creating object of mysqli class
		$this->dbcon=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);
		if ($this->dbcon->connect_error) {
            die("Connection Failed:".$this->dbcon->connect_error);
		}
	}
	function createSkillCategory($skillcatname){
		//write sql query
		$sql="INSERT INTO skillcategory SET skillcategory_name='$skillcatname'";
		//run sql query by using mysqli Query()
		$result=$this->dbcon->query($sql);
		if($result){
			$msg="Skill Category was successfully created";
			//redirect to listcategory.php
			header("Location:listcategory.php?msg=$msg");
		}else{
			$msg="Something went wrong! Could not create Skill Category".$this->dbcon->error;
		}
		return $msg;
	}

	function getSkillCategories(){
		//write the sql query
		$sql="SELECT * FROM skillcategory ORDER BY skillcategory_name";
		//execute run the query
		$result=$this->dbcon->query($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;
	}
	function getSkillCategory($skillcatid){
		//write the sql query
		$sql="SELECT * FROM skillcategory WHERE skillcategory_id='$skillcatid'";
		//execute run the query
		$result=$this->dbcon->query($sql);
		if($result->num_rows>0){
             $row=$result->fetch_assoc();
             return $row;
		}else{
             return "no record found";
		}
		
	}
	function getSkills($skillcatid){
	//write the sql query
	$sql="SELECT * FROM skills WHERE skillcategory_id='$skillcatid'";

	//execute run the query
	$result=$this->dbcon->query($sql);
	if($this->dbcon->affected_rows>0){
	    return $result->fetch_all(MYSQLI_ASSOC);
	}else{
	         return "no record found".$this->dbcon->error;
    }
  }

	// update category
	function updateSkillCategory($skillcatid, $skillcatname){
		// write sql query
		$sql = "UPDATE skillcategory SET skillcategory_name='$skillcatname' WHERE  skillcategory_id='$skillcatid'";

		// run the query
		$result = $this->dbcon->query($sql);

		if ($this->dbcon->affected_rows == 1) {
			
			$msg = "Skill Category details was successfully updated";

			//redirect to listcategory.php page
			header("location: listcategory.php?msg=$msg");
			exit;
		}elseif($this->dbcon->affected_rows==0){
			return "No changes was made to this category";
		}else{
			return "Something went wrong! Could not edit Skill Category".$this->dbcon->error;
		}
	}

	// delete category
	function deleteSkillCategory($skillcatid){
		// write sql query
		$sql = " DELETE FROM skillcategory WHERE skillcategory_id='$skillcatid'";
		// run the query
		$result = $this->dbcon->query($sql);

		if ($this->dbcon->affected_rows == 1) {
			// redirect to lstcategory.php
			$msg = "Skill Category has been successfully deleted";

			header("location: listcategory.php?msg=$msg");
			exit;
		}else{
			$msg = "Failed to delete category details".$this->dbcon->error;
		}
	}

}

// create method for membership type
class Project{
	//member variable
	public $projid;
	public $projname;
	public $projdescription;
	public $projtimeframe;
	public $projofferpay;
	public $projstreet;
	public $projtown;
	public $dbcon;

		//state function/methods
		function __construct(){
		//database connection by creating object of mysqli class
		$this->dbcon=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);
		    if ($this->dbcon->connect_error) {
		            die("Connection Failed:".$this->dbcon->connect_error);
		    }
	  	}
		   
		function createProject($projname,$projdescription,$projtimeframe,$projofferpay,$projstreet,$projtown,$projlcda,$projstate,$skillcatid,$userid){
		//write sql query
		$sql="INSERT INTO project SET proj_name='$projname',proj_description='$projdescription',proj_timeframe='$projtimeframe',proj_offerpay='$projofferpay',proj_street='$projstreet',proj_town='$projtown',proj_lcda='$projlcda',proj_state='$projstate',skillcategory_id='$skillcatid',user_id='$userid'";
		//run sql query by using mysqli Query()
		$res=$this->dbcon->query($sql);
		if($res){
			$msg="<p class='alert alert-success'>New project was successfully posted. Your new project shall be published shortly</p>";
			//redirect to listcategory.php
			header("Location:user.php?msg=".$msg);
		}else{
			$msg="Something went wrong! Could not post new project".$this->dbcon->error;
		}
		return $msg;
	}

	function getProjects(){
		//write the sql query
		$sql="SELECT * FROM skillcategory RIGHT OUTER JOIN project ON skillcategory.skillcategory_id = project.skillcategory_id LEFT OUTER JOIN local_governments ON project.proj_lcda = local_governments.id LEFT OUTER JOIN states ON local_governments.state_id = states.state_id";
		//execute run the query
		$result=$this->dbcon->query($sql);

		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;
	}
	function getProject($projid){
		//write the sql query
		$sql="SELECT * FROM project WHERE proj_id='$projid'";
		//execute run the query
		$result=$this->dbcon->query($sql);
		if($result->num_rows>0){
             $row=$result->fetch_assoc();
             return $row;
		}else{
             return "no project found";
		}
		
	}

	// update category
	function updateProject($projname,$projectdescription,$projtimeframe,$projofferpay,$projstreet,$projtown,$skillcategory,$projectstatus){
		// write sql query
		$sql = "UPDATE project SET proj_name='$projname' WHERE  proj_id='$projid'";

		// run the query
		$result = $this->dbcon->query($sql);

		if ($this->dbcon->affected_rows == 1) {
			
			$msg = "Project has been successfully updated";

			//redirect to listcategory.php page
			header("location: user.php?msg=$msg");
			exit;
		}elseif($this->dbcon->affected_rows==0){
			return "No change was made to this project";
		}else{
			return "Something went wrong! Could not update this project".$this->dbcon->error;
		}
	}

	// delete category
	function deleteProject($projid){
		// write sql query
		$sql = " DELETE FROM project WHERE proj_id='$projid'";
		// run the query
		$result = $this->dbcon->query($sql);

		if ($this->dbcon->affected_rows == 1) {
			// redirect to lstcategory.php
			$msg = "Project has been successfully deleted";

			header("location: adminprofile.php?msg=$msg");
			exit;
		}else{
			$msg = "Failed to delete project".$this->dbcon->error;
		}
	}

}

// create method for membership type
class Bids{
	//member variable
	public $bidid;
	public $bidproposal;
	public $bidamount;
	public $projtimeframe;
	public $dbcon;

		//state function/methods
		function __construct(){
		//database connection by creating object of mysqli class
		$this->dbcon=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);
		    if ($this->dbcon->connect_error) {
		            die("Connection Failed:".$this->dbcon->connect_error);
		    }
	  	}
		   
		function createBid($bidproposal,$bidamount,$bidtimeframe,$projid,$userid){
		//write sql query
		$sql="INSERT INTO bids SET bid_proposal='$bidproposal',bid_amount='$bidamount',bid_timeframe='$bidtimeframe', proj_id='$projid',user_id='$userid'";
		//run sql query by using mysqli Query()
		$res=$this->dbcon->query($sql);
		if($res){
			$msg="Your bid was successfully submitted";
			//redirect to user profile page
			header("Location:user.php?msg=".$msg);
		}else{
			$msg="Something went wrong! Could not submit your bid".$this->dbcon->error;
		}
		return $msg;
	}

	function getBids(){
		//write the sql query
		$sql="SELECT * FROM bids ORDER BY bid_id";
		//execute run the query
		$result=$this->dbcon->query($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;
	}
	function getBid($bidid){
		//write the sql query
		$sql="SELECT * FROM project WHERE bid_id='$bidid'";
		//execute run the query
		$result=$this->dbcon->query($sql);
		if($result->num_rows>0){
             $row=$result->fetch_assoc();
             return $row;
		}else{
             return "no bid record found";
		}
		
	}

	// update category
	function updateBid($bidproposal,$bidamount,$bidtimeframe,$bidstatus){
		// write sql query
		$sql = "UPDATE bid SET bid_proposal='$bidproposal',bid_amount='$bidamount',bid_timeframe='$bidtimeframe' WHERE bid_id='$bidid'";

		// run the query
		$result = $this->dbcon->query($sql);

		if ($this->dbcon->affected_rows == 1) {
			
			$msg = "You bid has been successfully updated";

			//redirect to listcategory.php page
			header("location: user.php?msg=$msg");
			exit;
		}elseif($this->dbcon->affected_rows==0){
			return "No change was made to this bid";
		}else{
			return "Something went wrong! Could not update your bid".$this->dbcon->error;
		}
	}

	// delete category
	function deleteBid($bidid){
		// write sql query
		$sql = " DELETE FROM bid WHERE bid_id='$bidid'";
		// run the query
		$result = $this->dbcon->query($sql);

		if ($this->dbcon->affected_rows == 1) {
			// redirect to lstcategory.php
			$msg = "The bid has been successfully deleted";

			header("location: user.php?msg=$msg");
			exit;
		}else{
			$msg = "Failed to delete bid".$this->dbcon->error;
		}
	}

}
 
?>