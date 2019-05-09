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
			}
		include "dbcon.php";	
		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='$class' ";
        $result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		
		$query1 = "SELECT * FROM `feedback`.`setup`";
        $result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_array($result1);
		
	
		
?>

<div class="container">
  <h3>Welcome to the Faculty Feedback Portal</h3>
            
 <h2>Instructions</h2>
  <div class="well"><?php echo ($row1["comment"]); ?></div>
  <form action="feedbackform.php" method="post"> 
  <input type="hidden"  id="sub"  name="sub" value="<?php echo $row["subid"]; ?>" >
  <?php if($row1["status"]=="disable")
  { ?>
  <button type="submit" name="clas" value="<?php echo $class; ?>" class="btn btn-success btn-lg" disabled data-toggle="tooltip" title="Please Contact Admin!">Start </button>
  <?php }
  else if($row1["status"]=="enable")
  { ?> 
<button type="submit" name="clas" value="<?php echo $class; ?>" class="btn btn-success btn-lg">Start </button>
  <?php } ?>
  </form>
</div>

</body>
</html>

