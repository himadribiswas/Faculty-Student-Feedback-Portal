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
session_start();
if($_SESSION['login_user'])
 { 
$user=$_SESSION['login_user']; 
 }else
	{ header("location:check.php"); }
	

				

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

		
		<li><a href="faculty_disp.php">Modify Subjects & Faculties</a></li>
        <li><a href="cleardb.php">Clear Database</a></li>
		<li><a href="changesession.php">Modify Academic Session</a></li>
        <li><a href="register.php">Add New User</a></li>
		<li class="active"><a href="set.php">Set/Unset Portal</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="editpass.php" data-toggle="tooltip" title="Edit Profile"><span class="glyphicon glyphicon-user"></span> <?php echo $user; ?> </a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="navbar navbar-inverse navbar-fixed-left">
  <a class="navbar-brand" data-toggle="collapse" data-target="#demo" href="#">Analyze Feedback</a>
  <ul id="demo" class="nav navbar-nav">
  <li><a href="set.php" data-toggle="tooltip" title="Enable or Disable">Enable/Disable Portal</a></li>
   <li><a href="setins.php" data-toggle="tooltip" title="Set instruction for students">Set Instruction</a></li>

  </ul>
</div>
<div class="container">
<div class="page-header">
  <h1>Enable Disable Faculty-Student Feedback Portal</h1>
</div>
<p>Set the application</p> 
<br><br>
<?php

				$query = "SELECT * FROM `feedback`.`setup`";
                $result = mysqli_query($conn,$query);
				$r=mysqli_fetch_array($result);
				$status=$r["status"];
				if($status=="disable")
				{
					$status="enable";
					?>
<form method="post" action="set.php">
<button type="submit" name="status" value="enable" class="btn btn-success col-md-offset-4 btn-lg active ">Enable</button>
<button type="submit" name="status" value="disable" class="btn btn-danger col-md-offset-1 btn-lg disabled" disabled>Disable</button>
</form>
<?php          
 } 
				else if($status=="enable") { ?>
					<form method="post" action="set.php">
<button type="submit" name="status" value="enable" class="btn btn-success col-md-offset-4 btn-lg disabled " disabled>Enable</button>
<button type="submit" name="status" value="disable" class="btn btn-danger col-md-offset-1 btn-lg active">Disable</button>
</form>
<?php                 } ?>

<?php
	if (isset($_POST['status']))
			{
				$status1=$_POST['status'];
					$query = "UPDATE `feedback`.`setup` SET status='$status1'";
                    $result = mysqli_query($conn,$query);
					if($result)
						header("location:set.php");
			}
?>



</div>
<div class="footer navbar-fixed-bottom navbar-inverse">
  <center> <font color="white">    <p class="text-uppercase"> © 2018. All Rights Reserved. &nbsp;|&nbsp; Faculty-Student Feedback Portal. &nbsp;|&nbsp; Developed by Himadri Biswas [RCCIIT ECE 2014-2018]</p></font </center>
    </div>
</body>
</html>
