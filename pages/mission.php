<?php
session_start();

$connection=new PDO("mysql:host=localhost; dbname=education_db", "root", "");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: School Education
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ABOUT US</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="../layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery.slidepanel.setup.js"></script>
</head>
<body>
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
    <!--<ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="#">Home</a></li>
      <li>&#187;</li>
      <li><a href="#">Grand Parent</a></li>
      <li>&#187;</li>
      <li><a href="#">Parent</a></li>
      <li>&#187;</li>
      <li class="current"><a href="#">Child</a></li>
    </ul>-->
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="content">
      <h1>OUR MISSION </h1>
      <!--<img class="imgr" src="../images/demo/imgr.gif" alt="" width="125" height="125" />-->
      <p> The Department of Computer Science is committed to diversity in our students, faculty, and staff, supporting both the participation and success of underrepresented minorities as well as addressing the underrepresentation of women in computer science.

We have redesigned computer science recruiting materials to emphasize the variety of career options available to CS graduates--career options that appeal to a diverse group of students. The department supports a number of events, programs, and other initiatives aimed at increasing the pipeline of women and underrepresented minorities. These initiatives reinforce the fact that successful companies depend on a variety of contributions from a diverse group of employees. Examples of current activities include middle school summer camps to expose underrepresented students to the excitement of computer science, training workshops for high school math teachers to help them link classroom activities to computer science topics, and a student-led high school visitation program called "ROCS: Reaching Out for Computer Science".

We work closely with the Midwest Crossroads AGEP program office at Purdue, offer summer-bridge programs to incoming students, and participate in conferences aimed at recruiting underrepresented minorities. We also host GEM consortium fellows and Science Bound summer interns.

We have an active presence at conferences including the Grace Hopper Celebration of Women in Computing and the CIC Summer Research Opportunities Program (SROP). We visit minority serving institutions and high schools with high enrollment of underrepresented minorities and encourage students to join our program.

The departmental Computer Science Women's Network (CSWN) is an organization of students, faculty, and staff dedicated to helping all members succeed in computer science. Over the past several years we have been successful in hiring outstanding female faculty. We are currently planning a Women in Computer Science Career day, targeting high school juniors.


 </p>
     
    </div>
    <div id="column">
      <div class="subnav">
        <h2>DISCOVER THE DEPARTMENT</h2>
        <ul>
          <li><a href="message_from_head.php">Message from the Head</a></li>
          <li><a href="lecture.php">Conte Lecture Series</a></li>
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
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">Uche</a></p>
    <p class="fl_right">Design by <a target="_blank" href="#" title="#">Uche</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>