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

if(isset($_POST['std_login'])){
	$username=$_POST['std_user'];
	$password=$_POST['std_pass'];
	$level=$_POST['level'];
	$select_std=$connection->prepare("SELECT * FROM student_info WHERE `email`='$username' and `password`='$password' and `level`='$level'");
	$select_std->execute();
	$fetch_std=$select_std->fetch();
	$num_std= $select_std->rowCount();
	$fetch_reg=$fetch_std['regno'];
	$_SESSION['regno']=$fetch_reg;
	if($num_std>=1){
		$_SESSION['level']=$level;
		$_SESSION['std_user']=$username;
		header("Location:/education/class.php");
	}else{
		echo "<script>alert('INCORRECT USERNAME or PASSWORD / LEVEL')</script>";
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

         $select_latest=$connection->prepare("SELECT * FROM latest");
		 $select_latest->execute();
		 $fetch_latest=$select_latest->fetch();

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
<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
     <div class="topbox">
        <h2>Student Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Admins Login Form</legend>
            <label for="studentname">Username:
              <input type="text" name="std_user" id="stdname" value="" />
            </label>
            <label for="studentpass">Password:
              <input type="password" name="std_pass" id="stdpass" value="" />
            </label>
			<label for="studentlevel">Level:
                                        <select name="level">
										     <option></option>
											 <option>100</option>
											 <option>200</option>
											 <option>300</option>
											 <option>400</option>
										</select>
            </label>
              <input type="submit" name="std_login" id="stdlogin" value="Login" />
            <a href="pages/student.php">REGISTER</a>
          </fieldset>
        </form>
      </div>
      <div class="topbox">
        <h2>Staff Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Staff Login Form</legend>
            <label for="teachername">Username:
              <input type="text" name="staff_user" id="staff_user" value="" />
            </label>
            <label for="teacherpass">Password:
              <input type="password" name="staff_pass" id="staffpass" value="" />
            </label>
              <input type="submit" name="staff_login" id="staff_login" value="Login" />
            
          </fieldset>
        </form>
      </div>
      <div class="topbox last">
        <h2>Admin Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Admins Login Form</legend>
            <label for="Adminname">Username:
              <input type="text" name="admin_user" id="Adminname" value="" />
            </label>
            <label for="Adminpass">Password:
              <input type="password" name="admin_pass" id="Adminpass" value="" />
            </label>
              <input type="submit" name="admin_login" id="Adminlogin" value="Login" />
            
          </fieldset>
        </form>
      </div>
	  
      <br class="clear" />
    </div>
    <div id="loginpanel">
      <ul>
        <li class="left">Log In Here &raquo;</li>
        <li class="right" id="toggle"><a id="slideit" href="#adminpanel">Administration</a><a id="closeit" style="display: none;" href="#adminpanel">Close Panel</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="index.html">NUE</a></h1>
      <p>Networking the World</p>
    </div>
    <div id="topnav">
      <ul>
	  <?php if (isset($_SESSION['std_user']))
	  {
		  echo "<li class='active'><a href='class.php'>Home</a></li>";
	  }else
	  {
		  echo "<li class='active'><a href='index.php'>Home</a></li>";
	  }
	  
	  ?>
        
        <li><a href="pages/about.php">About</a></li>
        <li><a href="./pages/e-learning.php">E-Library</a></li>
        <li><a href="pages/lecturer.php">Staffs</a></li>
        <li><a href="pages/contact_us.php">Contact Us</a></li>
      </ul>
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
echo "<div class='featured_box'><a href='#'><img data-u='image' src='pages/uploads/". $fetch_dp['image']."' width=150px; height=100px; alt='' class='img-indent'></a>
      <div class='floater'>
        <h2>".$fetch['topic']."</h2>
        <p>".$fetch['intro']."</p>
        <p class='readmore'><a href='index.php?file=pages/uploads/".$fetch['textbook']."'>Download</a></p>
		
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
			     echo "<a href='index.php?file=pages/uploads/".$fetch2['textbook']."'>".$fetch2['topic']."</a></br>";
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
	  

	 
     <!-- <div class="column2">
        <h2>About elvis</h2>
        <img class="imgl" src="images/demo/Penguins.jpg" width="80px" height="80px" alt="" />
        <p> <a href="http://www.os-desrrkrll4s.com/">OS desrrkrll4s</a>.</p>
         <p>elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvi</p>       
	    <p>elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis </p>
		<p>elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis elvis </p>
	  </div>-->
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