<?php
session_start();
$connection=new PDO("mysql:host=localhost; dbname=education_db", "root", "");
if(!isset($_SESSION['user_exam']))
{
	header("Location:login.php");
	exit();
}else
{
	$email=$_SESSION['user_exam'];
	$score=$_SESSION['score'];
	$update=$connection->prepare("UPDATE `student_info` SET `course_score`='$score' WHERE `email`='$email'");
	$update->execute();
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Examination</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<!-- ####################################################################################################### -->
<div style="margin-left:380px">
<h2>UNIVERSITY OF NIGERIA, NSUKKA</br>
COMPUTER SCIENCE DEPARTMENT</br>
SEMESTER EXAMINATION SESSION RESULT</br>
</h2>
<div style="font-size:320px">
 <?php 
   if($_SESSION['score'])
    {
	   echo $_SESSION['score']."%"; 
	}
	 ?>
 </div>
 
 <h2><a href="logout_exam.php">LOGOUT</a></h2>
</div>
</body>
</html>
