<!DOCTYPE html>
<html>
<head>
  <title>Editclient</title>

  <link rel="stylesheet" href="../style.css">

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <style>
   
   .form2{
    padding-top:0px;
   }   

   .form-heading{
    margin-bottom: 50px;
   }
  
  </style>

</head>

 <body>

  <a href="viewclient.php"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-arrow-left fa-stack-1x fa-inverse"></i></span></a>

 <form action="" method="POST" class="form2">


  
  <?php
  
  include "../connect.php";

  $ids= $_GET['id'];

  $showquery= "select * from client where id={$ids}";

  $showdata= mysqli_query($con,$showquery);

  $arrdata= mysqli_fetch_array($showdata);

  if(isset($_POST['update'])){

    $idupdate=$_GET['id'];

    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['phone'];
    $subscription=$_POST['subscription'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $updatequery="update client set id='$idupdate',name='$name',email='$email',mobile='$mobile',subscription='$subscription',username='$username',password='$password' where id=$idupdate ";               


     $res=mysqli_query($con,$updatequery);               

     if($res){
      ?>
      <script>
        alert('Data Updated');
      </script>
      <?php
     }
     else{
      ?>
      <script>
        alert('not Updated');
      </script>
      <?php
     }
  }

?>


      <h1 class="form-heading">Edit <?php echo $arrdata['name'] ?> Deatils</h1>


        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Client Name</label>
              <input type="text" class="form-control" name='name' value="<?php echo $arrdata['name'] ?>" >
          </div>

           <div class="form-group col-md-6">
              <label for="inputPassword4">Client Username</label>
              <input type="text" class="form-control" name="username" value="<?php echo $arrdata['username'] ?>">
           </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputAddress">Email</label>
              <input type="email" class="form-control" name="email" value="<?php echo $arrdata['email'] ?>" > 
          </div>
          <div class="form-group col-md-6">
              <label for="inputAddress2">Client Password</label>
              <input type="text" class="form-control" name="password" value="<?php echo $arrdata['password'] ?>">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Phone</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $arrdata['mobile'] ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Confirm Password</label>
            <input type="text" class="form-control" name="cpassword" value="<?php echo $arrdata['password'] ?>">
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

        <button type="submit" class="btn btn-login" name="update">Update</button>

    </form>

</body>
</html>
