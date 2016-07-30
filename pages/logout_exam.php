<?php
if(!isset($_SESSION))
{
session_start();		
}

     $connection=new PDO("mysql:host=localhost; dbname=education_db","root", "");
 unset($_SESSION['user_exam']);
 Header("Location:exam.php");
?>
