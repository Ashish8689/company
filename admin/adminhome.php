<?php
 
 include '../connect.php';
 session_start();

 if(isset($_SESSION['is_adminlogin'])){

 }
 else{
 	header('location:../login/adminlogin.php');
 }

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HomePage</title>
	<link rel="stylesheet" href="../style.css">

	<!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>

	<div class="logout-container">
		<span class="logout"><a href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></span>
   </div>

  <div class="home-container">
	<a href="addclient.php" class="btn" >Add Client</a>
	<a href="viewclient.php" class="btn" >View Client</a>
	<a href="sendmsg.php" class="btn" >Send message</a>
  </div>

</body>
</html>