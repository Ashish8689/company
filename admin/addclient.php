<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Addclient</title>
	<link rel="stylesheet" href="../style.css">

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>

	<div class="container-fluid">

		<a href="adminhome.php"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-arrow-left fa-stack-1x fa-inverse"></i></span></a>


      <h1 class="form-heading">Enter Deatils</h1>
		
		<form class="form2" method="POST">
			  <div class="form-row">
				  <div class="form-group col-md-6">
				      <label for="inputEmail4">Client Name</label>
				      <input type="text" class="form-control" name='name' id="inputEmail4" placeholder="Name">
				  </div>

				   <div class="form-group col-md-6">
				      <label for="inputPassword4">Client Username</label>
				      <input type="text" class="form-control" name="uname" id="inputPassword4" placeholder="Enter username">
				   </div>
			  </div>

			  <div class="form-row">
				  <div class="form-group col-md-6">
					    <label for="inputAddress">Email</label>
					    <input type="email" class="form-control" name="email" id="inputAddress" placeholder=" Enter email ">
				  </div>
				  <div class="form-group col-md-6">
					    <label for="inputAddress2">Client Password</label>
					    <input type="text" class="form-control" name="password" id="inputAddress2" placeholder="Enter Password">
				  </div>
			  </div>

			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputCity">Phone</label>
			      <input type="text" class="form-control" name="phone" id="inputCity" placeholder="Enter Mobile no">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputCity">Confirm Password</label>
			      <input type="text" class="form-control" name="cpassword" id="inputCity" placeholder="Confirm password">
			    </div>
			    
			  </div>

			  <div class="form-group-radio"> 

			    <label for="subscription">Subscription</label>    

			      <label class="radio-inline">
				      <input type="radio" name="subscription" value='90'><span>90 days</span>
				  </label>

				  <label class="radio-inline">
				      <input type="radio" name="subscription" value='365'><span>365 days</span>
				  </label>

				  <label class="radio-inline">
				      <input type="radio" name="subscription" value='3'><span>3 years</span>
				  </label>
              </div>

			  <button type="submit" class="btn btn-login" name="submit">Add Client</button>
		</form>
	</div>


	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	
</body>
</html>


<?php

 include '../connect.php';

 session_start();

 if(isset($_SESSION['is_adminlogin'])){

 	if(isset($_POST['submit'])){

 	$name = $_POST['name'];
	$email= $_POST['email'];
	$mobile=$_POST['phone'];
	$uname =  $_POST['uname'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$subscription=$_POST['subscription'];


	if($password == $cpassword){

		$insertQuery = "insert into client(name,email,mobile,subscription,username,password) values('$name','$email','$mobile','$subscription','$uname','$password')";

		$run = mysqli_query($con,$insertQuery);

		if($run){
			?>
			<script>
			  alert('data inserted');
			</script>
			<?php
		}
		else{
			?>
			<script>
				alert('data not send retry!!!');
			</script>
			<?php
		}
		// header('location:index.html');
	}

	else{
		?>
		<script>
			alert('Password is not matching');
		</script>
		<?php
	}
	
  }
}

else{
  header('location:../login/adminlogin.php');
}
 
 
?>