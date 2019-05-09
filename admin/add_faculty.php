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
		
		<li class="active"><a href="faculty_disp.php">Modify Subjects & Faculties</a></li>
        <li ><a href="cleardb.php">Clear Database</a></li>
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
<div class="navbar navbar-inverse navbar-fixed-left">
  <a class="navbar-brand" data-toggle="collapse" data-target="#demo" href="#">Select Year</a>
  <ul id="demo" class="nav navbar-nav">
   <li><a href="faculty_disp.php?year=1st Year" title="Subjects and faculties of 1st Year">1st Year</a></li>
   <li><a href="faculty_disp.php?year=2nd Year"  title="Subjects and faculties of 2nd Year">2nd Year</a></li>
   <li><a href="faculty_disp.php?year=3rd Year"  title="Subjects and faculties of 3rd Year">3rd Year</a></li>
   <li><a href="faculty_disp.php?year=4th Year"  title="Subjects and faculties of 4th Year">4th Year</a></li>
   <li><a href="add_subject.php"  title="Subjects and faculties of 4th Year">Add New Subject</a></li>
   <li><a href="add_faculty.php"  title="Subjects and faculties of 4th Year">Add New Faculty</a></li>
  </ul>
</div>
<div class="container">
  <h2>Add New Subject</h2>
  <br><br><center>
  
  
  
   <form action="add_faculty.php" method="post" autocomplete="off">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Faculty Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
       
        <td><div class="form-group">
      <input type="text" class="form-control" id="fac_name" placeholder="Enter Faculty Name" name="fac_name" required>
    </div></td>
        
      </tr>
       
    </tbody>
  </table>
   <input type="hidden"  id="class"  name="class" value="<?php echo $class; ?>" >
    <button type="submit" class="btn btn-success">Add Faculty</button>
	<button type="button" class="btn btn-default col-md-offset-4" onclick="resetfiled()">Reset Field</button>
	<button type="button" class="btn btn-warning col-md-offset-4" onclick="window.history.go(-1);">Go back</button>
  </form>
  <?php


if (isset($_POST['fac_name']) )
			{

				$fac_name = $_POST['fac_name'];

				
				 $query = "INSERT INTO `feedback`.`faculty` (`facultyname`) VALUES ('$fac_name');";
                 $result = mysqli_query($conn,$query);	   
				if($result)
				{	echo "<center><div class='alert alert-success'>
  <strong>Success!</strong> New Faculty Created!
				</div></center>";}
				else{
					echo "<center><div class='alert alert-danger'>
  Failed to add Faculty!
</div></center>";
				}
			
			}
?>
   <h3>Availble Faculties</h3> 
  <?php
  	$query = "SELECT * FROM `feedback`.`faculty`";
        $result = mysqli_query($conn,$query);
		$numrows = mysqli_num_rows($result);
		
		if($numrows==0)	
	    {
			echo "<div class='alert alert-danger'>
  No Faculty Added Yet!
</div>";
			}
        else{	
		echo" <table class='table table-striped'>
    <thead>
      <tr>
        <th>Sl No.</th>
        <th>Faculty Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
	  $ct=1;
        while($row = $result->fetch_array()) {
			print '<td>'.$ct++.'</td>';
			print '<td>'.$row["facultyname"].'</td>';
			echo "<td><a href='deletefaculty.php?id=" . $row['facultyname'] . "'>Delete</td>";
   print'</tr>';
		}
   echo " </tbody>
  </table>";
		}
		
		
			
		if(!empty($_GET['del']))
        {
			echo "<center><div class='alert alert-danger'>
  <strong>Success!</strong> Deleted Successfully!
				</div></center>";
		}
  ?>
  
  
</div>
 
</body>
<SCRIPT type="text/javascript">


 function resetfiled() {

	document.getElementById('fac_name').value = '';
  } 

</SCRIPT>
</html>
