<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faculty-Student Feedback Portal Installation</title>
  <meta charset="utf-8">
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
		
		<li class="active"><a href="#">Modify Subjects & Faculties</a></li>
        <li><a href="cleardb.php">Clear Database</a></li>
		<li><a href="changesession.php">Modify Academic Session</a></li>
        <li><a href="register.php">Add New User</a></li>
		<li><a href="set.php">Set/Unset Portal</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a data-toggle="tooltip" title="Edit Profile"><span class="glyphicon glyphicon-user"></span> <?php echo $user; ?> </a></li>
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
<?php
include "dbcon.php";


  
			
		if(!empty($_GET['year']))
        {
			$year= htmlspecialchars($_GET['year']);
			//echo $year;
			$year= htmlspecialchars($_GET['year']);
			//echo $year;
			if($year=="1st Year")
			{
			
				echo "<div class='container'>
  <h2>SECTION A - 1ST YEAR</h2>
  <form action='faculty_add.php' method='post'>
  <table class='table table-striped '>
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Faculty Name</th>
		<th>Modify</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
         
		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='1st Year Section A' ";
        $result = mysqli_query($conn,$query);
		$numrows = mysqli_num_rows($result);
		
		if($numrows==0)	
	    {
	
			echo "<td>"; 
			echo "No Data Added";
			}
        else{	
		
        while($row = $result->fetch_array()) {
			
		echo "<td>"; print $row["subjectcode"]; echo"</td>";
		
	
        echo "<td>";  print $row["subjectname"];	echo"</td>";
        echo"<td>"; print $row["faculty"];
		echo "</td>";
		 echo "<td><a href='delete.php?id=" . $row['subid'] . "&amp;cls=1st Year'>Delete</td>";
      echo "</tr>";
        }  } 
   echo "</tbody>
  </table>
    <button type='submit' class='btn btn-info' name='clas' value='1sta'>Add Subject</button>
  </form>";
  
  echo "
  <h2>SECTION B - 1ST YEAR</h2>
  <form action='faculty_add.php' method='post'>
  <table class='table table-striped '>
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Faculty Name</th>
		<th>Modify</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
         
		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='1st Year Section B' ";
        $result = mysqli_query($conn,$query);
		$numrows = mysqli_num_rows($result);
		
		if($numrows==0)	
	    {
	
			echo "<td>"; 
			echo "No Data Added";
			}
        else{	
		
        while($row = $result->fetch_array()) {
			
		echo "<td>"; print $row["subjectcode"]; echo"</td>";
		
	
        echo "<td>";  print $row["subjectname"];	echo"</td>";
        echo"<td>"; print $row["faculty"];
		echo "</td>";
		 echo "<td><a href='delete.php?id=" . $row['subid'] . "&amp;cls=1st Year'>Delete</td>";
      echo "</tr>";
        }  } 
   echo "</tbody>
  </table>
    <button type='submit' class='btn btn-info' name='clas' value='1stb'>Add Subject</button>
  </form>
  </div>";
 
		    }
			if($year=="2nd Year")
			{
					echo "<div class='container'>
  <h2>SECTION A - 2nd YEAR</h2>
  <form action='faculty_add.php' method='post'>
  <table class='table table-striped '>
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Faculty Name</th>
		<th>Modify</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
         
		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='2nd Year Section A' ";
        $result = mysqli_query($conn,$query);
		$numrows = mysqli_num_rows($result);
		
		if($numrows==0)	
	    {
	
			echo "<td>"; 
			echo "No Data Added";
			}
        else{	
		
        while($row = $result->fetch_array()) {
			
		echo "<td>"; print $row["subjectcode"]; echo"</td>";
		
	
        echo "<td>";  print $row["subjectname"];	echo"</td>";
        echo"<td>"; print $row["faculty"];
		echo "</td>";
		 echo "<td><a href='delete.php?id=" . $row['subid'] . "&amp;cls=2nd Year'>Delete</td>";
      echo "</tr>";
        }  } 
   echo "</tbody>
  </table>
    <button type='submit' class='btn btn-info' name='clas' value='2nda'>Add Subject</button>
  </form>";
  
  echo "
  <h2>SECTION B - 2nd YEAR</h2>
  <form action='faculty_add.php' method='post'>
  <table class='table table-striped '>
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Faculty Name</th>
		<th>Modify</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
         
		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='2nd Year Section B' ";
        $result = mysqli_query($conn,$query);
		$numrows = mysqli_num_rows($result);
		
		if($numrows==0)	
	    {
	
			echo "<td>"; 
			echo "No Data Added";
			}
        else{	
		
        while($row = $result->fetch_array()) {
			
		echo "<td>"; print $row["subjectcode"]; echo"</td>";
		
	
        echo "<td>";  print $row["subjectname"];	echo"</td>";
        echo"<td>"; print $row["faculty"];
		echo "</td>";
		 echo "<td><a href='delete.php?id=" . $row['subid'] . "&amp;cls=2nd Year'>Delete</td>";
      echo "</tr>";
        }  } 
   echo "</tbody>
  </table>
    <button type='submit' class='btn btn-info' name='clas' value='2ndb'>Add Subject</button>
  </form>
  </div>";
		    }
			if($year=="3rd Year")
			{
				echo "<div class='container'>
  <h2>SECTION A - 3rd YEAR</h2>
  <form action='faculty_add.php' method='post'>
  <table class='table table-striped '>
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Faculty Name</th>
		<th>Modify</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
         
		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='3rd Year Section A' ";
        $result = mysqli_query($conn,$query);
		$numrows = mysqli_num_rows($result);
		
		if($numrows==0)	
	    {
	
			echo "<td>"; 
			echo "No Data Added";
			}
        else{	
		
        while($row = $result->fetch_array()) {
			
		echo "<td>"; print $row["subjectcode"]; echo"</td>";
		
	
        echo "<td>";  print $row["subjectname"];	echo"</td>";
        echo"<td>"; print $row["faculty"];
		echo "</td>";
		 echo "<td><a href='delete.php?id=" . $row['subid'] . "&amp;cls=3rd Year'>Delete</td>";
      echo "</tr>";
        }  } 
   echo "</tbody>
  </table>
    <button type='submit' class='btn btn-info' name='clas' value='3rda'>Add Subject</button>
  </form>";
  
  echo "
  <h2>SECTION B - 3rd YEAR</h2>
  <form action='faculty_add.php' method='post'>
  <table class='table table-striped '>
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Faculty Name</th>
		<th>Modify</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
         
		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='3rd Year Section B' ";
        $result = mysqli_query($conn,$query);
		$numrows = mysqli_num_rows($result);
		
		if($numrows==0)	
	    {
	
			echo "<td>"; 
			echo "No Data Added";
			}
        else{	
		
        while($row = $result->fetch_array()) {
			
		echo "<td>"; print $row["subjectcode"]; echo"</td>";
		
	
        echo "<td>";  print $row["subjectname"];	echo"</td>";
        echo"<td>"; print $row["faculty"];
		echo "</td>";
		 echo "<td><a href='delete.php?id=" . $row['subid'] . "&amp;cls=3rd Year'>Delete</td>";
      echo "</tr>";
        }  } 
   echo "</tbody>
  </table>
    <button type='submit' class='btn btn-info' name='clas' value='3rdb'>Add Subject</button>
  </form>
  </div>";	
		    }
			if($year=="4th Year")
			{
				echo "<div class='container'>
  <h2>SECTION A - 4th YEAR</h2>
  <form action='faculty_add.php' method='post'>
  <table class='table table-striped ' >
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Faculty Name</th>
		<th>Modify</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
         
		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='4th Year Section A' ";
        $result = mysqli_query($conn,$query);
		$numrows = mysqli_num_rows($result);
		
		if($numrows==0)	
	    {
	
			echo "<td>"; 
			echo "No Data Added";
			}
        else{	
		
        while($row = $result->fetch_array()) {
			
		echo "<td>"; print $row["subjectcode"]; echo"</td>";
		
	
        echo "<td>";  print $row["subjectname"];	echo"</td>";
        echo"<td>"; print $row["faculty"];
		echo "</td>";
		 echo "<td><a href='delete.php?id=" . $row['subid'] . "&amp;cls=4th Year'>Delete</td>";
      echo "</tr>";
        }  } 
   echo "</tbody>
  </table >
    <button type='submit' class='btn btn-info' name='clas' value='4tha'>Add Subject</button>
  </form>";
  
  echo "
  <h2>SECTION B - 4th YEAR</h2>
  <form action='faculty_add.php' method='post'>
  <table class='table table-striped '>
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Faculty Name</th>
		<th>Modify</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
         
		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='4th Year Section B' ";
        $result = mysqli_query($conn,$query);
		$numrows = mysqli_num_rows($result);
		
		if($numrows==0)	
	    {
	
			echo "<td>"; 
			echo "No Data Added";
			}
        else{	
		
        while($row = $result->fetch_array()) {
			
		echo "<td>"; print $row["subjectcode"]; echo"</td>";
		
	
        echo "<td>";  print $row["subjectname"];	echo"</td>";
        echo"<td>"; print $row["faculty"];
		echo "</td>";
		 echo "<td><a href='delete.php?id=" . $row['subid'] . "&amp;cls=4th Year'>Delete</td>";
      echo "</tr>";
        }  } 
   echo "</tbody>
  </table>
    <button type='submit' class='btn btn-info' name='clas' value='4thb'>Add Subject</button>
  </form>
  </div>";		
		    }
		}
		else{
			echo "<div class='container'>
    <h1  class='text-info'>Select Year</h1>      
    <p>Select Year to Display Subjects and Faculties.</p>
  </div>";
		}
	   
?>


 
 
</body>

 
</html>