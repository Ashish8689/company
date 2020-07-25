<?php
 
 include '../connect.php';

 session_start();

if(isset($_SESSION['is_adminlogin'])){
  // $email = $_SESSION['email'];
}
else{
  header('location:../login/adminlogin.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Clients</title>

 <link rel="stylesheet" type="text/css" href="../style.css">

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


<style>

  .navbar{
    height: 12vh;
    background: #f0f0f0;
  }

  .navbar-brand{
    font-size: 16px!important;
  }

  table{
    margin-top: 7vh;
    width: 100%;
}

  th{
      padding:20px 30px;
      text-transform: uppercase;
      text-align: center;
  }
  td{
      text-align: center;
      padding:10px;
      font-weight: 600;
     font-size: 14px;
     color: #5d5d5a;
     font-family: 'Roboto', sans-serif;
  }


</style>
</head>

<body>



 <!-- Top Navbar -->
 <nav class="navbar shadow justify-content-between">

  <div class="container-lg">

    <a href="adminhome.php"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-arrow-left fa-stack-1x fa-inverse"></i></span></a>

    <a class="logout" href="../logout.php">
        <i class="fas fa-sign-out-alt mr-2"></i>
        Logout
    </a>
  </div>
</nav>



<!-- ********************  All entries  ******************************-->

 <div class="container-fluid">

<div class="table-responsive">
<table border="2px">
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>email</th>
      <th>mobile</th>
      <th>subscription</th>
      <th>startdate</th>
      <th>username</th>
      <th>password</th>
      <th colspan="2">operation</th>
    </tr>
  </thead>
  <tbody>


    <?php
        

         $selectquery="select * from client";

         $call = mysqli_query($con,$selectquery);

         // $nums=mysqli_num_rows($call);

        while( $res = mysqli_fetch_array($call) ){

           ?>

          <tr>
            <td><?php echo $res['id']?></td>
            <td><?php echo $res['name']?></td>
            <td><?php echo $res['email']?></td>
            <td><?php echo $res['mobile']?></td>
            <td><?php echo $res['subscription']?></td>
            <td><?php echo $res['startdate']?></td>
            <td><?php echo $res['username']?></td>
            <td><?php echo $res['password']?></td>

             
            <td><a href="editclient.php?id=<?php echo $res['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Update">
                      <i class="fa fa-edit"></i></a></td>

            <td><a href="deleteclient.php?id=<?php echo $res['id'];?>" data-toggle="tooltip" data-placement="bottom" title="Delete">
                   <i class="fa fa-trash"></i></a></td>
          </tr>

          <?php

        }

    ?>

  </tbody>
</table>
 </div>

</div>
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>


</body>

</html>