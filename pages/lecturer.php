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
<title>Staff</title>
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
        <li><a href="about.php">About</a></li>
        <li><a href="e-learning.php">E-Library</a></li>
        <li class="active"><a href="lecturer.php">Staff</a></li>
        <li><a href="contact_us.php">Contact Us</a></li>
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
      <h1>COMPUTER SCIENCE STAFF </h1>
      <!--<img class="imgr" src="../images/demo/imgr.gif" alt="" width="125" height="125" />-->
      <p> 
	  <table summary="Summary Here" cellpadding="0" cellspacing="0" style="">
        <thead>
          <tr>
            <th>Name of Staff</th>
            <th>Qualification</th>
            <th>E-mail</th>
            <th>Office</th>
			<th></th>
          </tr>
        </thead>
		<tr>
<td style="width:150px">PROF. F. S. BAKPO</td>
<td>Phd(ESUT) 2008, M.Eng.(Alamaty) 1994 Computer Eng.</td>
<td>bakpo@unn.edu.ng</td>
<td>office1</td>
<td ><a href="staff_bio.php?bio=bakpo@unn.edu.ng">bio</a></td>
</tr>
<tr>
<td style="width:150px">DR. F.J. OGWU</td>
<td>Phd Comp. Sci., M.Sc. Comp. Sci., B.Sc Comp.Sci</td>
<td>ogwu@unn.edu.ng</td>
<td>office2</td>
<td ><a href="staff_bio.php?bio=ogwu@unn.edu.ng">bio</a></td>
</tr>
<tr>
<td style="width:150px">DR. M. N. AGU</td>
<td>Phd(EBSU) 2009, M.Sc.(Nig) 1995 Computer Science, B.Sc(Ibadan) Comp. Sci., 1979</td>
<td>agu@unn.edu.ng</td>
<td>office3</td>
<td ><a href="#">bio</a></td>
</tr>
<tr>
<td style="width:150px">DR. G. E. OKEREKE</td>
<td>Phd(Nig), Electronic Engr., 2013, 2009, M.Sc.(Nig) Computer Science, B.Eng.(ESUT) Comp. Engr.</td>
<td>agu@unn.edu.ng</td>
<td>office4</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">O. E. OGUIKE</td>
<td>M.Sc. 1991 Information Technology, B.Sc(Hons) Maths/Stat., 1990</td>
<td>oguike@unn.edu.ng</td>
<td>office5</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">S. C. Echezona</td>
<td>M.Sc.(Nig) 1995 Computer Science, B.Sc(Nig) Comp. Sci., 1988</td>
<td>echezona@unn.edu.ng</td>
<td>office6</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">DR. AGOZIE ENEH</td>
<td>Phd(MiddleSex), M.Sc.(Nig) 1995 Computer Science, B.Sc(Nig) Comp. Sci., 1979</td>
<td>eneh@unn.edu.ng</td>
<td>office7</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">DR. M. C. OKORONKWO</td>
<td>Phd(EBSU) 2009, M.Sc., 2002 Computer Science, B.Sc(Hons) Comp. Sci., 1990, HND(Systems Sci.), 1986</td>
<td>okoronkwo@unn.edu.ng</td>
<td>office8</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">DR. M. E. EZEMA</td>
<td>Phd(EBSU) 2009, M.Sc.(ESUT) 2001 Computer Science, B.Sc(Nig) Comp. Sci., 1997</td>
<td>ezema@unn.edu.ng</td>
<td>office9</td>
<td ><a href="#">bio</a></td>
</tr>
<tr>
<td style="width:150px">DR. C. N. UDANOR</td>
<td>Phd(Nig) Electronic, 2013, M.Sc.(Nig) 2004 Computer Science, B.Eng(ESUT) Comp. Sci., 1996</td>
<td>udanor@unn.edu.ng</td>
<td>office10</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">MR. CHINWUKO O</td>
<td>M.Sc.(Nig) 1998,  B.Sc(ASUTEC) Comp. Sci., 1995</td>
<td>chinwuko@unn.edu.ng</td>
<td>office11</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">MRS C. H. UGWUCHISHIWU</td>
<td>M.Sc.(Nig) 2009 Computer Science, B.Sc(Nig) Comp. Sci.</td>
<td>ugwuchishiwu@unn.edu.ng</td>
<td>office12</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">MRS O. A. EZUGWU</td>
<td>M.Sc.(Nig) 2008 Computer Science, B.Sc(Nig) Comp./Maths, 1998</td>
<td>ezugwu@unn.edu.ng</td>
<td>office13</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">MR G. ANICHEBE</td>
<td>M.Sc.(Nig) Computer Science, B.Sc(Nig) Comp. Sci.</td>
<td>anichebe@unn.edu.ng</td>
<td>office14</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">MR. ANEKE STEPHEN</td>
<td>M.Sc.(London) Computer Science, B.Sc(Nig) Comp. Sci., 1979</td>
<td>aneke@unn.edu.ng</td>
<td>office14</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">MR. B. O. OGBUOKIRI</td>
<td>B.Sc(Nig) Comp. Sci., 2010</td>
<td>ogbuokiri@unn.edu.ng</td>
<td>office15</td>
<td ><a href="#">bio</a></td>
</tr>


<tr>
<td style="width:150px">MISS. T. U. ODIKE</td>
<td>B.Sc(Nig) Comp. Sci., 2011</td>
<td>odika@unn.edu.ng</td>
<td>office16</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">MRS. A.I. OGBODO</td>
<td>B.Sc(Nig) Comp. Sci., 2011</td>
<td>ogbodo@unn.edu.ng</td>
<td>office17</td>
<td ><a href="#">bio</a></td>
</tr>

<tr>
<td style="width:150px">MR. C. I. D. NWUYO</td>
<td>B.Sc(Nig) Comp. Sci., 2012</td>
<td>nwuyo@unn.edu.ng</td>
<td>office18</td>
<td ><a href="#">bio</a></td>
</tr>

</table> </p>
      <!--<p>Dapiensociis <a href="#">temper donec auctortortis cumsan</a> et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem.</p>
      <img class="imgl" src="../images/demo/imgl.gif" alt="" width="125" height="125" />
      <p>This is a W3C compliant free website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. This template is distributed using a <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>.</p>
      <p>You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files. For more CSS templates visit <a href="http://www.os-templates.com/">Free Website Templates</a>.</p>
      <p>Portortornec condimenterdum eget consectetuer condis consequam pretium pellus sed mauris enim. Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</p>
      <h2>OUR MISSION</h2>
      <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th>Header 1</th>
            <th>Header 2</th>
            <th>Header 3</th>
            <th>Header 4</th>
          </tr>
        </thead>
        <tbody>
          <tr class="light">
            <td>Value 1</td>
            <td>Value 2</td>
            <td>Value 3</td>
            <td>Value 4</td>
          </tr>
          <tr class="dark">
            <td>Value 5</td>
            <td>Value 6</td>
            <td>Value 7</td>
            <td>Value 8</td>
          </tr>
          <tr class="light">
            <td>Value 9</td>
            <td>Value 10</td>
            <td>Value 11</td>
            <td>Value 12</td>
          </tr>
          <tr class="dark">
            <td>Value 13</td>
            <td>Value 14</td>
            <td>Value 15</td>
            <td>Value 16</td>
          </tr>
        </tbody>
      </table>
      <div id="comments">
        <h2>OUR VISION</h2>
        <ul class="commentlist">
          <li class="comment_odd">
            <div class="author"><img class="avatar" src="../images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#">A Name</a></span> <span class="wrote">wrote:</span></div>
            <div class="submitdate"><a href="#">August 4, 2009 at 8:35 am</a></div>
            <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
          </li>
          <li class="comment_even">
            <div class="author"><img class="avatar" src="../images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#">A Name</a></span> <span class="wrote">wrote:</span></div>
            <div class="submitdate"><a href="#">August 4, 2009 at 8:35 am</a></div>
            <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
          </li>
          <li class="comment_odd">
            <div class="author"><img class="avatar" src="../images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#">A Name</a></span> <span class="wrote">wrote:</span></div>
            <div class="submitdate"><a href="#">August 4, 2009 at 8:35 am</a></div>
            <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
          </li>
        </ul>
      </div>
      <!--<h2>Write A Comment</h2>
      <div id="respond">
        <form action="#" method="post">
          <p>
            <input type="text" name="name" id="name" value="" size="22" />
            <label for="name"><small>Name (required)</small></label>
          </p>
          <p>
            <input type="text" name="email" id="email" value="" size="22" />
            <label for="email"><small>Mail (required)</small></label>
          </p>
          <p>
            <textarea name="comment" id="comment" cols="100%" rows="10"></textarea>
            <label for="comment" style="display:none;"><small>Comment (required)</small></label>
          </p>
          <p>
            <input name="submit" type="submit" id="submit" value="Submit Form" />
            &nbsp;
            <input name="reset" type="reset" id="reset" tabindex="5" value="Reset Form" />
          </p>
        </form>
      </div>-->
    </div>
    <div id="column">
      <div class="subnav">
        <h2>DISCOVER THE DEPARTMENT</h2>
        <ul>
          <li><a href="message_from_head.php">Message from the Head</a></li>
          <li><a href="lecturer.php">Staffs</a></li>
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