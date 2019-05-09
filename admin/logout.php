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
session_start();
if($_SESSION['login_user'])
 { 
$user=$_SESSION['login_user']; 
 }else
	{ header("location:check.php"); }

	//session_start();
		session_unset();
		session_destroy();
		echo "<h3 class='text-success'>Successfully Loged Out!</h3>";
		header("Refresh: 2; url=index.php");

			
?>
</center>
<div class="footer navbar-fixed-bottom navbar-inverse">
  <center> <font color="white">    <p class="text-uppercase"> © 2018. All Rights Reserved. &nbsp;|&nbsp; Faculty-Student Feedback Portal. &nbsp;|&nbsp; Developed by Himadri Biswas [RCCIIT ECE 2014-2018]</p></font </center>
    </div>
</body>
</head>