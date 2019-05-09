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

</SCRIPT>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../css/jquery-2.2.3.min.js"></script>
  <script src="../css/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="../css/logo.png" />
<style>

</style>
</head>
<body>
<?php
include "heading.php";
include "dbcon.php";

				
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
        <li class="active"><a href="cleardb.php">Clear Database</a></li>
		<li><a href="changesession.php">Modify Academic Session</a></li>
        <li ><a href="register.php">Add New User</a></li>
		<li><a href="set.php">Set/Unset Portal</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="editpass.php" data-toggle="tooltip" title="Edit Profile"><span class="glyphicon glyphicon-user"></span> <?php echo $user; ?> </a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
if (isset($_POST['class']))
			{
				
				$class = $_POST['class'];
				 echo "<div class='container'>
				 <div class='container'>
				  <div class='panel panel-danger col-md-8 col-md-offset-2'>
				  <div class='panel-heading'>
				  <h3>Are You Sure you want to delete all datas of <strong> $class <strong></h3>
				  </div>
				  <div class='panel-body'>
						<form method='post' action='clear.php'>
						<input type='hidden'  id='clas' name='clas' value='$class' >
						<input type='submit'  id='submit' name='submit1' value='Yes' class='btn btn-danger col-md-offset-4'>
						<input type='submit'  id='submit' name='submit1' value='No'  class='btn btn-danger col-md-offset-1'>
                        </form>						
						</div>
					</div>
					</div>
				  ";
				
			}
		//	echo $_POST['submit1'];
			if (isset($_POST['clas']) && isset($_POST['submit1']))
			{
				$clas=$_POST['clas'];
				
				$option=$_POST['submit1'];
				if($clas=="Clear Data of All Classes")
				{
					if($option=="Yes")
				{
					//echo "Yes";
					  $query = "DELETE FROM `feedback`.`marks`";
                      $result = mysqli_query($conn,$query);
					  if($result)
					  {
						  echo "<div class='alert alert-success'>
						  <strong>Success!</strong> All Datas Deleted Successfully!
						  </div>"; 
					  }
					  else
					  {
						  echo "<div class='alert alert-danger'>
						  <strong>Failed!</strong> Unable to Delete!
						  </div>";
					  }
				}
				else
				{
					header("location:cleardb.php");
				}
				}
				
				else
				{
				if($option=="Yes")
				{	
						 $query1 = "SELECT * FROM `feedback`.`subjects` WHERE class='$clas'";
						 $result1 = mysqli_query($conn,$query1);
						
					 while($roww = $result1->fetch_array())
					  {  $fid=$roww["subid"];
				  //echo $fid;
					  			 
					  $query = "DELETE FROM `feedback`.`marks` WHERE facid='$fid'";
                      $result = mysqli_query($conn,$query);
					  }
					  if($result)
					  {
						  echo "<div class='alert alert-success'>
						  <strong>Success!</strong> All Datas Deleted Successfully!
						  </div>"; 
					  }
					  else
					  {
						  echo "<div class='alert alert-danger'>
						  <strong>Failed!</strong> Unable to Delete!
						  </div>";
					  }
					  
				}
				else
				{
					header("location:cleardb.php");
				}
				}
			}	
			//else
			//echo "Not passed";
?>


     
   <div class="footer navbar-fixed-bottom navbar-inverse">
  <center> <font color="white">    <p class="text-uppercase"> © 2018. All Rights Reserved. &nbsp;|&nbsp; Faculty-Student Feedback Portal. &nbsp;|&nbsp; Developed by Himadri Biswas [RCCIIT ECE 2014-2018]</p></font </center>
    </div>
	
	
</body>
</html>
