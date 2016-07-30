<?php
session_start();

$level=$_SESSION['level'];
$connection=new PDO("mysql:host=localhost; dbname=education_db", "root", "");

if(!isset($_SESSION['std_user']))
{
	header("Location:index.php");
	exit();
}else
{
$select_lectures=$connection->prepare("SELECT * FROM lectures WHERE `level`='$level'");
$select_lectures->execute();

$select_lectures2=$connection->prepare("SELECT * FROM lectures WHERE `level`='$level'");
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

if(isset($_POST['std_login'])){
	echo $username=$_POST['std_user'];
	echo $password=$_POST['std_pass'];
	$select_staff=$connection->prepare("SELECT * FROM student_info WHERE `email`='$username' and `password`='$password'");
	$select_staff->execute();
	$fetch_staff= $select_staff->rowCount();
	if($fetch_staff>=1){
		$_SESSION['student']=$username;
		header("Location:/education/pages/student.php");
	}else{
		echo "<script>alert('INCORRECT USERNAME or PASSWORD')</script>";
	}
}


if(isset($_POST['staff_login'])){
	$username=$_POST['staff_user'];
	$password=sha1($_POST['staff_pass']);
	$select_staff=$connection->prepare("SELECT * FROM staff_login WHERE `email`='$username' and `password`='$password'");
	$select_staff->execute();
	$fetch_staff= $select_staff->rowCount();
	if($fetch_staff==1){
		$_SESSION['staff']=$username;
		header("Location:/education/pages/staff.php");
	}else{
		echo "<script>alert('INCORRECT USERNAME or PASSWORD')</script>";
	}
}

if(isset($_POST['admin_login'])){
	$username=$_POST['admin_user'];
	$password=$_POST['admin_pass'];
	$select_staff=$connection->prepare("SELECT * FROM admin_login WHERE `username`='$username' and `password`='$password'");
	$select_staff->execute();
	$fetch_staff= $select_staff->rowCount();
	if($fetch_staff==1){
		$_SESSION['admin']=$username;
		header("Location:/education/pages/admin_page.php");
	}else{
		echo "<script>alert('INCORRECT USERNAME or PASSWORD')</script>";
	}
}
$level=$_SESSION['level'];
         $std_email=$_SESSION['std_user'];
		  
         $select_latest=$connection->prepare("SELECT * FROM latest");
		 $select_latest->execute();
		 $fetch_latest=$select_latest->fetch();
		 
		 $select_std=$connection->prepare("SELECT * FROM question_table WHERE `status`='answered' AND `std_email`='$std_email' AND `seen`='NO' ");
	     $select_std->execute();
	     $fetch=$select_std->fetch();
		 $num_std=$select_std->rowCount();
		 
		 
		 $select_ass=$connection->prepare("SELECT * FROM assignment WHERE `level`='$level' AND `submitted`='NO' AND `submit_status`='open'");
	     $select_ass->execute();
	     $fetch_ass=$select_ass->fetch();
		 $num_ass=$select_ass->rowCount();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
desrrkrll4 Name: School Education
Author: <a href="http://www.os-desrrkrll4s.com/">OS desrrkrll4s</a>
Author URI: http://www.os-desrrkrll4s.com/
Licence: Free to use under our free desrrkrll4 licence terms
Licence URI: http://www.os-desrrkrll4s.com/desrrkrll4-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>School Education</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<!-- Homepage Only Scripts -->
<script type="text/javascript" src="layout/scripts/jquery.cycle.min.js"></script>
<script type="text/javascript">
$(function() {
    $('#featured_slide').after('<div id="fsn"><ul id="fs_pagination">').cycle({
        timeout: 5000,
        fx: 'fade',
        <!--pager: '#fs_pagination',-->
        pause: 1,
        pauseOnPagerHover: 0
    });
});
</script>

<!-- End Homepage Only Scripts -->
</head>
<body>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="index.html">NUE</a></h1>
      <p>Networking the World</p>
    </div>
    <div id="topnav">
      <ul>
        <li class="active"><a href="#">Home</a></li>
        <li><a href="pages/about.php">About</a></li>
        <li><a href="./pages/e-learning.php">E-Library</a></li>
        <li><a href="pages/lecturer.php">Staff</a></li>
        <li><a href="pages/contact_us.php">Contact Us</a></li>
      </ul>
	  <span style="float:right; margin-right:-150px;margin-top:-40px; font-weight:bold"><a href="/education/pages/logout.php" style="color:#E50B0B"> logout</a></br>
	     notification
	  
	  <?php 
	     $user=$_SESSION['std_user'];
	     if($num_std>0){echo "<a href='/education/pages/std_answer.php?std_msg=$user'>
		 <img data-u='image' src='/education/images/demo/ico-email.png' width=30px; height=20px; alt='' class='img-indent'></a>";}
		 	 
	     if($num_ass>0){echo "<a href='/education/pages/std_question.php' style='float:right; margin-top:-20px'>
		 <img data-u='image' src='/education/images/demo/assignment.jpg' width=30px; height=20px; alt='' class='img-indent'></a>";}
		 ?>
		 </span>
    </div>
	
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
<div id='featured_slide'>
<?php
while($fetch=$select_lectures->fetch()){
	$user=$fetch['staff_id'];
	$select_staff=$connection->prepare("SELECT * FROM staff_info WHERE `staff_id`='$user'");
	$select_staff->execute();
	$fetch_staff=$select_staff->fetch();
	
	$select_dp=$connection->prepare("SELECT * FROM staff_info WHERE `email`='$user'");
	$select_dp->execute();
	$fetch_dp=$select_dp->fetch();
	$_SESSION['name']=$fetch_dp['name'];
	$_SESSION['email']=$fetch_dp['email'];
	$_SESSION['topic']=$fetch['topic'];
	$id=$_SESSION['email'];
	
	
echo "<div class='featured_box'><a href='#'><img data-u='image' src='pages/uploads/". $fetch_dp['image']."' width=150px; height=100px; alt='' class='img-indent'></a>
      <div class='floater'>
        <h2>".$fetch['topic']."</h2>
        <p>".$fetch['intro']."</p>
        <p class='readmore'><a href='index.php?file=pages/uploads/".$fetch['textbook']."'>Download</a></p>
		<p class='readmore'><a href='/education/pages/question.php?ask=$id'>Ask Question</a></p>
		
      </div>
    </div>";
}
?>
   
  </div>
 <!-- <h6 style="float:right; margin-top:-20px; margin-right:10px"><a href="pages/view_all_post.php">VIEW OLD POSTS</a></h6>-->
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="homecontent" style="width:1300px;">
    <div class="fl_left" >
      <div class="column2">
        <ul>
		<li>
            <h2>Note</h2>
			<div class="imgholder"><img src="images/demo/note.jpg" width="240px" height="130px"  alt="" /></div></br/></br/>
			<ul>
			<?php
			while($fetch2=$select_lectures2->fetch()){
			     echo "<a href='index.php?file=pages/uploads/".$fetch2['textbook']."'>".$fetch2['topic']."</a> <a href='/education/pages/question.php?ask=".$fetch2['staff_id']."' style='float:right'>ASK ?</a></br>";
			}
		    ?>
			    </br></br></br><a href="pages/view_all_post.php">VIEW ALL POSTS</a>
			    
			</ul>
          </li>
		  <li>
            <h2>Departmental Time-Table</h2>
            <div class="imgholder"><img src="images/demo/time2.png" width="240px" height="130px" alt="" /></div>
            <p> Semester Time-table from First Year to Final Year</p>
			<ul>
			    <a href="pages/time_table.php?year=FIRST">First Year Time-Table</a></br>
			    <a href="pages/time_table.php?year=SECOND">Second Year Time-Table</a></br>
			    <a href="pages/time_table.php?year=THIRD">Third Year Time-Table</a></br>
	            <a href="pages/time_table.php?year=FINAL">Final Year Time-Table</a>
			</ul>
          </li>
          <li class="last">
            <h2>Semester Courses</h2>
            <div class="imgholder"><img src="images/demo/course.jpg" width="240px" height="130px" alt="" /></div>
            <p> The List of Courses for Students from First to Final Year</p>
                <a href="pages/course.php?year=FIRST">First Year Courses</a></br>
			    <a href="pages/course.php?year=SECOND">Second Year Courses</a></br>
			    <a href="pages/course.php?year=THIRD">Third Year Courses</a></br>
	            <a href="pages/course.php?year=FINAL">Final Year Courses</a>
			</li>
        </ul>
        <br class="clear" />
      </div>
	  

	 
     </div>
    <div class="fl_right">
      <h2>Latest From The Department</h2>
      <ul>
        <li>
          <div class="imgholder"><a href="#"><img src="images/demo/time.png" width="80px" height="80px" alt="" /></a></div>
          <p><strong><a href="pages/latest.php?latest=table">Annoucements</a></strong></p>
		    <p style="height:60px"><?php echo $fetch_latest['brief_intro_table'];?></p>
           
		</li>
        <li>
          <div class="imgholder"><a href="#"><img src="images/demo/Published.jpg" width="80px" height="80px" alt="" /></a></div>
          <p><strong><a href="pages/latest.php?latest=publish">Events</a></strong></p>
		  <p style="height:60px"><?php echo $fetch_latest['brief_publish'];?></p>
           
		</li>
        <li>
          <div class="imgholder"><a href="#"><img src="images/demo/Payment.jpg" width="80px" height="80px" alt="" /></a></div>
          <p><strong><a href="pages/latest.php?latest=payment">Payment</a></strong></p>
		   <p style="height:60px"><?php echo $fetch_latest['brief_payment'];?></p>
           
		</li>
        <!--<li>
          <div class="imgholder"><a href="#"><img src="images/demo/Penguins.jpg" width="80px" height="80px" alt="" /></a></div>
          <p><strong><a href="#">Late Registration Time</a></strong></p>
           <p>elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis </p>
		</li>-->
        
      </ul>
    </div>
    <br class="clear" />
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
            <li><span style="float:left"><img src="images/demo/ico-phone.png" alt="" width="20" height="16" hspace="2" /></span> Phone:08076797607</li>
			<li><span style="float:left"><img src="images/demo/ico-fax.png" alt="" width="20" height="16" hspace="2"  /></span> Fax:9586858665 </li>
                  <li><span style="float:left"><img src="images/demo/ico-website.png" alt="" width="20" height="16" hspace="2"  /></span> Website: <a href="#">www.company.com</a></li>
                  <li><span style="float:left"><img src="images/demo/ico-email.png" alt="" width="20" height="16" hspace="2"  /></span> Email: <a href="#">info@mycompany.com</a></li>
                  <li><span style="float:left"><img src="images/demo/ico-twitter.png" alt="" width="20" height="16" hspace="3"  /></span> <a href="#">Follow</a> on Twitter</li>
        </ul>
	</div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">uche</a></p>
    <p class="fl_right">Design by <a target="_blank" href="#" title="#">uche</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>