<?php
include "dbcon.php";


	   
?>

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
// AJAX call for autocomplete 
</SCRIPT>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../css/jquery-2.2.3.min.js"></script>
  <script src="../css/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="../css/logo.png" />
<style>
#faculty-list{float:left;list-style:none;margin-top:-3px;padding:0;width:340px;position: absolute;}
#faculty-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#faculty-list li:hover{background:#ece3d2;cursor: pointer;}
</style>
</head>
<body>
<?php
include "heading.php";

				
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
        <li><a href="editpass.php" data-toggle="tooltip" title="Edit Profile"><span class="glyphicon glyphicon-user"></span> <?php //echo $user; ?> </a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h2>Enter Subjects and their alloted Faculty Members</h2>
  <br><br><center>
  
  <?php
  if (isset($_POST['clas']))
			{
				
				$class = $_POST['clas'];
				if( $class=="1sta")	
					$class="1st Year Section A";
				if( $class=="1stb")	
					$class="1st Year Section B";
				if( $class=="2nda")	
					$class="2nd Year Section A";
				if( $class=="2ndb")	
					$class="2nd Year Section B";
				if( $class=="3rda")	
					$class="3rd Year Section A";
				if( $class=="3rdb")	
					$class="3rd Year Section B";
				if( $class=="4tha")	
					$class="4th Year Section A";
				if( $class=="4thb")	
					$class="4th Year Section B";
			}
			
			$class="1st Year Section A";
  ?>
  <h4 class="bg-danger ">Adding Subject to <?php echo $class; ?></h4></center><br>
  
  
  <form action="subjects.php" method="post" autocomplete="off">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Faculty Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><div class="form-group">
      <input type="text" class="form-control" id="sub_code" placeholder="Enter Subject Code" name="sub_code" required>
    <div id="suggesstion-box2"></div>
	</td>
        <td><div class="form-group">
      <input type="text" class="form-control" id="sub_name" placeholder="Enter Subject Name" name="sub_name" required>
    </div><div id="suggesstion-box1"></div></td>
        <td><div class="form-group">
      <input type="text" class="form-control" id="fac_name" placeholder="Enter Faculty Name" name="fac_name" required>
    </div></div><div id="suggesstion-box"></div></td>
      </tr>
       
    </tbody>
  </table>
   <input type="hidden"  id="class"  name="class" value="<?php echo $class; ?>" >
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
 
</div>
<div class="footer navbar-fixed-bottom navbar-inverse">
  <center> <font color="white">    <p class="text-uppercase"> © 2018. All Rights Reserved. &nbsp;|&nbsp; Faculty-Student Feedback Portal. &nbsp;|&nbsp; Developed by Himadri Biswas [RCCIIT ECE 2014-2018]</p></font </center>
    </div>
</body>
<SCRIPT type="text/javascript">

// AJAX call for autocomplete 
$(document).ready(function(){
	$("#fac_name").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readList.php",
		data:'keyword1='+$(this).val(),
		beforeSend: function(){
			$("#fac_name").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#fac_name").css("background","#FFF");
		}
		});
	});
});
//To select faculty name
function selectFaculty(val) {
$("#fac_name").val(val);
$("#suggesstion-box").hide();
}

$(document).ready(function(){
	$("#sub_name").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readList.php",
		data:'keyword2='+$(this).val(),
		beforeSend: function(){
			$("#sub_name").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box1").show();
			$("#suggesstion-box1").html(data);
			$("#sub_name").css("background","#FFF");
		}
		});
	});
});
//To select subject name
function selectSubject(val) {
var fields = val.split('&');
$("#sub_name").val(fields[0]);
$("#sub_code").val(fields[1]);
$("#suggesstion-box1").hide();
}

$(document).ready(function(){
	$("#sub_code").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readList.php",
		data:'keyword3='+$(this).val(),
		beforeSend: function(){
			$("#sub_code").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box2").show();
			$("#suggesstion-box2").html(data);
			$("#sub_code").css("background","#FFF");
		}
		});
	});
});
//To select subject code
function selectCode(val) {
var fields = val.split('&');
$("#sub_name").val(fields[0]);
$("#sub_code").val(fields[1]);
$("#suggesstion-box2").hide();
}

</SCRIPT>
</html>