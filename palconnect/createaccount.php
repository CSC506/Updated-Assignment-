  
<?php 
include('dbconfig.php');
if (isset($_POST['save'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST ['firstname'];
        $lastname = $_POST ['lastname'];
        
        $stmt = mysqli_query($conn,"insert into user (username, password, firstname, lastname) values ('$username', '$password', '$firstname', '$lastname')");
        if ($stmt){
        $output="<div class='alert alert-success'>"."Account Created Successful"."</div>";
        }else{
           $output="<div class='alert alert-danger'>"."Resgistration Failed"."</div>";
        }
}
      ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
    <link rel="icon" href="images/logo.fw.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body style="background-color: #DCDCDC">
<nav class="navbar navbar-light bg-light" style="background-color:#DCDCDC">
  <div class="container-fluid">
     <a class="navbar-brand" href="#">
    <img src="images/logo.fw.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Palconnect
  </a>
  </div>
</nav>
<!--Login form-->
<div class="row" style="margin-top: 100px;">
<h4 align="center">Create New User&nbsp;<i class="far fa-hand-point-down" style="color:black"></i></h4>
   <div class="col-lg-4"></div>
  <div class="col-lg-4" style="background-color:#ffffff; float: right; padding:40px; border-radius: 20px">
    <?php if(isset($_POST['save'])){echo $output;}?>
  <form action="createaccount.php" method="post">
    <div class="form-group">
      <input type="text" name="username" class="form-control" placeholder="Enter Username" required="">
    </div>
    <p></p> <div class="form-group">
      <input type="password" name="password" class="form-control" placeholder="Enter Password" required="">
    </div>
    <p></p> 
      <div class="form-group">
      <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" required="">
    </div>
    <p></p>
     <p></p> 
      <div class="form-group">
      <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required="">
    </div>
  
   
   
        <p></p>
      <div class="form-group">
    <button type="submit" name="save" class="btn btn-primary form-control">Create Acount</button>
      </div>
    <p></p>
    <p></p>
    <hr>
    <p></p>
        <a href="index.php" class="btn btn-success">login here</a>
    </p>
  </form>
</div>
  <div class="col-lg-4"></div>
</div>



<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
