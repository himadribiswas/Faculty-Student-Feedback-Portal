<!DOCTYPE html>
<html>
<title>Feedback</title>
<head>
<SCRIPT type="text/javascript">
window.history.forward();
function noBack() { window.history.forward(); }
</SCRIPT>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="css/jquery-2.2.3.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="css/logo.png" />

</head>
<body>
<?php
include "heading.php";
?>
<br><br><br><br><br><br>
<center>
<div class="alert alert-success">
   <h3> <strong>Success!</strong> You have successfully submitted the feedbacks.<h3>
  </div>
  <br><br>
  <form action="index.php" method="">
   <button type="submit" class="btn btn-warning btn-lg">Go back to Main Page</button>
   </form>
</center>
<div class="footer navbar-fixed-bottom navbar-inverse">
  <center> <font color="white">    <p class="text-uppercase"> © 2018. All Rights Reserved. &nbsp;|&nbsp; Faculty-Student Feedback Portal. &nbsp;|&nbsp; Developed by Himadri Biswas [RCCIIT ECE 2014-2018]</p></font </center>
    </div>
</body>
</html>