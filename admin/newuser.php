<!DOCTYPE html>
<html>
<title>Feedback</title>
<head>
<SCRIPT type="text/javascript">
//window.history.forward();
//function noBack() { window.history.forward(); }
</SCRIPT>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../css/jquery-2.2.3.min.js"></script>
  <script src="../css/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="../css/logo.png" />

</head>
<body>
<center>

<?php
include "heading.php";


include "dbcon.php";
echo"<br><br><br><br><br><br>";
if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password']))
		{    
				$username = $_POST['user'];
				
				$email = $_POST['email'];
				$password = $_POST['password'];
				$conpassword = $_POST['confirmpassword'];
			
			if($conpassword!=$password)
			{	echo "<p class='text-danger'>Password didnot match with the confirm password!<br></p>";
			    echo "<a href='register.php'> Try Again</a>";
			} 
			else
			{
				$query = "SELECT * FROM `feedback`.`admin` WHERE `username`='$username' OR email='$email'";
                $result = mysqli_query($conn,$query);
				$numrows = mysqli_num_rows($result);
				//echo $username;
				if($numrows>1)
				{
					echo "<p class='text-danger'>Username or Emailid Already Exists!<br></p>";
			        echo "<a href='register.php'> Try Again</a>";
				}
			    else
				{
				
				$password=md5($password);
				
				$query = "INSERT INTO `feedback`.`admin` (username,email,password) VALUES ('$username','$email','$password')";
				$result = mysqli_query($conn,$query);
				 if($result){
					 echo "<p class='text-success'>New User Registered Succesfully!</p>";
					 echo "<a href='dashboard.php'> Click Here to go to the Admin Dashboard</a>";
				 }  
				else
				{	 echo "<h3 class='text-danger'>Registration Failed</h3>";
				echo "<a href='register.php'> Click Here to Login</a>";}
			}
			}
		}
		if (isset($_POST['username']) && isset($_POST['password']))
		{
			    $username = $_POST['username'];
				$password = $_POST['password'];
				
				$query = "SELECT * FROM `feedback`.`admin` WHERE username='$username'";
                $result = mysqli_query($conn,$query);
				 $row = mysqli_fetch_array($result);
				$numrows = mysqli_num_rows($result);
			
				//echo $row["password"];
				if($numrows==0)
				{
					echo "<p class='text-danger'>User Not Found!<br></p>";
			        echo "<a href='index.php'> Try Again</a>";
				}
				
				else if(md5($password)==$row["password"])
				{
					session_start();
					$_SESSION['login_user']= $username; 
					header("location:dashboard.php");
				}
				else {
					 echo "<h3 class='text-danger'>Incorrect password</h3>";
				     echo "<a href='index.php'> Click Here to Login</a>";
				}
		}
			
?>
</center>
<div class="footer navbar-fixed-bottom navbar-inverse">
  <center> <font color="white">    <p class="text-uppercase"> © 2018. All Rights Reserved. &nbsp;|&nbsp; Faculty-Student Feedback Portal. &nbsp;|&nbsp; Developed by Himadri Biswas [RCCIIT ECE 2014-2018]</p></font </center>
    </div>
</body>
</head>