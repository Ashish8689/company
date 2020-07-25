<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<link rel="stylesheet" href="../style.css">

	<!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>

	<div class="login-container">

		<a href="../index.php"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-arrow-left fa-stack-1x fa-inverse"></i></span></a>

		<div class="content">
			<h1 class="heading">Welcome Admin</h1>

			<form class="form1" method="POST">

	            <div class="form-group">
					<label for="username">username</label>
					<input type="text" name="name" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="password">password</label>
					<input type="text" name="password" autocomplete="off">
				</div>
            
			    <button class="btn-login" name="submit">Submit</button>

			</form>    
			    
		</div>
	</div>
	
</body>
</html>


<?php

  include '../connect.php';

  session_start();

  if(!isset($_SESSION['is_adminlogin'])){
 
    if(isset($_POST['submit'])){

    	$name = $_POST['name'];
    	$password=$_POST['password'];


    	$selectquery = "select * from admin where uname='$name' && password='$password'" ;

    	$run = mysqli_query($con,$selectquery);

    	$res = mysqli_num_rows($run);

    	if($res == 1){
    		$_SESSION['is_adminlogin'] = true;
    		header('location: ../admin/adminhome.php');
    	}
    	else{
    		?>
    		<script>
    			alert('username or password is inncorrect');
    		</script>
    		<?php
    	}
    }

  }

  else{
  	header('location:../admin/adminhome.php');
  }

  ?>