<?php
session_start();

$connection=new PDO("mysql:host=localhost; dbname=education_db", "root", "");
$select_lectures=$connection->prepare("SELECT * FROM lectures");
$select_lectures->execute();

$select_lectures2=$connection->prepare("SELECT * FROM lectures");
$select_lectures2->execute();


if(isset($_GET["file"])){
header("Content-Type: application/octet-stream");

$file = $_GET["file"]; //.".pdf";
header("Content-Disposition: attachment; filename=" . urlencode($file));   
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));
flush(); // this doesn't really matter.
$fp = fopen($file, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush(); // this is essential for large downloads
} 
fclose($fp); 
}


	
    $select_lectures=$connection->prepare("SELECT * FROM lectures");
    $select_lectures->execute();

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ABOUT US</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="../layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery.slidepanel.setup.js"></script>
</head>
<body>
  
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="../index.html">School Education</a></h1>
      <p></p>
    </div>
    <div id="topnav">
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li class="active"><a href="about.php">About</a></li>
        <li><a href="e-learning.php">E-Library</a></li>
        <li><a href="lecture.php">Staffs</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="breadcrumb">
    
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="content">
      <h1>POSTS </h1>
      <!--<img class="imgr" src="../images/demo/imgr.gif" alt="" width="125" height="125" />-->
      <p><?php
    while($fetch=$select_lectures->fetch()){
	$user=$fetch['staff_id'];
	$select_staff=$connection->prepare("SELECT * FROM staff_info WHERE `email`='$user'");
	$select_staff->execute();
	$fetch_staff=$select_staff->fetch();
	
echo "<div class='featured_box1'><a href='#'><img data-u='image' src='../pages/uploads/". $fetch_staff['image']."'alt='' class='img-indent'></a>
      <div class='floater'>
        <h2> ".$fetch['topic']."</h2>
        <p>".$fetch['intro']."</p>
        <p class='readmore'><a href='view_all_post.php?file=uploads/".$fetch['textbook']."'>Download</a></p>
		
      </div>
    </div><br/>";
}
?>

 </p>
     
    </div>
    <div id="column">
      <div class="subnav">
        <h2>DISCOVER THE DEPARTMENT</h2>
        <ul>
          <li><a href="message_from_head.php">Message from the Head</a></li>
          <li><a href="lecturer.php">Conte Lecture Series</a></li>
          <li><a href="mission.php">Mission</a></li>
          <li><a href="contact_us.php">Contact Us</a></li>
		
        </ul>
      </div>
      
    </div>
    <div class="clear"></div>
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