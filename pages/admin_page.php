<?php
    if(!isset($_SESSION))
{
session_start();		
}
     $connection=new PDO("mysql:host=localhost; dbname=education_db","root", "");
	 
	 if(!isset($_SESSION['admin']))
   {
		header("Location:../../../index.php");
	    
    }else
	{

	 if(isset($_POST['remove_staff']))
	 {
		 $name=$_POST['staff'];
		 $delete=$connection->prepare("DELETE FROM staff_login WHERE `username`='$name'");
		 $delete->execute();
		 echo "<script>alert('Deletion was successful')</script>";
		 
	 }
	 $select_staff2=$connection->prepare("SELECT * FROM staff_login");
	 $select_staff2->execute();
	 
	 $select_staff=$connection->prepare("SELECT * FROM staff_login");
	 $select_staff->execute();
	 
	 
	 if(isset($_POST['submit'])){
		 $username=$_POST['username'];
		 $pass=sha1($_POST['password']);
		 $email=$_POST['email'];
		 $select=$connection->prepare("SELECT * FROM staff_login WHERE `username`='$username'");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num==0){
		 $insert=$connection->prepare("INSERT into staff_login(`username`, `password`, `email`) VALUE('$username', '$pass', '$email')");
		 $insert->execute();
		 }else
		 {
			 echo "<script>alert('Username already Exist')</script>";
		 }
		 
	 }
	} 
	 
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
        <li class="active"><a href="../index.php">Home</a></li>
        <li><a href="pages/about.php">About</a></li>
        <li><a href="e-learning.php">E-Library</a></li>
        <li><a href="#">Department and Lecturers</a></li>
        <li class="last"><a href="#">Contact Us</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first"><h3 style="font-weight:bold">Admin Page</h3><a href="staff_profile.php">&nbsp</a></li>
	  <span style="float:right; font-weight:bold"><h3><a href="logout.php"> logout</a></h3></span>
     </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container" style="color:#000">
    <form action="new_staff.php" method="POST">
<input type="submit" value="ADD NEW STAFF"/>
</form>

<!-- ####################################################################################################### -->
<br/><br/><br/>
<form action="edit_staff.php" method="POST" enctype="multipart/form-data">
Name of Staff:<select name="ed_staff">
                        <option> </option>
						<?php while($fetch=$select_staff->fetch())
						{
						       echo "<option>".$fetch['username']."</option></br>";
						}
						?>
						
                  </select>
<input type="submit" name="edit_staff" value="EDIT STAFF"/>
</form>

<!-- ####################################################################################################### -->
<br/><br/><br/>
<form action="admin_page.php" method="POST" enctype="multipart/form-data">
Name of Staff:<select name="staff">
                        <option> </option>
						<?php while($fetch2=$select_staff2->fetch())
						{
						       echo "<option>".$fetch2['username']."</option></br>";
						}
						?>
<input type="submit" name="remove_staff" value="REMOVE"/>
</form>
<br/><br/><br/>
<!-- ####################################################################################################### -->
  <form action="new_book.php" method="POST">
<input type="submit" value="ADD NEW BOOK TO LIBRARY"/>
</form>
<br/><br/><br/>

<!-- ####################################################################################################### -->
  <form action="add_course.php" method="POST" enctype="multipart/form-data">
  <input type="submit" value="ADD NEW COURSES"/>
</form>
<br/><br/><br/>

<!-- ####################################################################################################### -->
  <form action="add_time_table.php" method="POST" enctype="multipart/form-data">
  <input type="submit" value="ADD NEW TIME TABLE"/>
</form>
<br/><br/><br/>

<!-- ####################################################################################################### -->
  <form action="add_latest.php" method="POST" enctype="multipart/form-data">
  <input type="submit" value="ADD LATEST"/>
</form>

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
