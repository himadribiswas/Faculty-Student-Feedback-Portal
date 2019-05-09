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


<?php
if (isset($_POST['clas']))
			{
				$class = $_POST['clas'];
				$sub = $_POST['sub'];
			}
			else 
			{	header("location:index.php");}
		//	echo $class;
include "dbcon.php";


//while($numrows!=0)
//{
	$query = "SELECT * FROM `feedback`.`subjects` WHERE class='$class' AND subid='$sub' ";
        $result = mysqli_query($conn,$query);
		$numrows = mysqli_num_rows($result);

		$row = mysqli_fetch_array($result);
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3" style="background-color:lavenderblush;"><h4>Class: <?php echo $class; ?></h4></div>
<div class="col-sm-2" style="background-color:lavenderblush;"><h4>Subject Code: <?php echo $row["subjectcode"]; ?></h4></div>
    <div class="col-sm-4" style="background-color:lavenderblush;"><h4>Subject Name:<?php echo $row["subjectname"]; ?></h4></div>
	<div class="col-sm-3" style="background-color:lavenderblush;"><h4>Faculty Name: <?php echo $row["faculty"]; ?></h4></div>
  </div>
</div>
<center>
<br><br>

<form action="feedbacksubmit.php" name="MyForm" method="post" id="feedback" >
						 
	<table>
  <tr bgcolor="#B4FAFF">
    <th>Teaching Aspects</th>
    <th>Excellent<br>(80-100%)</th>
    <th>Good<br>(60-79%)</th>
	<th>Average<br>(40-79%)</th>
	<th>Below Average<br>(0-39%)</th>
  </tr>
  <tr>
    <td>1. Punctuality in  taking classes/Labs</td>
    <td><div>
            <input id="radio-1" class="radio-custom" name="qtn1" value="90" type="radio" required >
            <label for="radio-1" class="radio-custom-label"></label>
        </div></td>
    <td><div>
            <input id="radio-2" class="radio-custom" name="qtn1" value="70" type="radio">
            <label for="radio-2" class="radio-custom-label"></label></div> </td>
	<td><div>
            <input id="radio-3" class="radio-custom" name="qtn1" value="50" type="radio">
            <label for="radio-3" class="radio-custom-label"></label></div></td>
	<td><div>
            <input id="radio-4" class="radio-custom" name="qtn1" value="40" type="radio">
            <label for="radio-4" class="radio-custom-label"></label></div> </td>
  </tr>
  <tr>
    <td>2. Deep Knowledge of   Subject& its trends</td>
    <td><div>
            <input id="radio-5" class="radio-custom" name="qtn2" value="90" type="radio" required>
            <label for="radio-5" class="radio-custom-label"></label>
        </div></td>
    <td><div>
            <input id="radio-6" class="radio-custom" name="qtn2" value="70" type="radio">
            <label for="radio-6" class="radio-custom-label"></label></div> </td>
	<td><div>
            <input id="radio-7" class="radio-custom" name="qtn2" value="50" type="radio">
            <label for="radio-7" class="radio-custom-label"></label></div></td>
	<td><div>
            <input id="radio-8" class="radio-custom" name="qtn2" value="40" type="radio">
            <label for="radio-8" class="radio-custom-label"></label></div> </td>
  </tr>
  <tr>
    <td>3. Clear ORAL communication,  asking questions</td>
   <td><div>
            <input id="radio-9" class="radio-custom" name="qtn3" value="90" type="radio" required>
            <label for="radio-9" class="radio-custom-label"></label>
        </div></td>
    <td><div>
            <input id="radio-10" class="radio-custom" name="qtn3" value="70" type="radio">
            <label for="radio-10" class="radio-custom-label"></label></div> </td>
	<td><div>
            <input id="radio-11" class="radio-custom" name="qtn3" value="50" type="radio">
            <label for="radio-11" class="radio-custom-label"></label></div></td>
	<td><div>
            <input id="radio-12" class="radio-custom" name="qtn3" value="40" type="radio">
            <label for="radio-12" class="radio-custom-label"></label></div> </td>
  </tr>
  <tr>
    <td>4. Proper use of Chalkboard / OHP/ PPT/ Models/ Charts</td>
  <td><div>
            <input id="radio-13" class="radio-custom" name="qtn4" value="90" type="radio" required>
            <label for="radio-13" class="radio-custom-label"></label>
        </div></td>
    <td><div>
            <input id="radio-14" class="radio-custom" name="qtn4" value="70" type="radio" >
            <label for="radio-14" class="radio-custom-label"></label></div> </td>
	<td><div>
            <input id="radio-15" class="radio-custom" name="qtn4" value="50" type="radio">
            <label for="radio-15" class="radio-custom-label"></label></div></td>
	<td><div>
            <input id="radio-16" class="radio-custom" name="qtn4" value="40" type="radio">
            <label for="radio-16" class="radio-custom-label"></label></div> </td>
  </tr>
  <tr>
    <td>5. Appropriate Teaching Speed, loudness and matching body language</td>
    <td><div>
            <input id="radio-17" class="radio-custom" name="qtn5" value="90" type="radio" required>
            <label for="radio-17" class="radio-custom-label"></label>
        </div></td>
    <td><div>
            <input id="radio-18" class="radio-custom" name="qtn5" value="70" type="radio">
            <label for="radio-18" class="radio-custom-label"></label></div> </td>
	<td><div>
            <input id="radio-19" class="radio-custom" name="qtn5" value="50" type="radio">
            <label for="radio-19" class="radio-custom-label"></label></div></td>
	<td><div>
            <input id="radio-20" class="radio-custom" name="qtn5" value="40" type="radio">
            <label for="radio-20" class="radio-custom-label"></label></div> </td>
  </tr>
  <tr>
    <td>6. Derivations, Tutorial Sheets /Problem Solving  / Case studies/ Class seminars</td>
   <td><div>
            <input id="radio-21" class="radio-custom" name="qtn6" value="90" type="radio" required>
            <label for="radio-21" class="radio-custom-label"></label>
        </div></td>
    <td><div>
            <input id="radio-22" class="radio-custom" name="qtn6" value="70" type="radio">
            <label for="radio-22" class="radio-custom-label"></label></div> </td>
	<td><div>
            <input id="radio-23" class="radio-custom" name="qtn6" value="50" type="radio">
            <label for="radio-23" class="radio-custom-label"></label></div></td>
	<td><div>
            <input id="radio-24" class="radio-custom" name="qtn6" value="40" type="radio">
            <label for="radio-24" class="radio-custom-label"></label></div> </td>
  </tr>
  <tr>
    <td>7. Guidance in Tutorials/ Labs/  Assignments/ Demonstrations/Papers solving /  Project Work</td>
    <td><div>
            <input id="radio-25" class="radio-custom" name="qtn7" value="90" type="radio" required>
            <label for="radio-25" class="radio-custom-label"></label>
        </div></td>
    <td><div>
            <input id="radio-26" class="radio-custom" name="qtn7" value="70" type="radio">
            <label for="radio-26" class="radio-custom-label"></label></div> </td>
	<td><div>
            <input id="radio-27" class="radio-custom" name="qtn7" value="50" type="radio">
            <label for="radio-27" class="radio-custom-label"></label></div></td>
	<td><div>
            <input id="radio-28" class="radio-custom" name="qtn7" value="40" type="radio">
            <label for="radio-28" class="radio-custom-label"></label></div> </td>
  </tr>
  <tr>
    <td>8. Home / Library assignments for self-learning</td>
   <td><div>
            <input id="radio-29" class="radio-custom" name="qtn8" value="90" type="radio" required>
            <label for="radio-29" class="radio-custom-label"></label>
        </div></td>
    <td><div>
            <input id="radio-30" class="radio-custom" name="qtn8" value="70" type="radio">
            <label for="radio-30" class="radio-custom-label"></label></div> </td>
	<td><div>
            <input id="radio-31" class="radio-custom" name="qtn8" value="50" type="radio">
            <label for="radio-31" class="radio-custom-label"></label></div></td>
	<td><div>
            <input id="radio-40" class="radio-custom" name="qtn8" value="40" type="radio">
            <label for="radio-40" class="radio-custom-label"></label></div> </td>
  </tr>
  <td>9. Overall General Comments</td>
   <td colspan =4> <input type="text" size="70" name="qtn9" id="qtn9" placeholder="Your Valuable Comments"></td>
		
  </tr>
</table>

<input type="hidden"  id="sub"  name="sub" value="<?php echo $row["subid"]; ?>" >
<input type="hidden"  id="class"  name="class" value="<?php echo $class; ?>" >
		<br>
			 <input class="btn btn-success" type="submit" name="MyForm" value="Next" />
			
</form>


<br>
</center>

</body>
</html>

