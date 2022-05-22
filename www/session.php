<?php 
	  
	//   error_reporting(0);
	  session_start();
	  date_default_timezone_set("Asia/Manila");
	  $username=$_SESSION['username'];
	  $selectuser=mysqli_query($con,"SELECT * FROM users where username='$username'");
	  $fe=mysqli_fetch_array($selectuser);
	  $username=$fe['username'];
	  $role=$fe['role'];

 ?>