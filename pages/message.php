<?php
     if(!isset($_SESSION))
{
session_start();		
}

     $connection=new PDO("mysql:host=localhost; dbname=education_db","root", "");
	 
     if(isset($_GET['msg']))
	 {
		 $_SESSION['msg']=$_GET['msg'];
		 //$fetch_=$select_std->fetch();
	     //$fetch_['std_name'];
		 
	 }
	 if(isset($_POST['submit_post']))
	 {
		 $staff_email=$_SESSION['emai'];
		 $std_name=$_SESSION['name_std'];
		 $level=$_SESSION['std_level'];
		 $question=$_POST['question'];
		 $status="sent";
		 
         if($staff_email==null || $std_name==null|| $level==null ||$question==null)
		 {
		    echo "<script> alert('Please, Complete the field')</script>";	 
		 }
		 else
		 {
         //$user=$_SESSION['staff'];
		 $insert=$connection->prepare("INSERT into question_table(`staff_email`, `std_name`, `std_level`, `question`, `status`) VALUE('$staff_email', '$std_name', '$level', '$question', '$status')");
		 $insert->execute();
		 echo  "<script> alert('QUESTION WILL BE ATTENDED ONCE THE LECTURER IS ONLINE')</script>";	
		}
	 }
	 
	 
	$msg=$_SESSION['msg'];
		 $select_std=$connection->prepare("SELECT * FROM question_table WHERE `staff_email`='$msg'");
	     $select_std->execute();
		 
	
	 
	 ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Question</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="../layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery.slidepanel.setup.js"></script>
</head>
<body>
<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->


<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1>NUC</h1>
      <p>Networking the World</p>
    </div>
    <div id="topnav">
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="e-learning.php">E-Library</a></li>
        <li><a href="lecturer.php">Staffs</a></li>
        <li><a href="contact_us.php">Contact Us</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first"><h3 style="font-weight:bold">Staff Page</h3> <a href="staff_profile.php">NEW POST</a></li>
	  <span style="float:right; font-weight:bold"><h3><a href="logout.php"> logout</a></h3></span>
     </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container" style="color:#000">
    <?php
	     while($fetch=$select_std->fetch())
		 {
			 echo  "<a href='answer.php?ans=".$fetch['id']."'>Question asked by ".$fetch['std_name']." in ".$fetch['std_level']." level</a><br><br><br>";
		 }
	?>
	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>


  
  </div>
  
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="footer">
    <div class="footbox">
      <h2>ABOUT US:</h2>
      <ul>
        <li><a href="#">Mission Statement</a></li>
        <li><a href="#">History</a></li>
        <li><a href="#">Staff Directory</a></li>
        <li><a href="#">Directions</a></li>
        <li><a href="#">Photo Album</a></li>
        
      </ul>
    </div>
    <div class="footbox">
      <h2>ACADEMICES:</h2>
      <ul>
        <li><a href="#">Admission</a></li>
        <li><a href="#">Department</a></li>
        <li><a href="#">Classes & Homework</a></li>
        <li><a href="#">Guidance</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>STUDENTS:</h2>
      <ul>
        <li><a href="#">Student Tools</a></li>
        <li><a href="#">Forms</a></li>
        <li><a href="#">Programming</a></li>
        <li><a href="#">Student Handbook</a></li>
      </ul>
    </div>
   
    <div class="footbox last" style="width:220px">
        <h2>Contact Information: </h2>
		<ul>
            <li><span style="float:left"><img src="../images/demo/ico-phone.png" alt="" width="20" height="16" hspace="2" /></span> Phone:08076797607</li>
			<li><span style="float:left"><img src="../images/demo/ico-fax.png" alt="" width="20" height="16" hspace="2"  /></span> Fax:9586858665 </li>
                  <li><span style="float:left"><img src="../images/demo/ico-website.png" alt="" width="20" height="16" hspace="2"  /></span> Website: <a href="#">www.company.com</a></li>
                  <li><span style="float:left"><img src="../images/demo/ico-email.png" alt="" width="20" height="16" hspace="2"  /></span> Email: <a href="#">info@mycompany.com</a></li>
                  <li><span style="float:left"><img src="../images/demo/ico-twitter.png" alt="" width="20" height="16" hspace="3"  /></span> <a href="#">Follow</a> on Twitter</li>
        </ul>
	</div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">Uche</a></p>
    <p class="fl_right">Design by <a target="_blank" href="#" title="#">Uche</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
