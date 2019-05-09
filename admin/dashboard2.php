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
        <li class="active"><a href="dashboard.php">Analyze Feedback</a></li>
      <!--  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Edit Subjects</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="register.php">Add New User</a></li>
          </ul>
        </li> -->
		
		<li><a href="faculty_disp.php">Modify Subjects & Faculties</a></li>
        <li><a href="cleardb.php">Clear Database</a></li>
		<li><a href="changesession.php">Modify Academic Session</a></li>
        <li><a href="register.php">Add New User</a></li>
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
  <a class="navbar-brand" data-toggle="collapse" data-target="#demo" href="#">Analyze Feedback</a>
  <ul id="demo" class="nav navbar-nav">
   <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="View composite report of the whole class">Subjectwise Report <span class="caret"></span></a>
     <ul class="dropdown-menu" role="menu">
      <li><a href="dashboard.php?something=1st Year Section A">1st Year Section A</a></li>
      <li><a href="dashboard.php?something=1st Year Section B">1st Year Section B</a></li>
	        <li class="divider"></li>
      <li><a href="dashboard.php?something=2nd Year Section A">2nd Year Section A</a></li>
      <li><a href="dashboard.php?something=2nd Year Section B">2nd Year Section B</a></li>
	        <li class="divider"></li>
      <li><a href="dashboard.php?something=3rd Year Section A">3rd Year Section A</a></li>
	  <li><a href="dashboard.php?something=3rd Year Section B">3rd Year Section B</a></li>
	        <li class="divider"></li>
	  <li><a href="dashboard.php?something=4th Year Section A">4th Year Section A</a></li>
	  <li><a href="dashboard.php?something=4th Year Section B">4th Year Section B</a></li>
     </ul>
   </li>
     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="View report of a particular faculty of a particular class">classwise Report <span class="caret"></span></a>
     <ul class="dropdown-menu" role="menu">
       <li><a href="dashboard.php?composite=1st Year Section A">1st Year Section A</a></li>
      <li><a href="dashboard.php?composite=1st Year Section B">1st Year Section B</a></li>
	        <li class="divider"></li>
      <li><a href="dashboard.php?composite=2nd Year Section A">2nd Year Section A</a></li>
      <li><a href="dashboard.php?composite=2nd Year Section B">2nd Year Section B</a></li>
	        <li class="divider"></li>
      <li><a href="dashboard.php?composite=3rd Year Section A">3rd Year Section A</a></li>
	  <li><a href="dashboard.php?composite=3rd Year Section B">3rd Year Section B</a></li>
	        <li class="divider"></li>
	  <li><a href="dashboard.php?composite=4th Year Section A">4th Year Section A</a></li>
	  <li><a href="dashboard.php?composite=4th Year Section B">4th Year Section B</a></li>
     </ul>
   </li>
   <li><a href="dashboard2.php" data-toggle="tooltip" title="View complete report of the faculty ie.includes all classes">Facultywise Report</a></li>

  </ul>
</div>
<?php
include "dbcon.php";

?>
<div class="container">
<h2>Feedback Report</h2>
  <h4>Select Faculty to get the complete report:</h4> 

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
        <th>Subjects Assigned</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
	  $ct=1;
        while($row = $result->fetch_array()) {
			$papers="";
			$fc=$row["facultyname"];
			$query2 = "SELECT * FROM `feedback`.`subjects` WHERE faculty='$fc'";
			$result2 = mysqli_query($conn,$query2);
           if(mysqli_num_rows($result2)==0)
			   continue;
			while($row2 = $result2->fetch_array()) {
				$papers=$papers." [".$row2["subjectcode"]."], ";
			}
			print '<td>'.$ct++.'</td>';
			//print '<td>'.$row["facultyname"].'</td>';
			echo "<td><a href='displayreport.php?id=" . $row['facultyname'] . "'>".$row["facultyname"]."</td>";
			print '<td>'.$papers.'</td>';
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
 




</div>

</body>
</html>