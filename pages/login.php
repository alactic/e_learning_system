<?php
if(!isset($_SESSION))
{
session_start();
}

    $connection=new PDO("mysql:host=localhost; dbname=education_db", "root", "");
    if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		if($username==null || $password==null)
	  {
		  $_SESSION["incorrect"]="USERNAME OR PASSWORD IS EMPTY";
	  }else
	  {
		  
	  $select=$connection->prepare("SELECT * FROM student_info WHERE `email`='$username' AND `password`='$password' ");
      $select->execute();
	  $num=$select->rowCount();
	  if($num>=1)
	  {
		  $_SESSION['user_exam']=$username;
		  header("Location:exam.php");
		  exit();
	  }else
	  {
		  $_SESSION["incorrect"]="INCORRECT USERNAME OR PASSWORD";
		  
	  }
	  }	
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login Page</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<style>
		 label{width:360px; margin-top:-25px; margin-left:80px}
		 
		</style>
	</head>
	<body style="background:url(../images/demo/nijabg.jpg);>

			<section id="one" class="wrapper style1 special" style="background:url(../images/demo/nijabg.jpg);">
			 <h2 style="background-color:#FFF; padding:10px">Welcome to COMPUTER SCIENCE EXAMINATION LOGIN PAGE</h2>
				<div class="container">
					<form action="login.php" method="POST" enctype="multipart/form-data" style="background:#fff; width:500px; margin-left:380px">
					</br>
				<h4 style="margin-left:90px; color:red">	<?php if(isset($_SESSION["incorrect"])){echo $_SESSION["incorrect"]."</br></br>"; $_SESSION["incorrect"]=" ";}?></h4>
					</br>
				<label for="lastName"> 
					<span>USERNAME</span><input type="text" name="username" id="username">
				</label>
					</br></br></br>
					
				<label for="firstName"> 
				<span>PASSWORD</span>
					<input type="password" name="password" id="password">
				</label>
				
				
				
				<input type="submit" name="submit" value="LOGIN" id="submit" style="margin-left:330px;">
				</br></br></br>
			</form>
				</div>
			</section>

		
	</body>
</html>