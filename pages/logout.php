<?php
if(!isset($_SESSION))
{
session_start();		
}

     $connection=new PDO("mysql:host=localhost; dbname=education_db","root", "");
 unset($_SESSION['staff']);
 unset($_SESSION['admin']);
 unset($_SESSION['std_user']);
 Header("Location:../index.php");
?>
