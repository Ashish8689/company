<?php

  include '../connect.php';

session_start();
if(isset($_SESSION['is_clientlogin'])){
   $name = $_SESSION['name'];

   $selectquery ="select * from client where name='$name'";

  $run = mysqli_query($con,$selectquery);

  $fetch = mysqli_fetch_array($run);

}
else{
	header('location:../login/clientlogin.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ClientHomePage</title>
	<link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >

	<!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">



</head>
<body>

   <div class="logout-container">

    <div class="notification">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-envelope" aria-hidden="true"></i>

            <p><?php 
              
              if($fetch['message'] == ''){
                echo '0';
                
              }
              else{
                echo count($fetch['message']);
              }

            ?></p>
          </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
              
              if($fetch['message'] == ''){
                echo '<a class="dropdown-item text-danger font-weight-bold" href="#"><i class="fa fa-lg fa-smile-o"></i>Sorry! no Message</a>';
              }
              else{
                ?>
                   <a class="dropdown-item" href="#"><?php echo $fetch['message']?></a>
                <?php
              }

            ?>
        </div>
      </li>

      </div> 
		<span class="logout"><a href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></span>
   </div>

   <div class="text">
   	 <h1 class="header">Hello <?php echo $name ?></h1>
   	  <div class="mess-content">
   	       <p><?php echo $fetch['message']?></p>
   	  </div>
   </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 

</body>
</html>
