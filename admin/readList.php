<?php
require_once("dbcon.php");
session_start();
if($_SESSION['login_user'])
 { 
$user=$_SESSION['login_user']; 
 }else
	{ header("location:check.php"); }

if(!empty($_POST["keyword1"])) {
$query ="SELECT * FROM `feedback`.`faculty`  WHERE facultyname like '" . $_POST["keyword1"] . "%' ORDER BY facultyname LIMIT 0,10";
$result = mysqli_query($conn,$query);	  
if(!empty($result)) {
?>
<ul id="faculty-list">
<?php
foreach($result as $faculty) {
?>
<li onClick="selectFaculty('<?php echo $faculty["facultyname"]; ?>');"><?php echo $faculty["facultyname"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>

<?php


if(!empty($_POST["keyword2"])) {
$query ="SELECT * FROM `feedback`.`paper`  WHERE papername like '" . $_POST["keyword2"] . "%' ORDER BY papername LIMIT 0,10";
$result = mysqli_query($conn,$query);	  
if(!empty($result)) {
?>
<ul id="faculty-list">
<?php
foreach($result as $paper) {
?>
<li onClick="selectSubject('<?php echo $paper["papername"]."&"; echo $paper["papercode"]; ?>');"><?php echo $paper["papername"]." [".$paper["papercode"]."]"; ?></li>
<?php } ?>
</ul>
<?php } } ?>


<?php


if(!empty($_POST["keyword3"])) {
$query ="SELECT * FROM `feedback`.`paper`  WHERE papercode like '" . $_POST["keyword3"] . "%' ORDER BY papercode LIMIT 0,10";
$result = mysqli_query($conn,$query);	  
if(!empty($result)) {
?>
<ul id="faculty-list">
<?php
foreach($result as $paper) {
?>
<li onClick="selectCode('<?php echo $paper["papername"]."&"; echo $paper["papercode"]; ?>');"><?php echo $paper["papercode"]." [".$paper["papername"]."]"; ?></li>
<?php } ?>
</ul>
<?php } } ?>