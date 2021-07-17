<?php include('dbconfig.php');
	include('session.php'); 

	
$id=$_SESSION['id'];
$query = "SELECT * FROM user WHERE user_id=$id";

$exec = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($exec)){

  $user_id = $row['user_id'];
  $username = $row['username'];
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $gender = $row['gender'];
  $address=$row['address'];
  $school = $row['school'];
  $work = $row['work'];
  }
  
  if (isset($_POST['update'])) {
  $output ='';
  $nusername = $_POST['nusername'];
  $nfirstname = $_POST['nfirstname'];
  $nlastname = $_POST['nlastname'];
  $ngender = $_POST['ngender'];
  $nwork = $_POST['nwork'];
  $nschool = $_POST['nschool'];
  $naddress = $_POST['naddress'];

  $queri = "UPDATE user SET username='$nusername', firstname='$nfirstname',lastname='$nlastname', gender='$ngender', address='$naddress', school='$nschool', work='$nwork' WHERE user_id ='$id' ";
  $exec = mysqli_query($conn, $queri);
  if ($exec) {
  	    $output = "<div class='alert-success'>"."Update Successfull"."</div>";
  	    header('location:profile.php');
  }else{
  	 $output = "<div class='alert-danger'>"."Update failed"."</div>";
  }
  }

  if (isset($_POST['update_photo'])) {
	$file_name = $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$location = 'images/';
	$f= $file_name;
	$insert =$location.$f;
	move_uploaded_file($tmp_name,$insert);

$queri1 = "UPDATE user SET  photo='$insert' WHERE user_id ='$id' ";
  $exec = mysqli_query($conn, $queri1);
  }



	?>
<!DOCTYPE html>
<html>
<head>
	<title>Palconnect</title>
	
	<link rel="icon" href="images/logo.fw.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	  <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>

<style type="text/css">
	body{
		font-size:18px;

	}
</style>
</head>
<body>


	  <!--NAV-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color:black;padding:10px">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="home.php">
    <img src="images/logo.fw.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Palconnect
  </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
              <a class="nav-link" href="home.php"><i class="fas fa-home"></i></a>
            </li>
             <li class="nav-item active" style="padding-left:20px">
              <a class="nav-link" href="profile.php"><i class="fas fa-user-edit"></i></a>
            </li>
          </ul>

            <ul class="navbar-nav navbar-right" style="float:right;">
             
             <li class="nav-item">
             	
            </li>
          </ul>
        </div>
         <span class="navbar-text" style="color:white; margin-right:20px">
 <?php echo $member_row['firstname']." ".$member_row['lastname'];?>
  </span>
      </div>
    </nav>
    <!--END NAV--> 



		<div class="row"> 

			<div class="col-3" style="background-color: black;">
	
      	<div class="list-group" style="margin-right:80px; margin-top:50px;">
  <a href="profile.php" style="background-color: black; color: white; font-size: 16px" class="list-group-item list-group-item-action"><i class="fas fa-user-edit"></i>&nbsp; Profile</a>
    <a href="friends.php" style="background-color: black; color: white; font-size: 16px" class="list-group-item list-group-item-action"><i class="fas fa-user-friends"></i>&nbsp;Friends</a>
      <a href="#.php" style="background-color: black; color: white; font-size: 16px" class="list-group-item list-group-item-action"><i class="fas fa-users"></i>&nbsp;Groups</a>
        <a href="#.php" style="background-color: black; color: white; font-size: 16px" class="list-group-item list-group-item-action"><i class="fas fa-file-alt"></i>&nbsp;Pages</a>
         <a href="logout.php" style="background-color: black; color: white; font-size: 16px" class="list-group-item list-group-item-action"><i class="fas fa-user"></i>&nbsp;Logout</a>
</div>
     
			</div>
		
				<div class="col-8">
						<small style="margin-top:5px;color:red">You can always add new or update your information</small>
				<div class="container" style="margin-bottom: 100px">
<!--Login form-->
<div class="row">
  
  <div class="col-lg-6" style="background-color:#ffffff; float: right; padding:40px; border-radius: 20px">
      <?php
   $query1 = "SELECT photo FROM user WHERE user_id=$id";

      $exec1 = mysqli_query($conn, $query1);
      while($row = mysqli_fetch_assoc($exec1)){
        $pics = $row['photo'];
   }
  ?>
  <img src="<?php echo $pics; ?>" width="200" height="200">
 <p> <?php if(isset($_POST['update'])){echo $output;}?></p>
  <form method="post" action="profile.php">
<input type="hidden" class="form-control" name="nid" value="<?php echo $_REQUEST['$user_id']?>">
<div class="form-group">
<label for="firstname">School Information</label>
<input type="text" class="form-control" style="border:0; box-shadow:1px 1px 1px 1px grey" name="nschool" value="<?php echo $school?>">
</div>
<p></p>
<p></p>
<p></p>
<div class="form-group">
<label for="firstname">First Name</label>
<input type="text" class="form-control" style="border:0; box-shadow:1px 1px 1px 1px grey" name="nfirstname" value="<?php echo $firstname?>">
</div>
<p></p>
<p></p>
<p></p>
<div class="form-group">
<label for="firstname">Username</label>
<input type="text" class="form-control" style="border:0; box-shadow:1px 1px 1px 1px grey" name="nusername" value="<?php echo $username?>">
</div>
<p></p>
<p></p>
<p></p>

<div class="form-group">
<label for="firstname">Address</label>
<textarea class="form-control" style="border:0; box-shadow:1px 1px 1px 1px grey" name="naddress"> <?php echo $address;?> </textarea> 
</div>
<p></p>
<p></p>
<p></p>

<input type="submit" class="btn btn-primary" name="update" value="Update">

</div>
<div class="col-6" style="background-color:white; margin-top:250px">
<div class="form-group">
<label for="firstname">Work Information</label>
<input type="text" class="form-control" style="border:0; box-shadow:1px 1px 1px 1px grey" name="nwork" value="<?php echo $work?>">
</div>
<p></p>
<p></p>
<p></p>
<div class="form-group">
<label for="lastname">Last Name</label>
<input type="text" class="form-control" style="border:0; box-shadow:1px 1px 1px 1px grey" name="nlastname" value="<?php echo $lastname?>">
</div>
<p></p>
<p></p>
<p></p>
<div class="form-group">
<label for="lastname">Gender</label>
<input type="text" class="form-control" style="border:0; box-shadow:1px 1px 1px 1px grey" name="ngender" value="<?php echo $gender?>">
</div>
<p></p>
<p></p>
<p></p>
<br/>
  </form>
	<p></p>
	<p></p>
	 <form action="profile.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
      <input type="file" name="file" class="form-control">
     </div>
     <p></p>
  <input type="submit" name="update_photo" value="Update photo" class="btn btn-default">
  </form>

</div>
</div>

</div>
  
				
</div>
</body>

  <?php include('footer.php');?>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

</html>