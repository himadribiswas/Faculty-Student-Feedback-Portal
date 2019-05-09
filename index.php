<!DOCTYPE html>
<html>
<title>Feedback</title>
<head>
<SCRIPT type="text/javascript">
//window.history.forward();
//function noBack() { window.history.forward(); }
</SCRIPT>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="css/jquery-2.2.3.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="css/logo.png" />
<style>
table {
   
    border-collapse: collapse;
    width: 95%;
	
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 6px;
}

tr:nth-child(even) {
    background-color: rgba(238,254,255,0.6);
}

</style>
</head>
<body>
<?php
include "heading.php";
?>
<br><br>
<div class="container">
  
  <p>Select you Class</p>     
<form action="welcome.php" method="post">  
  <table class="table table-bordered">
    
    <tbody>
      <tr>
        <td><button type="submit" class="btn btn-primary btn-block" name="clas" value="1st Year Section A">First Year Section A</button></td>
        <td><button type="submit" class="btn btn-primary btn-block" name="clas" value="1st Year Section B" >First Year Section B</button></td>
      </tr>
      <tr>
        <td><button type="submit" class="btn btn-primary btn-block" name="clas" value="2nd Year Section A">Second Year Section A</button></td>
        <td><button type="submit" class="btn btn-primary btn-block" name="clas" value="2nd Year Section B">Second Year Section B</button></td>
            </tr>
      <tr>
        <td><button type="submit" class="btn btn-primary btn-block" name="clas" value="3rd Year Section A">Third Year Section A</button></td>
        <td><button type="submit" class="btn btn-primary btn-block" name="clas" value="3rd Year Section B">Third Year Section B</button></td>
      </tr>
	   <tr>
        <td><button type="submit" class="btn btn-primary btn-block" name="clas" value="4th Year Section A">Fourth Year Section A</button></td>
        <td><button type="submit" class="btn btn-primary btn-block" name="clas" value="4th Year Section B">Fourth Year Section B</button></td>
      </tr>
    </tbody>
  </table>
  </form>
</div>
<div class="footer navbar-fixed-bottom navbar-inverse">
  <center> <font color="white">    <p class="text-uppercase"> © 2018. All Rights Reserved. &nbsp;|&nbsp; Faculty-Student Feedback Portal. &nbsp;|&nbsp; Developed by Himadri Biswas [RCCIIT ECE 2014-2018]</p></font </center>
    </div>
</body>
</html>