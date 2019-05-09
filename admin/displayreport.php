<!DOCTYPE html>
<html>
<title>Feedback</title>
<head>
<SCRIPT type="text/javascript">
//window.history.forward();
//function noBack() { window.history.forward(); } 
</SCRIPT>
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
if(!empty($_GET['id']))
   {
	   $fname=$_GET['id'];
?>
<div class="container">
<h2>Feedback Report  </h2>
  <p>Complete Report of the Faculty:</p> 
  <button type="button" class="btn btn-warning col-md-offset-0" onclick="window.history.go(-1);">Go back</button>
  <center> <h2 class="text-info"> <?php echo $fname; ?> </h2></center>
 
<?php  

echo "<form method='post' action='downreport.php' target='_blank'>";?>

		<input type="hidden"  name="fname" value="<?php echo $fname ?>"><?php
echo "<button type='submit' class='btn btn-info'>Download/Print List</button>
 <form><br><br>";
print '<table class="table table-striped table-bordered">';
print '<thead>';
print '<tr bgcolor="#eaf5fb">';
print '<th>Paper Code</th>';
print '<th>Class</th>';
print '<th>Punctuality in taking classes/ Labs</th>';
print '<th>Deep Knowledge of Subject & its trends</th>';
print '<th>Clear ORAL communi- cation, asking questions</th>';
print '<th>Proper use of Chalkboard /OHP /PPT /Models /Charts</th>';
print '<th>Appropriate Teaching Speed, loudness, & matching body language</th>';
print '<th>Derivations, Tutorial Sheets/ Problem Solving/ Case studies/ Class seminars</th>';
print '<th>Guidance in Tutorials/ Labs/ Assignments/ Demonstrations/ Papers solving/ Project Work</th>';
print '<th>Home/ Library assignments forself-learning</th>';
print '<th>Total Score</th>';
print '</tr>';
print '</thead>';
print '<tbody>';
				$total=0;$c=0;$qtt1=0;$qtt2=0;$qtt3=0;$qtt4=0;$qtt5=0;$qtt6=0;$qtt7=0;$qtt8=0;
                $query1 = "SELECT * FROM `feedback`.`subjects` WHERE faculty='$fname'";
                $result1 = mysqli_query($conn,$query1);
				//$row1=mysqli_fetch_array($result1);
		while($row = $result1->fetch_array()) {
			    $fid=$row["subid"];
				
				$query2 = "SELECT COUNT(q1) AS total_students FROM `feedback`.`marks` WHERE facid='$fid'";
				$result2 = mysqli_query($conn,$query2);
				$r1 = mysqli_fetch_assoc($result2); 
				$count = $r1['total_students'];
				if($count!=0)
				{
				
				$query = "SELECT SUM(q1) AS q1_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q1sum = $r['q1_sum'];
				$query = "SELECT SUM(q2) AS q2_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q2sum = $r['q2_sum'];
				$query = "SELECT SUM(q3) AS q3_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q3sum = $r['q3_sum'];
				$query = "SELECT SUM(q4) AS q4_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q4sum = $r['q4_sum'];
				$query = "SELECT SUM(q5) AS q5_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q5sum = $r['q5_sum'];
				$query = "SELECT SUM(q6) AS q6_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q6sum = $r['q6_sum'];
				$query = "SELECT SUM(q7) AS q7_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q7sum = $r['q7_sum'];
				$query = "SELECT SUM(q8) AS q8_sum FROM `feedback`.`marks` WHERE facid='$fid'";
				$result = mysqli_query($conn,$query);
				$r = mysqli_fetch_assoc($result); 
				$q8sum = $r['q8_sum'];
				
$qt1=0;$qt2=0;$qt3=0;$qt4=0;$qt5=0;$qt6=0;$qt7=0;$qt8=0;
    print '<tr>';
	print '<td>'.$row["subjectcode"].'</td>';
	print '<td>'.$row["class"].'</td>';
 print '<td>'.round($q1sum/$count).'</td>';
		$qt1=$qt1+($q1sum/$count);
		$qtt1=$qtt1+$qt1;
    print '<td>'.round($q2sum/$count).'</td>';
		$qt2=$qt2+($q2sum/$count);
		$qtt2=$qtt2+$qt2;
    print '<td>'.round($q3sum/$count).'</td>';
		$qt3=$qt3+($q3sum/$count);
		$qtt3=$qtt3+$qt3;
	print '<td>'.round($q4sum/$count).'</td>';
		$qt4=$qt4+($q4sum/$count);
		$qtt4=$qtt4+$qt4;
	print '<td>'.round($q5sum/$count).'</td>';
		$qt5=$qt5+($q5sum/$count);
		$qtt5=$qtt5+$qt5;
	print '<td>'.round($q6sum/$count).'</td>';
		$qt6=$qt6+($q6sum/$count);
		$qtt6=$qtt6+$qt6;
	print '<td>'.round($q7sum/$count).'</td>';
		$qt7=$qt7+($q7sum/$count);
		$qtt7=$qtt7+$qt7;
	print '<td>'.round($q8sum/$count).'</td>';
		$qt8=$qt8+($q8sum/$count);
		$qtt8=$qtt8+$qt8;
		$t=round(($qt1+$qt2+$qt3+$qt4+$qt5+$qt6+$qt7+$qt8)/8);
		$total=$total+$t;$c++;
		if($t<45)
		{print '<td class="text-danger font-weight-bold">'.$t.'</td>';}
	    else if($t>=45 && $t<=60)
	    { print '<td class="text-warning font-weight-bold">'.$t.'</td>';}
	  else if($t>60 && $t<75)
	  {  print '<td class="text-info font-weight-bold">'.$t.'</td>';}
	  else if($t>=75)
	  { print '<td class="text-success font-weight-bold">'.$t.'</td>';}
    print '</tr>';
		}
		
		}
if($count!=0)
{
?>
<tr >
<td colspan="2" align="center"><b>Total</b></td>
<td align="center"><b><?php echo round($qtt1/$c); ?></b></td>
<td align="center"><b><?php echo round($qtt2/$c); ?></b></td>
<td align="center"><b><?php echo round($qtt3/$c); ?></b></td>
<td align="center"><b><?php echo round($qtt4/$c); ?></b></td>
<td align="center"><b><?php echo round($qtt5/$c); ?></b></td>
<td align="center"><b><?php echo round($qtt6/$c); ?></b></td>
<td align="center"><b><?php echo round($qtt7/$c); ?></b></td>
<td align="center"><b><?php echo round($qtt8/$c); ?></b></td>
<?php
if(round($total/$c)<45)
		{print '<td class="text-danger"><b>'.round($total/$c).'</b></td>';}
	    else if(round($total/$c)>=45 && round($total/$c)<=60)
	    { print '<td class="text-warning"><b>'.round($total/$c).'</b></td>';}
	  else if(round($total/$c)>60 && round($total/$c)<75)
	  {  print '<td class="text-info"><b>'.round($total/$c).'</b></td>';}
	  else if(round($total/$c)>=75)
	  { print '<td class="text-success"><b>'.round($total/$c).'</b></td>';}
  //<td align="center"><b><?php echo round($total/$c); </b></td>
 // echo $fname;
 	
}
?>

</tbody>
</table>

   

<?php echo "<p  style='float: left;' class='text-success font-weight-bold'>More than 75% = Good Recomendation! &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    </p>
  <p  style='float: left;' class='text-info font-weight-bold'>61% - 75% = Grooming on specific criteria! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     </p>
  <p  style='float: left;' class='text-warning font-weight-bold'>45% - 60% = Grooming on specific criteria!</p>
  <p  style='float: left;' class='text-danger font-weight-bold'>Less than 45 % = Teaching practice on specific criteria with video feedback!</p>";
	}//numrows} ?>
	


</body>
</html>