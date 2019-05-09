
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faculty-Student Feedback Portal Installation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="css/jquery-2.2.3.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="css/logo.png" />
</head>
<body>
<div class="container-fluid">
  
  <div class="row">
    <div class="col-lg-12" style="background-color:lavender;"> <center> <h1>Faculty-Student Feedback Portal Installation</h1>      
  <p>Installation in progress..</p> </center>        
  </div>
   
  </div>
</div>
<div class="container">
  <h2>Enter Details</h2>
  <form action="install.php" method="post" name="baiscform">
    <div class="form-group">
      <label for="collg_name">College Name:</label>
      <input type="text" class="form-control" id="collg_name" placeholder="Enter College Name" name="collg_name" required>
    </div>
    <div class="form-group">
      <label for="dept">Department:</label>
      <input type="text" class="form-control" id="dept" placeholder="Enter Department" name="dept" required>
    </div>
     <div class="form-group">
      <label for="academic_session">Academic Session:</label>
      <input type="text" class="form-control" id="academic_session" placeholder="Enter Academic Session" name="academic_session" required>
    </div>
    <button type="submit" class="btn btn-success" name="baiscform">Submit</button>
  </form>
</div>

</body>
</html>
<?php
include "dbcon.php";


// Create database
$sql = "CREATE DATABASE IF NOT EXISTS `Feedback`";
if ($conn->query($sql) === TRUE) {
   // echo "Database Feedback created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

        $query = "CREATE TABLE IF NOT EXISTS `feedback`.`admin` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
		$result = mysqli_query($conn,$query);
		
	    $query = "CREATE TABLE IF NOT EXISTS `feedback`.`setup` ( `collgid` INT(5) AUTO_INCREMENT , `college` VARCHAR(255) NOT NULL , `department` VARCHAR(255) NOT NULL , `Session` VARCHAR(255) NOT NULL ,`comment` LONGTEXT NOT NULL,`status` VARCHAR(100) NOT NULL, PRIMARY KEY (`collgid`))";
        $result = mysqli_query($conn,$query);


		$query = "CREATE TABLE  IF NOT EXISTS `feedback`.`faculty` ( `id` INT NOT NULL AUTO_INCREMENT , `facultyname` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`))";
		$result = mysqli_query($conn,$query);
		$query = "CREATE TABLE  IF NOT EXISTS `feedback`.`paper` ( `id` INT NOT NULL AUTO_INCREMENT ,`papercode` VARCHAR(255) NOT NULL , `papername` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`))";
		$result = mysqli_query($conn,$query);
		
		$query = "CREATE TABLE `marks` (
  `marksid` int(11) NOT NULL,
  `facid` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		$result = mysqli_query($conn,$query);

   
		$query = "CREATE TABLE IF NOT EXISTS `feedback`.`subjects` ( `subid` INT NOT NULL AUTO_INCREMENT , `subjectcode` VARCHAR(15) NOT NULL , `subjectname` VARCHAR(255) NOT NULL , `faculty` VARCHAR(255) NOT NULL ,`class` VARCHAR(255) NOT NULL, PRIMARY KEY (`subid`)) ENGINE = InnoDB;";
		$result = mysqli_query($conn,$query);
			
			$query = "CREATE TABLE `subjects` (
			  `subid` int(11) NOT NULL,
			  `subjectcode` varchar(15) NOT NULL,
			  `subjectname` varchar(255) NOT NULL,
			  `faculty` varchar(255) NOT NULL,
			  `class` varchar(255) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			$result = mysqli_query($conn,$query);
			
			if (isset($_POST['collg_name']) && isset($_POST['dept']))
			{
				
				$collg_name = strtoupper($_POST['collg_name']);
				$dept = strtoupper($_POST['dept']);
				$academic_session = $_POST['academic_session'];
	
			$query = "INSERT INTO `feedback`.`setup` (`college`, `department`, `Session`,`comment`,`status`) VALUES ('$collg_name', '$dept', '$academic_session','1. Your identity is completely confidential and secured and even admin cannot check your identity. <br> 2. We expect genuine marks and comments which can help us to improve. <br> 3. Please donot enter the feedback more than once after you have submitted. <br />','disable');";	         
		
			$result = mysqli_query($conn,$query);
				if($result)
					header("location:install2.php");
			}	
		
	   
?>
<div class="footer navbar-fixed-bottom navbar-inverse">
  <center> <font color="white">    <p class="text-uppercase"> © 2018. All Rights Reserved. &nbsp;|&nbsp; Faculty-Student Feedback Portal. &nbsp;|&nbsp; Developed by Himadri Biswas [RCCIIT ECE 2014-2018]</p></font </center>
    </div>
</body>
<html>