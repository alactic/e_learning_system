<?php
     if(!isset($_SESSION))
{
session_start();		
}

     $connection=new PDO("mysql:host=localhost; dbname=education_db","root", "");
	 
     if(isset($_GET['assign']))
	 {
		 $_SESSION['id']=$_GET['assign'];
		 
	 }
	 
	$id=$_SESSION['id'];
	$level=$_SESSION['level'];
	$select_std=$connection->prepare("SELECT * FROM assignment WHERE `id`='$id'");
	$select_std->execute();
	
	if(isset($_POST['submit']))
	{
		$answer=$_POST['assignment'];
		$select_ass=$connection->prepare("SELECT * FROM assignment WHERE `id`='$id'");
	    $select_ass->execute();
		$fetch_ass=$select_ass->fetch();
		$staff_id=$fetch_ass['staff_id'];
		$level=$fetch_ass['level'];
		$regno=$_SESSION['regno'];
		$topic=$fetch_ass['topic'];
		
		if($answer==null)
		{
			echo  "<script> alert('PLEASE, THE FIELD IS EMPTY')</script>";
		}else
		{
		$select_check=$connection->prepare("SELECT * FROM answer WHERE `level`='$level' AND `regno`='$regno' AND `topic`='$topic' ");
	    $select_check->execute();
		$num=$select_check->rowCount();
		if($num==0)
		{
			$insert=$connection->prepare("INSERT INTO answer(`staff_id`, `regno`, `level`, `answer`, `topic`) VALUE('$staff_id', '$regno', '$level', '$answer', '$topic')");
		    $insert->execute();
			$update=$connection->prepare("UPDATE `assignment` SET `submitted`='YES' WHERE `id`='$id'");
	             $update->execute();
			echo  "<script> alert('ASSIGNMENT SUBMISSION WAS SUCCESSFUL')</script>";
		}else
		{
			echo  "<script> alert('SORRY, YOUR ASSIGNMENT HAD BEEN SUBMITTED BEFORE')</script>";
		}
		
		
		
		
	}
	
	}
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
      <li class="first"><h3 style="font-weight:bold">Question Page</h3> <a href="staff_profile.php">&nbsp;</a></li>
	  <span style="float:right; font-weight:bold"><h3><a href="logout.php"> logout</a></h3></span>
     </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="containe" style="color:#000;margin-left:100px">
   
    <?php
	
	     while($fetch=$select_std->fetch())
		 {
			 echo  "
			 </br></br>
			 <h5>ASSIGNMENT: </h5>
			 <table border='1' style='width:500px;'>
			 <tr>
			 <td>
			 ".$fetch['assignment']."</br>
			 </td>
		   </tr>
           </table>
		   </br></br>
		      <h5> </h5>
					   <br><br><br></br></br></br></br>";
		 }
		 
	?>
	
	<form action="std_assign.php" method="POST" enctype="multipart/form-data">
Answer:<br/><textarea type="text" name="assignment" rows="7" cols="60" maxlength="400"></textarea></br></br>
<input type="submit" name="submit" value="SUBMIT ASSIGNMENT"/>
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
