<?php
session_start();
$connection=new PDO("mysql:host=localhost; dbname=education_db", "root", "");
if(!isset($_SESSION['user_exam']))
{
	header("Location:login.php");
	exit();
}else
{
$timestamp = time();
$diff = 10; //<-Time of countdown in seconds.  ie. 3600 = 1 hr. or 86400 = 1 day.

$email=$_SESSION['user_exam'];
$select=$connection->prepare("SELECT * FROM student_info WHERE `email`='$email'");
		 $select->execute();
		 $fetch=$select->fetch();

if(isset($_POST['option'])||isset($_POST['option2'])||isset($_POST['option3'])||isset($_POST['option4'])||isset($_POST['option5']))
{
	$score=0;
	
	if(isset($_POST['option']) AND ($_POST['option']=="yes"))
	{
		$score=$score+10;
	}
	if(isset($_POST['option2']) AND ($_POST['option2']=="yes"))
	{
		$score=$score+10;
	}
	if(isset($_POST['option3']) AND ($_POST['option3']=="yes"))
	{
		$score=$score+10;
	}
	if(isset($_POST['option4']) AND ($_POST['option4']=="yes"))
	{
		$score=$score+10;
	}
	if(isset($_POST['option5']) AND ($_POST['option5']=="yes"))
	{
		$score=$score+10;
	}
	
	$_SESSION['score']=$score;
	header('Location:result.php');
	exit();
}
//MODIFICATION BELOW THIS LINE IS NOT REQUIRED.
$hld_diff = $diff;
if(isset($_SESSION['ts'])) {
	$slice = ($timestamp - $_SESSION['ts']);	
	$diff = $diff - $slice;
}

if(!isset($_SESSION['ts']) || $diff > $hld_diff || $diff < 0) {
	$diff = $hld_diff;
	$_SESSION['ts'] = $timestamp;
}

//Below is demonstration of output.  Seconds could be passed to Javascript.
$diff; //$diff holds seconds less than 3600 (1 hour);

$hours = floor($diff / 3600) . ' : ';
$diff = $diff % 3600;
$minutes = floor($diff / 60) . ' : ';
$diff = $diff % 60;
$seconds = $diff;
}

?>
<h2><div id="strclock">Clock Here!</div></h2>
<script type="text/javascript">
 var hour = <?php echo floor($hours); ?>;
 var min = <?php echo floor($minutes); ?>;
 var sec = <?php echo floor($seconds); ?>

function countdown() {
 if(sec <= 0 && min > 0) {
  sec = 59;
  min -= 1;
 }
 else if(min <= 0 && sec <= 0) {
  min = 0;
  sec = 0;
 }
 else {
  sec -= 1;
 }
 
 if(min <= 0 && hour > 0) {
  min = 59;
  hour -= 1;
 }
 
 var pat = /^[0-9]{1}$/;
 sec = (pat.test(sec) == true) ? '0'+sec : sec;
 min = (pat.test(min) == true) ? '0'+min : min;
 hour = (pat.test(hour) == true) ? '0'+hour : hour;
 
 document.getElementById('strclock').innerHTML = hour+":"+min+":"+sec;
 setTimeout("countdown()",1000);

 if(sec==0 && min==0)
 {
	  
	document.getElementById("myForm").submit();
 }
 }
 countdown();
</script>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Examination</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<!-- ####################################################################################################### -->
<div style="margin-left:380px">
<h2>UNIVERSITY OF NIGERIA, NSUKKA</br>
COMPUTER SCIENCE DEPARTMENT</br>
SEMESTER EXAMINATION SESSION</br>
</h2>
</div>
<div style="margin-left:120px">
NAME: <?php echo $fetch['firstname']." ".$fetch['middlename']." ".$fetch['lastname'];?></br>
REG. NO: <?php echo $fetch['regno'];?></br>
LEVEL: <?php echo $fetch['level'];?></br>
</div>
<form name="exam.php" id="myForm" action="exam.php" method="POST" style="margin-left:180px">
  <p> 1. Is Java a programming language?</br>
  yes:<input type="radio" name="option"  value="yes"/>no:<input type="radio" name="option"  value="no"/>dont know:<input type="radio" name="option"  value="kn"/>
  </p>
  <p> 2. Is Java a programming language?</br>
  yes:<input type="radio" name="option2"  value="yes"/>no:<input type="radio" name="option2"  value="no"/>dont know:<input type="radio" name="option2"  value="kn"/>
  </p>
  <p> 3. Is Java a programming language?</br>
  yes:<input type="radio" name="option3"  value="yes"/>no:<input type="radio" name="option3"  value="no"/>dont know:<input type="radio" name="option3"  value="kn"/>
  </p>
  <p> 4. Is Java a programming language?</br>
  yes:<input type="radio" name="option4"  value="yes"/>no:<input type="radio" name="option4"  value="no"/>dont know:<input type="radio" name="option4"  value="kn"/>
  </p>
  <p> 5. Is Java a programming language?</br>
  yes:<input type="radio" name="option5"  value="yes"/>no:<input type="radio" name="option5"  value="no"/>dont know:<input type="radio" name="option5"  value="kn"/>
  </p>
  <p>
    <input type="submit" value="Submit" />
  </p>
</form>

</body>
</html>
