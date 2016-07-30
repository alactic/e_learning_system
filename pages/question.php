<?php
     if(!isset($_SESSION))
{
session_start();		
}

     $connection=new PDO("mysql:host=localhost; dbname=education_db","root", "");
	 
     if(isset($_GET['ask']))
	 {
		 $ask=$_GET['ask'];
		 $_SESSION['emai']=$ask;
		 $select_std=$connection->prepare("SELECT * FROM staff_info WHERE `email`='$ask'");
	     $select_std->execute();
		 $fetch_=$select_std->fetch();
	     $_SESSION['name']=$fetch_['name'];
		 
	 }
	 if(isset($_POST['submit_post']))
	 {
		 $staff_email=$_SESSION['emai'];
		 $std_email=$_SESSION['std_user'];
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
		 $insert=$connection->prepare("INSERT into question_table(`staff_email`,`std_email`, `std_name`, `std_level`, `question`, `status`, `seen`)
                        		 VALUE('$staff_email','$std_email', '$std_name', '$level', '$question', '$status', 'NO')");
		 $insert->execute();
		 echo  "<script> alert('QUESTION WILL BE ATTENDED ONCE THE LECTURER IS ONLINE')</script>";	
		 header("Location:../class.php");
	     exit();
		}
	 }
	$user=$_SESSION['std_user'];
	$select_std=$connection->prepare("SELECT * FROM student_info WHERE `email`='$user'");
	$select_std->execute();
	$fetch=$select_std->fetch();
	
	
	
	 
	 ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>POST Page</title>
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
         <?php if (isset($_SESSION['std_user']))
	  {
		  echo "<li><a href='../class.php'>Home</a></li>";
	  }else
	  {
		  echo "<li><a href='../index.php'>Home</a></li>";
	  }
	  
	  ?>
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
    <form action="question.php" method="POST" enctype="multipart/form-data">
NAME OF LECTURER:&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['name']; ?></br></br>
STUDENT'S NAME:&nbsp;&nbsp;&nbsp;<?php $_SESSION['name_std']= $fetch['firstname']." ".$fetch['middlename']." ".$fetch['lastname'];
                                      echo $fetch['firstname']." ".$fetch['middlename']." ".$fetch['lastname']; ?></br></br>
STUDENT'S LEVEL:&nbsp;&nbsp;&nbsp;<?php $_SESSION['std_level']= $fetch['level'];
                                       echo $fetch['level']; ?></br></br>
QUESTION:<br/><textarea type="text" name="question" rows="7" cols="60" maxlength="400"></textarea></br></br>
<input type="submit" name="submit_post" value="SUBMIT"/>
</form><br/><br/>


  
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
