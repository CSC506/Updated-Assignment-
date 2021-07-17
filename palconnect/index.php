<?php include('dbconfig.php'); ?>
	
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="icon" href="images/logo.fw.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link href="jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
	<script src="js/jquery-1.9.1.min.js"></script>
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

<div class="container" >
	
<!--Login form-->
<div class="row" style="margin-top: 100px;">
	<h4 align="center">Login here&nbsp;<i class="far fa-hand-point-down" style="color:black"></i></h4>
	<div class="col-lg-4">
	</div>
	

	<div class="col-lg-4" style="background-color:#ffffff; float: right; padding:20px; border-radius: 20px">
	   <form id="login_form"  method="post">
        <div class="form-group">
        <input type="text"  id="username" name="username" class="form-control" placeholder="Username" required>
    	</div>
    	<p></p>
 		 <div class="form-group">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        </div>
    	<p></p>
    	 <div class="form-check">
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Remember me</label>
	  </div>
	  <p></p>
    		 <div class="form-group">
        <input type="submit" name="login" value="Sign in" class="btn btn-primary form-control">
		<hr>
			<a href="createaccount.php" class="btn btn-success" style="align-content:center;">Create New Account</a>
		      </form>
				<script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Welcome!", { header: 'You are loged in' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'home.php'  }, delay);  
						}
						else
						{
						$.jGrowl("Your username or Password is incorrect", { header: 'Login Failed' });
						}
						}
						
					});
					return false;
				});
			});
			</script>  

  
  
		</div>
		</div><!--form-->
		
		<br><br>
		
		
		
        
			
<br>
</center>
<?php include('scripts.php');?>

</body>
</html>