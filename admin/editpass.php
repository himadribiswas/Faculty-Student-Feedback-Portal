<?php
session_start();
if($_SESSION['login_user'])
 { 
$user=$_SESSION['login_user']; 
 }else
	{ header("location:check.php"); }

?>
<html>
<title>Feedback</title>
<head>
<SCRIPT type="text/javascript">
//window.history.forward();
//function noBack() { window.history.forward(); } 
function validateform(){  
var name=document.changesession_form.cpas.value;  
var password=document.changesession_form.password.value; 
var cpassword=document.changesession_form.confirmpassword.value; 

  
if (name==null || name==""){  
  alert("Name can't be blank");  
  return false;  
}else if(password.length<8 || name.length<8 || cpassword.length<8){  
  alert("Password must be at least 8 characters long.");  
  return false;  
  }  
  else if(password != cpassword){  
  alert("Current Pasword Didnot Match With Confirm Password!");  
  
  
  return false;  
  }
if(name==password)
{
	alert("New Password Cannot be same as old password!");
	return false;
}	
} 
</SCRIPT>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../css/jquery-2.2.3.min.js"></script>
  <script src="../css/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="../css/logo.png" />
<style>
.navbar-fixed-left {
  width: 190px;
  position: fixed;
  border-radius: 0;
  height: 100%;
}

.navbar-fixed-left .navbar-nav > li {
  float: none;  /* Cancel default li float: left */
  width: 169px;
}

.navbar-fixed-left + .container {
  padding-left: 160px;
}

/* On using dropdown menu (To right shift popuped) */
.navbar-fixed-left .navbar-nav > li > .dropdown-menu {
  margin-top: -50px;
  margin-left: 140px;
}

thead {
    color: #31708F;
}
</style>
</head>
<body>
<?php
include "heading.php";
include "dbcon.php";

             $query = "SELECT * FROM `feedback`.`setup`";
                $result = mysqli_query($conn,$query);
				 $row = mysqli_fetch_array($result);
				 $present=$row["Session"];
				
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Administrator</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="dashboard.php">Analyze Feedback</a></li>

		<li ><a href="faculty_disp.php">Modify Subjects & Faculties</a></li>
        <li><a href="cleardb.php">Clear Database</a></li>
		<li ><a href="changesession.php">Modify Academic Session</a></li>
        <li ><a href="register.php">Add New User</a></li>
		<li><a href="set.php">Set/Unset Portal</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="editpass.php" data-toggle="tooltip" title="Edit Profile"><span class="glyphicon glyphicon-user"></span> <?php echo $user; ?> </a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

   <div class="container">
   <div class="panel panel-info col-md-6 col-md-offset-3">
     <div class="panel-heading ">
   <h3>Change Password</h3>      
	</div>
	<div class="panel-body">
						
							<div class="">
								
								<form id="changesession_form" name="changesession_form" action="editpass.php" method="post" role="form" onsubmit="return validateform()">
									 <div class="form-group">
										<input type="password" name="cpas" id="cpas" tabindex="1" class="form-control" placeholder="Current Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="New Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="confirmpassword" id="confirmpassword" tabindex="2" class="form-control" placeholder="Confirm Password" required>
									</div>
						<div class="row">
											<div class="col-sm-5 col-sm-offset-3">
												<input type="submit" name="change-submit" id="change-submit" tabindex="4" class="form-control btn btn-primary" value="Change Password">
											</div>
										</div>
								</form>
							</div>
						</div>
					</div>
					</div>
<?php
if (isset($_POST['cpas']) && isset($_POST['password']) && isset($_POST['confirmpassword']) )
		{    
				$pre_pass = $_POST['cpas'];
				$new_pass = $_POST['password'];
				$con_pass = $_POST['confirmpassword'];
				  $pre_pass=md5($pre_pass);
				   $query = "SELECT * FROM `feedback`.`admin` WHERE password='$pre_pass'";
                   $result = mysqli_query($conn,$query);
				   if(mysqli_num_rows($result)==0)
				   {
					   echo "<center><div class='alert alert-danger'>
    <strong>Failed!</strong> Incorect Current Password!
				   </div></center>";
				   }
				   else
				   {
					   if($new_pass==$con_pass)
					   {
						   $new_pass=md5($new_pass);
							$query = "UPDATE `feedback`.`admin` SET password='$new_pass'";
							$result = mysqli_query($conn,$query);
									   if($result)
									   {echo "<center><div class='alert alert-success'>
										<strong>Success!</strong> Password Updated Successfully!.
									   </div></center>";}
									   else
										{echo "<center><div class='alert alert-danger'>
										<strong>Failed!</strong> Update Failed!.
									   </div></center>";}  
					   }
					   else
						  {
					   echo "<center><div class='alert alert-danger'>
						<strong>Failed!</strong> New Password Didnot Match with Confirm Password!
							</div></center>";
				          } 
				   }
				   
				   
		}	
?>
<div class="footer navbar-fixed-bottom navbar-inverse">
  <center> <font color="white">    <p class="text-uppercase"> © 2018. All Rights Reserved. &nbsp;|&nbsp; Faculty-Student Feedback Portal. &nbsp;|&nbsp; Developed by Himadri Biswas [RCCIIT ECE 2014-2018]</p></font </center>
    </div>
</body>
</html>
