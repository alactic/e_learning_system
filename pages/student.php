<?php
if(!isset($_SESSION))
{
session_start();
}
     $connection=new PDO("mysql:host=localhost; dbname=education_db","root", "");
	 
	 /*if(!isset($_SESSION['admin']))
   {
		header("Location:../index.php");
	    
    }else
	{*/
	 
	 if(isset($_POST['submit'])){
		 $firstname=$_POST['fname'];
		 $middlename=$_POST['mname'];
		 $lastname=$_POST['lname'];
		 $regno=$_POST['regno'];
		 $level=$_POST['level'];
		 $gender=$_POST['gender'];
		 $email=$_POST['email'];
		 $password=$_POST['password'];
		     $insert=$connection->prepare("INSERT into student_info(`firstname`, `middlename`, `lastname`, `regno`, `level`, `gender`, `email`, `password`)
                            			 VALUE('$firstname', '$middlename', '$lastname', '$regno', '$level', '$gender', '$email', '$password')");
		     $insert->execute();
			 header("Location:student.php");
			 exit();
		 }
	//}		 
	 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin Page</title>
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
      <h1><a href="../index.html">Uche</a></h1>
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
      <li class="first"><h3 style="font-weight:bold">Admin Page</h3>&nbsp</li>
	  <span style="float:right; font-weight:bold"><h3><a href="logout.php"> logout</a></h3></span>
     </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container" style="color:#000">
    <form action="student.php" method="POST" enctype="multipart/form-data">
FIRST NAME:</br><input type="text" name="fname" size="50"  placeholder="Enter First Name"/></br></br>
MIDDLE NAME:</br><input type="text" name="mname" size="50" placeholder="Enter Second Name"/></br></br>
LAST NAME:</br><input type="text" name="lname" size="50" placeholder="Enter Last Name"/></br></br>
REGISTRATION NUMBER:</br><input type="text" name="regno" size="50" placeholder="Enter Reg. No"/></br></br>
GENDER:</br><select name="gender">
           <option></option>
		   <option>MALE</option>
		   <option>FEMALE</option>
		   </select></br></br>
LEVEL:</br><select name="level">
           <option></option>
		   <option>100</option>
		   <option>200</option>
		   <option>300</option>
		   <option>400</option>
		   </select></br></br>
EMAIL:</br><input type="text" name="email" size="50" placeholder="Enter email"/></br></br>
PASSWORD:</br><input type="text" name="password" size="50" placeholder="Enter Password"/></br></br>
CONFIRM PASSWORD:</br><input type="text" name="confirm_password" size="50" placeholder="Enter Password"/></br></br>
<input type="submit" name="submit" value="SUBMIT"/>
</form>

<!-- ####################################################################################################### -->
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Uche</a></p>
    <p class="fl_right">Design by <a target="_blank" href="#" title="#">Uche</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
