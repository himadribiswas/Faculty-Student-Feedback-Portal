<?php
include "dbcon.php";
if (isset($_POST['qtn1']) && isset($_POST['qtn2']))
			{
				$facid = $_POST['sub'];
				$qtn1 = $_POST['qtn1'];
				$qtn2 = $_POST['qtn2'];
				$qtn3 = $_POST['qtn3'];
				$qtn4 = $_POST['qtn4'];
				$qtn5 = $_POST['qtn5'];
				$qtn6 = $_POST['qtn6'];
				$qtn7 = $_POST['qtn7'];
				$qtn8 = $_POST['qtn8'];
				$qtn9 = $_POST['qtn9'];
		       $class = $_POST['class'];

				$date=date("Y/m/d");
				//echo $date;
        $query = "INSERT INTO `feedback`.`marks` (facid,q1,q2,q3,q4,q5,q6,q7,q8,q9,date) VALUES ('$facid','$qtn1','$qtn2','$qtn3','$qtn4','$qtn5','$qtn6','$qtn7','$qtn8','$qtn9','$date')";
        $result = mysqli_query($conn,$query);
			}

		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='$class' AND subid>'$facid'";
        $result = mysqli_query($conn,$query);
			$numrows = mysqli_num_rows($result);
			if($numrows==0)
			{
				header("location:thanks.php");
			}
		if($result){
           $row = mysqli_fetch_array($result);
		$k= $row["subid"];
        
		$query = "SELECT * FROM `feedback`.`subjects` WHERE class='$class' AND subid='$k'";
        $result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
	//	echo $row["class"]; 
		}
		
		
?>
 <form action="feedbackform.php" method="post"> 
 <input type="hidden"  id="sub"  name="sub" value="<?php echo $row["subid"]; ?>" >
  <button type="submit" id="clas" name="clas" value="<?php echo $row["class"]; ?>" class="btn btn-success btn-lg"> </button>
  </form>
  <script>
 window.onload=function() {
  document.getElementById("clas").click(); // using ID
}</script>