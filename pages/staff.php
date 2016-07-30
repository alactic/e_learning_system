<?php
     if(!isset($_SESSION))
{
session_start();		
}
$connection=new PDO("mysql:host=localhost; dbname=education_db","root", "");
if(!isset($_SESSION['staff']))
   {
		header("Location:../index.php");
	    
    }else
	{
		 $select_staff=$connection->prepare("SELECT * FROM lectures");
		 $select_staff->execute();
		 
	 
	 if(isset($_POST['delete_post']))
	 {
		 $post=$_POST['post'];
		 $delete_post=$connection->prepare("DELETE FROM Lectures WHERE `topic`='$post'");
		 $delete_post->execute();
     }
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Staff Page</title>
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
      <li class="first"><h3 style="font-weight:bold">Staff Page</h3> &nbsp</li>
	 <!--<span style="float:right; font-weight:bold"><h3><a href="staff_bio.php"> MY PROFILE</a></h3></span>-->
	 <span style="float:right; font-weight:bold"><h3><a href="logout.php"> logout</a></h3></span>
     </ul>
	 
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container" style="color:#000; height:300px">
  <h4 style="float:right"><?php
                                $staff=$_SESSION['staff'];
								$select_std=$connection->prepare("SELECT * FROM question_table WHERE `staff_email`='$staff' AND `status`='sent'");
	                            $select_std->execute();
	                            $num=$select_std->rowCount();
								if($num>0)
								{
									echo "<a href='message.php?msg=$staff'>New Message</a>";
								}
								
                            ?></h4>
    <form action="new_post.php" method="POST">
<input type="submit" name="submit" value="NEW POST"/>
</form><br/><br/>

<form action="assignment.php" method="POST">
<input type="submit" name="submit" value="GIVE ASSIGNMENT"/>
</form><br/><br/>

<form action="answer2assign.php" method="POST">
<input type="submit" name="submit" value="SUBMITTED ASSIGNMENT"/>
</form><br/><br/>

<form action="score2answer.php" method="POST">
<input type="submit" name="submit" value="VIEW SCORE"/>
</form><br/><br/>


<!--<form action="staff.php" method="POST" enctype="multipart/form-data">
Edit Post:<select>
                 <option></option>
                  <?php 
				  echo $staff=$_SESSION['staff'];
				  $select_staff=$connection->prepare("SELECT * FROM lectures WHERE `staff_id`='$staff'");
	              $select_staff->execute();
				  while($fetch=$select_staff->fetch())
				  {
				    echo "<option>".$fetch['topic']."</option>";
				  }
				  ?>
                </select><br/>
<input type="submit" name="edit" value="EDIT"/>
</form><br/><br/>-->

<form action="staff.php" method="POST" enctype="multipart/form-data">
DELETE Post:<select name="post">
                 <option></option>
                  <?php 
				 echo  $staff=$_SESSION['staff'];
				  $select_staff=$connection->prepare("SELECT * FROM lectures WHERE `staff_id`='$staff'");
	              $select_staff->execute();
				  while($fetch=$select_staff->fetch())
				  {
				    echo "<option>".$fetch['topic']."</option>";
				  }
				  ?>
                </select><br/>
<input type="submit" name="delete_post" value="DELETE"/>
</form><br/><br/>

  
  
    <form action="staff_profile.php" method="POST">
<input type="submit" name="submit_profile" value="EDIT MY PROFILE"/>
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
