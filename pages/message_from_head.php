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
      <h1>Message from the Head </h1>
      <!--<img class="imgr" src="../images/demo/imgr.gif" alt="" width="125" height="125" />-->
      <p> Growing, changing, moving forward</br></br>

It's back to class and we in the Department of Computer Science are back to work. Actually, we didn't take much of a break this summer, as we've been planning and preparing for the future at our fingertips – an expansion of nearly 30% for our entire department.

This expansion recognizes the growing need for CS graduates and the department's past success in producing highly qualified graduates who are in hot demand in industry. Our students are recruited as early as their sophomore year and by graduation, earn some of the highest starting salaries among Purdue graduates.

One of the first moves in our overall expansion has already transpired – student growth – as we have increased our enrollment. Now, we continue to increase faculty and staff, so that we can maintain low student-to-faculty ratios and accommodate more students. I am pleased to announce we have hired three, outstanding faculty members who began teaching this semester. You can read more about their areas of interest in our Latest News section on our homepage. Our three new hires were previously planned, and our University-supported expansion will result in an additional 20 faculty members over the next three years.

Changes abound in our departmental staff, as well, with the addition of a full-time communications position, a departmental receptionist, and a new Assistant Head to replace Tim Korb, who announced his retirement. This summer, we hired Vishal Lodha, who comes to us with a distinguished background in both the public and private sectors, recently working for BCforward as Senior Director and in the College of Agriculture as IT Manager. 

On the academic front, I'm pleased to report that the Bridge Program, which was created to help students with a high potential for computer science, but little or no programming experience has nearly doubled in enrollment. The instructors have told me that students and parents are already inquiring about next year's program!

I'm excited that our corporate partner's program continues to grow and diversify with regard to representative industry, including retail, consulting, manufacturing and consumer goods, in addition to our traditional support from tech companies. Our corporate friends provide invaluable insight, as we shape our course of study, so that our students are adequately prepared for the workforce.

The entrepreneurial spirit continues to thrive among our faculty and students, as well. This year, Arxan, a company incubated 10+ years ago at Purdue enjoyed tremendous success when TA Associates announced a major investment in the fall, then more recent, IBM announced Arxan's mobile application protection offerings would be sold as part of their portfolio of security products. Distinguished Professor Mikhail (Mike) Atallah; his graduate student, Hoi Chang; Distinguished Professor Emeritus John Rice, and Assistant Head Tim Korb co-founded the company and worked together to develop the technology for a business that grew into one of the leading providers of software security solutions.

From academia to entrepreneurship – it's an exciting time for Purdue Computer Science. I am confident that we are poised to be successful in our journey and I look forward to your support as we move in a new direction.
</br></br>
F. S. BAKPO
<</br>/br>
Department Head & Professor
 </p>
    </div>
    <div id="column">
      <div class="subnav">
        <h2>DISCOVER THE DEPARTMENT</h2>
       <ul>
          <li><a href="message_from_head.php">Message from the Head</a></li>
          <li><a href="lecturer.php">Staff</a></li>
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