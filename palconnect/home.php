<!DOCTYPE html>
<html>
<head>
	<title>Palconnect</title>
	<?php include('dbconfig.php'); ?>
	<?php include('session.php'); ?>
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
			<div class="col-1"></div>
				<div class="col-4">
		<div id="container">

		<br>
		
					<form method="post"> 
					<textarea name="post_content" style="box-shadow: 1px 1px 1px 1px grey;border-radius:10px" class="form-control" rows="3" cols="50" style="" placeholder="What is on your mind?" required></textarea>
					<br>
					<button name="post" class="btn btn-primary">&nbsp;POST</button>
					<br>
					<hr>
					</form>
						<?php	
							$query = mysqli_query($conn,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN user on user.user_id = post.user_id order by post_id DESC")or die(mysqli_error());
							while($post_row=mysqli_fetch_array($query)){
							$id = $post_row['post_id'];	
							$upid = $post_row['user_id'];	
							$posted_by = $post_row['firstname']." ".$post_row['lastname'];
						?>
				
					<p style="font-weight:500">Posted by: <a href="#"> <?php echo $posted_by; ?></a>
					-
						<?php				
								$days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
								if($days > 0)
								echo date('F d, Y - H:i:sa', $post_row['date_created']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "A few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago';
						?>
					<br>
					<br><?php echo $post_row['content']; ?></p>
					<form method="post">
					<hr>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<textarea name="comment_content" style="box-shadow: 1px 1px 1px 1px grey; border-radius:10px" rows="1" cols="44" style="" placeholder="Write a comment here ..." required></textarea><br>
					<input type="submit" class="btn btn-default" value="Reply" name="comment">
					</form>
						
				
							<?php 
								$comment_query = mysqli_query($conn,"SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN user on user.user_id = comment.user_id where post_id = '$id'") or die (mysqli_error());
								while ($comment_row=mysqli_fetch_array($comment_query)){
								$comment_id = $comment_row['comment_id'];
								$comment_by = $comment_row['firstname']." ".  $comment_row['lastname'];
							?>
					<br><a href="#"><?php echo $comment_by; ?></a> - <?php echo $comment_row['content']; ?>
					<br>
							<?php				
								$days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
								if($days > 0)
								echo date('F d, Y - H:i:sa', $comment_row['date_posted']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "A few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago';
							?>
					<br>
							<?php
							}
							?>
					<hr>
					&nbsp;
					<?php 
					if ($u_id = $id){
					?>
					
				
					
					<?php }else{ ?>
						
					<?php
					} } ?>
					
				
							<?php
								if (isset($_POST['post'])){
								$post_content  = $_POST['post_content'];
								
								mysqli_query($conn,"insert into post (content,date_created,user_id) values ('$post_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_id') ")or die(mysqli_error());
								header('location:home.php');
								}
							?>

							<?php
							
								if (isset($_POST['comment'])){
								$comment_content = $_POST['comment_content'];
								$post_id=$_POST['id'];
								
								mysqli_query($conn,"insert into comment (content,date_posted,user_id,post_id) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_id','$post_id')") or die (mysqli_error());
								header('location:home.php');
								}

							?>
</div>
<div class="col-1"></div>
<div class="col-4">
	

</div>
</div>
</body>

  <?php include('footer.php');?>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

</html>